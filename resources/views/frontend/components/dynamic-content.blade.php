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
        }

        .top-bar>img {
            display: block;
            object-fit: cover;
            padding-top: 10rem;
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
        <img src="{{ asset('frontend/img/bg.jpg') }}" alt="Backdrop" />
    </section>
@endsection
