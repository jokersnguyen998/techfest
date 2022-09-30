@extends('admin.layout')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        li.wrapok {
            white-space: normal
        }
    </style>
@endsection

@section('content-wrapper')
    <div class="content-wrapper">
        @include('admin.components.content-header')

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('admin.stalls.create') }}"
                                    class="btn btn-primary btn-sm float-right btn-modal"><i class="fas fa-plus"></i></a></a>
                            </div>
                            <div class="card-body">
                                <table id="data-table" class="table table-bordered table-hover display nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Logo</th>
                                            <th scope="col">Tên gian hàng</th>
                                            <th scope="col">Ngày tạo</th>
                                            <th scope="col">Ngày sửa</th>
                                            <th scope="col"></th>
                                            <th scope="col">Mô tả ngắn</th>
                                            <th scope="col">Trang liên hệ</th>
                                            <th scope="col">Video</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <div class="modal fade" id="modal" data-backdrop="static" role="dialog"></div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="{{ asset('js/toast.js') }}"></script>
    <script src="{{ asset('js/preview-image.js') }}"></script>
    <script src="{{ asset('js/admin/stall.js') }}"></script>
@endsection
