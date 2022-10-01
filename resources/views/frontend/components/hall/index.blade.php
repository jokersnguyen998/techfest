@extends('frontend.layout-exhibition')

@section('css')
    <style>
        .top-bar {
            height: fit-content;
        }

        .invition {
            position: absolute;
            width: 15.3%;
            height: 21.7%;
            top: 40%;
            left: 65%;
        }

        .top-bar .icon-quit {
            top: 85%;
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

        <a href="{{ asset('frontend/images/tm.jpg') }}" class="invition" data-fancybox="invition"></a>

        <a href="{{ route('frontend.home.show') }}" class="icon-quit" title="Lối ra">
            <img src="{{ asset('frontend/img/img_previous.gif') }}" alt="" />
            <span>Lối ra</span>
        </a>
    </section>

    <div class="modal modal-stall" id="modal"></div>
    <div class="modal p-0" id="modal-detail"></div>
@endsection

@section('js')
    <script src="{{ asset('js/frontend/exhibition.js') }}"></script>
@endsection
