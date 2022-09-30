@extends('frontend.layout-exhibition')

@section('css')
    <style>
        .top-bar {
            height: fit-content;
        }
    </style>
@endsection

@section('content')
    <section class="top-bar" id="tutorial">
        <img src="{{ asset('frontend/images/1.Exhibition-hall_TM.png') }}" alt="" />

        <a href="{{ route('frontend.exhibition.show') }}" class="icon-exhibition">
            <img src="{{ asset('frontend/images/hieu-ung-click_FINAL1.gif') }}" alt="" />
        </a>

        <a href="{{ route('frontend.submit.show', $submit) }}" class="icon-seminor">
            <img src="{{ asset('frontend/images/hieu-ung-click_FINAL1.gif') }}" alt="" />
        </a>

        <a href="#" class="icon-register">
            <img src="{{ asset('frontend/img/icon-dang-ky1.png') }}" alt="" />
        </a>

        {{-- <a href="{{ asset('frontend/img/standy-show.jpg') }}" class="standy-show" data-fancybox="standy-show">
            <img src="{{ asset('frontend/images/hieu-ung-click_FINAL1.gif') }}" alt="" />
        </a> --}}

        {{-- <a href="https://sokhcn.cantho.gov.vn/default.aspx?pid=57&nid=21488" class="link-info" target="_blank">
            <img src="{{ asset('frontend/images/hieu-ung-click_FINAL1.gif') }}" alt="" />
        </a> --}}
    </section>

    <div class="modal modal-stall" id="modal"></div>
    <div class="modal p-0" id="modal-detail"></div>
@endsection

@section('js')
    <script src="{{ asset('js/frontend/exhibition.js') }}"></script>
@endsection
