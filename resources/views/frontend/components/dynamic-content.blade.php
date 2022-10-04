@extends('frontend.layout')

@section('css')
    <style>
        #eapps-countdown-timer-1 {
            position: absolute;
            top: 50%;
        }

        .top-bar {
            height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            background-size: cover;
            background-image: url({{ asset('frontend/img/bg.jpg') }});
        }

        @media (max-width: 1023px) {
            .top-bar>img {
                height: auto;
            }

            #header {
                display: flex;
                align-items: center;
            }

            .logo a {
                display: flex;
            }
        }

        @media (max-width: 412px) {
            #about {
                padding: 30px 0;
            }

            .section-header h3 {
                font-size: 1rem !important;
            }

            .time-show {
                font-size: 0.9rem !important;
            }
        }
    </style>
@endsection

@section('content')
    <section class="top-bar" id="tutorial">
        {{-- <img src="{{ asset('frontend/img/bg.jpg') }}" alt="Backdrop" /> --}}
        <a href="https://logwork.com/countdown-wddy" class="countdown-timer" data-style="flip3" data-timezone="Asia/Ho_Chi_Minh"
            data-language="vi" data-textcolor="#FFA500" data-date="2022-10-19 00:00" data-background="#FFA500"
            data-digitscolor="#FFFFFF" data-unitscolor="#FFA500">Techfest 2022</a>
    </section>
@endsection

@section('js')
    <script src="https://cdn.logwork.com/widget/countdown.js"></script>
@endsection
