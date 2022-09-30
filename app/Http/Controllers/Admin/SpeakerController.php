<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use App\Models\Submit;
use App\Traits\DeleteFile;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SpeakerController extends Controller
{
    use UploadFile, DeleteFile;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Submit $submit)
    {
        $pageConfig = [
            'title' => 'Danh sách diễn giả',
            'breadcrumb' => [
                ['Trang chủ', route('dashboard')],
                ['Hội thảo', route('admin.submits.index')],
                ['Diễn giả'],
            ],
            'active' => 'submit',
            'submit' => $submit
        ];

        if ($request->ajax()) {
            return DataTables::of($submit->speakers()->latest()->get())
                ->addIndexColumn()
                ->addColumn('action', function ($speaker) use ($submit) {
                    $btn = '<a href="' . route('admin.speakers.edit', [$submit, $speaker]) . '" title="Chỉnh sửa" class="text-success btn-modal mr-2"><i class="far fa-edit"></i></a>';
                    $btn = $btn . '<a href="' . route('admin.speakers.destroy', [$submit, $speaker]) . '" title="Xóa" class="text-danger btn-delete mr-2"><i class="far fa-trash-alt"></i></a>';
                    return $btn;
                })
                ->addColumn('name', function ($speaker) {
                    return
                        "<p>$speaker->sex $speaker->name</p>
                        <p class='text-muted font-italic m-0'>$speaker->work_place</p>";
                })
                ->addColumn('discussion_name', function ($speaker) use ($submit) {
                    return $speaker->submits()->find($submit->id)->pivot->name . ' ' . $speaker->name . ' ' . $speaker->name . ' ' . $speaker->name . ' ' . $speaker->name;
                })
                ->addColumn('created_at', function ($speaker) {
                    return $speaker->created_at->format('H:i:s d-m-Y');
                })
                ->addColumn('updated_at', function ($speaker) {
                    return $speaker->updated_at->format('H:i:s d-m-Y');
                })
                ->rawColumns(['action', 'name'])
                ->make(true);
        }

        return view('admin.components.speaker.index', $pageConfig);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Submit $submit)
    {
        if ($request->ajax()) {
            return view('admin.components.speaker.create', compact('submit'))->render();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Submit $submit)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'work_place' => ['required', 'string', 'max:255'],
                'discussion_name' => ['required', 'string', 'max:255'],
                'sex' => ['required', 'boolean'],
                'avatar' => ['bail', 'required', 'mimes:jpeg,jpg,png', 'max:20480'],
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            $speaker = Speaker::create([
                'submit_id' => $submit->id,
                'name' => $request->name,
                'work_place' => $request->work_place,
                'sex' => $request->sex,
            ]);
            $folder = "speakers/$speaker->id/";
            $avatar = $this->uploadFile($request->avatar, $folder);
            $speaker->update(['avatar' => $avatar]);
            $speaker->submits()->attach($submit->id, ['name' => $request->discussion_name]);
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
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function show(Speaker $speaker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Submit $submit, Speaker $speaker)
    {
        $discussion_name = $speaker->submits()->find($submit)->pivot->name;
        $speaker->discussion_name = $discussion_name;
        if ($request->ajax()) {
            return view('admin.components.speaker.edit', compact('submit', 'speaker'))->render();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submit $submit, Speaker $speaker)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'work_place' => ['required', 'string', 'max:255'],
                'discussion_name' => ['required', 'string', 'max:255'],
                'sex' => ['required', 'boolean'],
                'avatar' => ['bail', 'nullable', 'mimes:jpeg,jpg,png', 'max:20480']
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            $speaker->update([
                'submit_id' => $submit->id,
                'name' => $request->name,
                'work_place' => $request->work_place,
                'sex' => $request->sex,
            ]);
            if ($request->hasFile('avatar')) {
                $folder = "speakers/$speaker->id/";
                $avatar = $this->uploadFile($request->avatar, $folder);
                $this->deleteFile($speaker->avatar);
                $speaker->update(['avatar' => $avatar]);
            }
            $speaker->submits()->syncWithPivotValues([$submit->id], ['name' => $request->discussion_name]);
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
     * @param  \App\Models\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submit $submit, Speaker $speaker)
    {
        $speaker->submits()->detach();
        $speaker->delete();
        return response()->json(['code' => 200]);
    }
}
