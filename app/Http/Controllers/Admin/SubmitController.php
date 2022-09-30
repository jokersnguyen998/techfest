<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Submit;
use App\Traits\DeleteFile;
use App\Traits\UploadFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SubmitController extends Controller
{
    use UploadFile, DeleteFile;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageConfig = [
            'title' => 'Danh sách hội thảo',
            'breadcrumb' => [
                ['Trang chủ', route('dashboard')],
                ['Hội thảo'],
            ],
            'active' => 'submit',
        ];

        if ($request->ajax()) {
            return DataTables::of(Submit::latest()->get())
                ->addIndexColumn()
                ->addColumn('action', function ($submit) {
                    $btn = '<a href="' . route('admin.submits.edit', [$submit]) . '" title="Chỉnh sửa" class="text-success btn-modal mr-2"><i class="far fa-edit"></i></a>';
                    $btn = $btn . '<a href="' . route('admin.submits.destroy', [$submit]) . '" title="Xóa" class="text-danger btn-delete mr-2"><i class="far fa-trash-alt"></i></a>';
                    $btn = $btn . '<a href="' . route('admin.speakers.index', [$submit]) . '" title="Diễn giả" class="text-success mr-2"><i class="fas fa-user-plus"></i></a>';
                    return $btn;
                })
                ->addColumn('time_start', function ($submit) {
                    return Carbon::parse($submit->time_start)->format('H:i:s d-m-Y');
                })
                ->addColumn('name', function ($submit) {
                    return
                        "<div class='w-100' style='white-space: normal;'>
                            $submit->name
                        </div>";
                })
                ->addColumn('created_at', function ($submit) {
                    return $submit->created_at->format('H:i:s d-m-Y');
                })
                ->addColumn('updated_at', function ($submit) {
                    return $submit->updated_at->format('H:i:s d-m-Y');
                })
                ->addColumn('topic', function ($submit) {
                    return $submit->topic;
                })
                ->addColumn('active', function ($submit) {
                    return $submit->active ? 'Hiển thị' : 'Ẩn';
                })
                ->rawColumns(['action', 'name', 'topic'])
                ->make(true);
        }

        return view('admin.components.submit.index', $pageConfig);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            return view('admin.components.submit.create')->render();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'time_start' => ['required'],
            'schedule' => ['required', 'mimes:pdf', 'max:10000'],
            'active' => ['nullable', 'boolean'],
            'topic' => ['required'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try {
            DB::beginTransaction();
            $submit = Submit::create([
                'name' => $request->name,
                'location' => $request->location,
                'time_start' => Carbon::createFromFormat('H:i:s d-m-Y', $request->time_start)->format("Y-m-d H:i:s"),
                'active' => $request->active ? $request->active : 0,
                'type' => $request->type,
                'topic' => $request->topic,
            ]);
            $folder = "submits/$submit->id";
            $pdf_path = $this->uploadFile($request->schedule, $folder);
            $submit->update([
                'schedule' => $pdf_path,
            ]);
            DB::commit();
            return response()->json(['code' => 200]);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Message:' . $th->getMessage() . '--- Line:' . $th->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Submit  $submit
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Submit $submit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Submit  $submit
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Submit $submit)
    {
        if ($request->ajax()) {
            return view('admin.components.submit.edit', compact('submit'))->render();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Submit  $submit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submit $submit)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'time_start' => ['required'],
            'schedule' => ['nullable', 'mimes:pdf', 'max:10000'],
            'type' => ['required', 'string', 'max:255'],
            'active' => ['nullable', 'boolean'],
            'topic' => ['required'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try {
            DB::beginTransaction();
            $submit->update([
                'name' => $request->name,
                'location' => $request->location,
                'time_start' => Carbon::createFromFormat('H:i:s d-m-Y', $request->time_start)->format("Y-m-d H:i:s"),
                'active' => $request->active ? $request->active : 0,
                'type' => $request->type,
                'topic' => $request->topic,
            ]);
            if ($request->hasFile('schedule')) {
                $folder = "submits/$submit->id";
                $pdf_path = $this->uploadFile($request->schedule, $folder);
                $this->deleteFile($submit->schedule);
                $submit->update(['schedule' => $pdf_path]);
            }
            DB::commit();
            return response()->json(['code' => 200]);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Message:' . $th->getMessage() . '--- Line:' . $th->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Submit  $submit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submit $submit)
    {
        $submit->delete();
        return response()->json(['code' => 200]);
    }
}
