<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserRequest $request)
    {
        $pageConfig = [
            'title' => 'Danh sách tài khoản',
            'breadcrumb' => [
                ['Trang chủ', route('dashboard')],
                ['Tài khoản'],
            ],
            'active' => 'user'
        ];

        if ($request->ajax()) {
            return DataTables::of(User::latest()->get())
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    $btn = '<a href="' . route('admin.users.edit', [$user]) . '" title="Chỉnh sửa" class="text-success btn-modal mr-2"><i class="far fa-edit"></i></a>';
                    $btn = $btn . '<a href="' . route('admin.users.destroy', [$user]) . '" title="Xóa" class="text-danger btn-delete"><i class="far fa-trash-alt"></i></a>';
                    return $btn;
                })
                ->addColumn('name', function ($user) {
                    return $user->name;
                })
                ->addColumn('type', function ($user) {
                    if ($user->type === 0) {
                        return "<span class='text-success' >User</span>";
                    } else {
                        return "<span class='text-danger' >Admin</span>";
                    }
                })
                ->addColumn('created_at', function ($user) {
                    return $user->created_at->format('H:i:s d-m-Y');
                })
                ->addColumn('updated_at', function ($user) {
                    return $user->updated_at->format('H:i:s d-m-Y');
                })
                ->rawColumns(['action', 'type'])
                ->make(true);
        }

        return view('admin.components.user.index', $pageConfig);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserRequest $request)
    {
        if ($request->ajax()) {
            return view('admin.components.user.create')->render();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'type' => 0
        ]);
        return response()->json(['code' => 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRequest $request, User $user)
    {
        if ($request->ajax()) {
            return view('admin.components.user.edit', compact('user'))->render();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        return response()->json(['code' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['code' => 200]);
    }
}
