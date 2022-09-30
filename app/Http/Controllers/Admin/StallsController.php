<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StallRequest;
use App\Models\Stall;
use App\Traits\DeleteFile;
use App\Traits\UploadFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class StallsController extends Controller
{
    use UploadFile, DeleteFile;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StallRequest $request)
    {
        $pageConfig = [
            'title' => 'Danh sách gian hàng',
            'breadcrumb' => [
                ['Trang chủ', route('dashboard')],
                ['Gian hàng'],
            ],
            'active' => 'stall'
        ];

        if ($request->ajax()) {
            return DataTables::of(Stall::orderBy('position', 'desc')->get())
                ->addIndexColumn()
                ->addColumn('action', function ($stall) {
                    $btn = '<a href="' . route('admin.stalls.edit', [$stall]) . '" title="Chỉnh sửa" class="text-success btn-modal mr-2"><i class="far fa-edit"></i></a>';
                    $btn = $btn . '<a href="' . route('admin.stalls.destroy', [$stall]) . '" title="Xóa" class="text-danger btn-delete mr-2"><i class="far fa-trash-alt"></i></a>';
                    $btn = $btn . '<a href="' . route('admin.images.index', [$stall]) . '" title="Danh sách hình" class="text-info mr-2"><i class="fas fa-images"></i></a>';
                    $btn = $btn . '<a href="' . route('admin.posts.index', [$stall]) . '" title="Bài đăng" class="text-success"><i class="fas fa-blog"></i></a>';
                    return $btn;
                })
                ->addColumn('name', function ($stall) {
                    return
                        "<div class='w-100' style='white-space: normal;'>$stall->name</div>";
                })
                ->addColumn('description', function ($stall) {
                    return $stall->description;
                })
                ->addColumn('contact', function ($stall) {
                    return "<a href='$stall->contact' target='_blank'>" . $stall->contact . "</a>";
                })
                ->addColumn('logo', function ($stall) {
                    return
                        "<img src='$stall->logo' class='w-100' alt='' />";
                })
                ->addColumn('video_path', function ($stall) {
                    return
                        "<div class='w-50 mx-auto'>
                            <video src='$stall->video_path' controls class='w-100'></video>
                        </div>";
                })
                ->addColumn('created_at', function ($stall) {
                    return $stall->created_at->format('H:i:s d-m-Y');
                })
                ->addColumn('updated_at', function ($stall) {
                    return $stall->updated_at->format('H:i:s d-m-Y');
                })
                ->rawColumns(['action', 'name', 'contact', 'logo', 'video_path'])
                ->make(true);
        }

        return view('admin.components.stall.index', $pageConfig);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StallRequest $request)
    {
        if ($request->ajax()) {
            return view('admin.components.stall.create')->render();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StallRequest $request)
    {
        try {
            DB::beginTransaction();
            $stall = Stall::create([
                'name' => $request->name,
                'description' => $request->description,
                'contact' => $request->contact,
                'position' => $request->position != 0 ? $request->position : null,
            ]);

            $folder = "stalls/$stall->id";
            $logo_path = $this->uploadFile($request->logo, $folder);
            $video_path = $this->uploadFile($request->video_path, $folder);
            $standy_path = $this->uploadFile($request->standy, $folder);
            $stall->update([
                'video_path' => $video_path,
                'logo' => $logo_path,
                'standy' => $standy_path,
            ]);
            if ($request->hasFile('stall_image_path')) {
                $stall_image_path = $this->uploadFile($request->stall_image_path, $folder);
                $stall->update([
                    'stall_image_path' => $stall_image_path,
                ]);
            }

            foreach ($request->images as $key => $image) {
                $image_path = $this->uploadFile($image, $folder);
                $stall->images()->create([
                    'file_path' => $image_path,
                    'position' => $key + 1,
                ]);
            }

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
     * @param  \App\Models\Stall  $stall
     * @return \Illuminate\Http\Response
     */
    public function show(Stall $stall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stall  $stall
     * @return \Illuminate\Http\Response
     */
    public function edit(StallRequest $request, Stall $stall)
    {
        if ($request->ajax()) {
            return view('admin.components.stall.edit', compact('stall'))->render();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stall  $stall
     * @return \Illuminate\Http\Response
     */
    public function update(StallRequest $request, Stall $stall)
    {
        try {
            DB::beginTransaction();
            $folder = "stalls/$stall->id";
            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'contact' => $request->contact,
                'position' => $request->position != 0 ? $request->position : null,
            ];

            if ($request->hasFile('logo')) {
                $logo_path = $this->uploadFile($request->logo, $folder);
                $this->deleteFile($stall->logo);
                $data['logo'] = $logo_path;
            }

            if ($request->hasFile('standy')) {
                $standy_path = $this->uploadFile($request->standy, $folder);
                $this->deleteFile($stall->standy);
                $data['standy'] = $standy_path;
            }

            if ($request->hasFile('stall_image_path')) {
                $stall_image_path = $this->uploadFile($request->stall_image_path, $folder);
                $this->deleteFile($stall->stall_image_path);
                $data['stall_image_path'] = $stall_image_path;
            }

            if ($request->hasFile('video_path')) {
                $video_path = $this->uploadFile($request->video_path, $folder);
                $this->deleteFile($stall->video_path);
                $data['video_path'] = $video_path;
            }
            $stall->update($data);
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
     * @param  \App\Models\Stall  $stall
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stall $stall)
    {
        $stall->delete();
        return response()->json(['code' => 200]);
    }
}
