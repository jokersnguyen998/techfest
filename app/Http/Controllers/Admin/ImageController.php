<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Stall;
use App\Traits\DeleteFile;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ImageController extends Controller
{
    use UploadFile, DeleteFile;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Stall $stall)
    {
        $pageConfig = [
            'title' => 'Danh sách hình',
            'breadcrumb' => [
                ['Trang chủ', route('dashboard')],
                ['Gian hàng', route('admin.stalls.index')],
                ['Hình ảnh'],
            ],
            'active' => 'stall',
            'stall' => $stall
        ];

        if ($request->ajax()) {
            return DataTables::of($stall->images()->latest()->get())
                ->addIndexColumn()
                ->addColumn('action', function ($image) use ($stall) {
                    $btn = '<a href="' . route('admin.images.edit', [$stall, $image]) . '" title="Chỉnh sửa" class="text-success btn-modal mr-2"><i class="far fa-edit"></i></a>';
                    $btn = $btn . '<a href="' . route('admin.images.destroy', [$stall, $image]) . '" title="Xóa" class="text-danger btn-delete mr-2"><i class="far fa-trash-alt"></i></a>';
                    return $btn;
                })
                ->addColumn('image', function ($image) {
                    return "<img src='$image->file_path' alt='' class='w-100' />";
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        
        return view('admin.components.image.index', $pageConfig);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Stall $stall)
    {
        if ($request->ajax()) {
            return view('admin.components.image.create', compact('stall'))->render();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Stall $stall)
    {
        $validator = Validator::make($request->all(), [
            'position' => ['bail','required','digits:1'],
            'file_path' => ['bail','required','mimes:jpeg,jpg,png','max:20480'],
            'link' => ['nullable','string','max:255'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $folder = "stalls/$stall->id";
        $file_path = $this->uploadFile($request->file_path, $folder);
        $stall->images()->create([
            'position' => $request->position,
            'file_path' =>$file_path
        ]);
        return response()->json(['code' => 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Stall $stall, Image $image)
    {
        if ($request->ajax()) {
            return view('admin.components.image.edit', compact('stall', 'image'))->render();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stall $stall, Image $image)
    {
        $validator = Validator::make($request->all(), [
            'position' => ['bail','required','digits:1'],
            'file_path' => ['bail','nullable','mimes:jpeg,jpg,png','max:20480'],
            'link' => ['nullable','string','max:255'],
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = [
            'position' => $request->position,
            'link' => $request->link
        ];
        if ($request->hasFile('file_path')) {
            $folder = "stalls/$stall->id";
            $file_path = $this->uploadFile($request->file_path, $folder);
            $this->deleteFile($image->file_path);
            $data['file_path'] = $file_path;
        }
        $image->update($data);
        return response()->json(['code' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stall $stall, Image $image)
    {
        $this->deleteFile($image->file_path);
        $image->delete();
        return response()->json(['code' => 200]);
    }
}
