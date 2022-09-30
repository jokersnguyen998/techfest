<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Stall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Stall $stall)
    {
        $pageConfig = [
            'title' => 'Danh sách bài đăng',
            'breadcrumb' => [
                ['Trang chủ', route('dashboard')],
                ['Gian hàng', route('admin.stalls.index')],
                ['Bài đăng'],
            ],
            'active' => 'stall',
            'stall' => $stall
        ];

        if ($request->ajax()) {
            return DataTables::of($stall->posts()->latest()->get())
                ->addIndexColumn()
                ->addColumn('action', function ($post) use ($stall) {
                    $btn = '<a href="' . route('admin.posts.edit', [$stall, $post]) . '" title="Chỉnh sửa" class="text-success btn-modal mr-2"><i class="far fa-edit"></i></a>';
                    $btn = $btn . '<a href="' . route('admin.posts.destroy', [$stall, $post]) . '" title="Xóa" class="text-danger btn-delete mr-2"><i class="far fa-trash-alt"></i></a>';
                    $btn = $btn . '<a href="' . route('admin.posts.show', [$stall, $post]) . '" title="Xem bài viết" class="text-info btn-modal mr-2"><i class="far fa-eye"></i></a>';
                    return $btn;
                })
                ->addColumn('active', function ($post) use ($stall) {
                    $checked = $post->active ? 'checked' : '';
                    return '<input type="checkbox" name="active" ' . $checked . ' value="' . $post->active . '" url="'. route('admin.posts.active', [$stall, $post]) .'">';
                })
                ->addColumn('created_at', function ($post) {
                    return $post->created_at->format('H:i:s d-m-Y');
                })
                ->addColumn('updated_at', function ($post) {
                    return $post->updated_at->format('H:i:s d-m-Y');
                })
                ->rawColumns(['action', 'active'])
                ->make(true);
        }

        return view('admin.components.post.index', $pageConfig);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Stall $stall)
    {
        if ($request->ajax()) {
            return view('admin.components.post.create', compact('stall'))->render();
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
            'title' => ['required','string','max:255'],
            'content' => ['required']
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $stall->posts()->create($request->all());
        return response()->json(['code' => 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Stall $stall, Post $post)
    {
        if ($request->ajax()) {
            return view('admin.components.post.view', compact('stall', 'post'))->render();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Stall $stall, Post $post)
    {
        if ($request->ajax()) {
            return view('admin.components.post.edit', compact('stall', 'post'))->render();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stall $stall, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required','string','max:255'],
            'content' => ['required']
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $post->update($request->all());
        return response()->json(['code' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stall $stall, Post $post)
    {
        $post->delete();
        return response()->json(['code' => 200]);
    }


    public function active(Stall $stall, Post $post)
    {
        $post->update(['active' => !$post->active]);
        return response()->json(['code' => 200]);
    }
}
