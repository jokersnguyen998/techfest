@extends('admin.layout')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <style>
        table#table-schedule {
            width: 100% !important;
        }

        table#table-schedule tr td:first-child {
            width: 100px;
            text-align: right;
        }

        table#table-schedule td {
            vertical-align: text-top;
            padding: 5px 10px;
        }

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
                                <a href="{{ route('admin.submits.create') }}"
                                    class="btn btn-primary btn-sm float-right btn-modal"><i class="fas fa-plus"></i></a></a>
                            </div>
                            <div class="card-body">
                                <table id="data-table" class="table table-bordered table-hover display nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên hội thảo</th>
                                            <th scope="col">Ngày tổ chức</th>
                                            <th scope="col">Ngày tạo</th>
                                            <th scope="col">Ngày sửa</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col"></th>
                                            <th scope="col">Chủ đề</th>
                                            <th scope="col">Địa điểm tổ chức</th>
                                            <th scope="col">Loại</th>
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
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="{{ asset('js/toast.js') }}"></script>
    <script src="{{ asset('js/preview-image.js') }}"></script>
    <script src="{{ asset('js/config-ckeditor.js') }}"></script>
    <script src="{{ asset('js/admin/submit.js') }}"></script>
@endsection
