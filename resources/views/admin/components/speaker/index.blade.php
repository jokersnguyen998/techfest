@extends('admin.layout')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                                <h4>
                                    {{ $submit->name }}
                                    <a href="{{ route('admin.speakers.create', $submit) }}"
                                        class="btn btn-primary btn-sm float-right btn-modal"><i
                                            class="fas fa-plus"></i></a></a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <table id="data-table" class="table table-bordered table-hover display nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên diễn giả</th>
                                            <th scope="col">Ngày tạo</th>
                                            <th scope="col">Ngày sửa</th>
                                            <th scope="col"></th>
                                            <th scope="col">Bài tham luận</th>
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
    <script src="{{ asset('js/config-ckeditor.js') }}"></script>
    <script src="{{ asset('js/admin/speaker.js') }}"></script>
@endsection
