@extends('frontend.layout-exhibition')

@section('css')
    <style>
        .top-bar>img {
            height: 100vh;
        }

        .top-bar .icon-quit {
            position: absolute;
            width: 4%;
            height: auto;
            top: 89%;
            left: 50%;
            font-size: 14px;
            color: #fff;
            transform: translateX(-50%);
            text-align: center;
        }

        #speakers .modal-dialog {
            max-width: unset;
            width: 90vw;
        }

        .carousel-wrap {
            margin: 40px auto;
            padding: 0 1%;
            width: 90%;
            position: relative;
        }

        .owl-nav {
            display: block !important;
        }

        /* end fix */
        .owl-nav>button {
            margin-top: -26px;
            position: absolute;
            top: 50%;
            color: #cdcbcd;
            outline: none;
        }

        .owl-nav i {
            font-size: 52px;
        }

        .owl-nav .owl-prev {
            left: -45px;
        }

        .owl-nav .owl-next {
            right: -45px;
        }

        .btn-modal-close {
            width: 32px;
        }

        /* fix blank or flashing items on carousel */
        .owl-carousel .item {
            position: relative;
            z-index: 100;
            -webkit-backface-visibility: hidden;
            height: 150px;
            overflow: hidden;
            display: flex;
            align-items: center;
            background: rgba(0, 0, 0, 0.1);
        }

        .owl-carousel .item img {
            width: 100%;
            object-fit: contain;
        }

        .owl-carousel .item:hover .info {
            height: 100%;
            padding: 1rem 0;
            justify-content: center;
        }

        .owl-carousel .item .info {
            position: absolute;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: unset;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 15%;
            padding: 0 0;
            color: #fff;
            background: rgba(0, 0, 0, 0.5);
            transition: all 0.25s ease;
        }

        .owl-carousel .item .info h4 {
            font-weight: 600;
            margin: 0;
            font-size: 1rem;
            text-align: center;
            padding-top: 2px;
        }

        .owl-carousel .item .info p {
            font-style: italic;
            color: rgb(160, 160, 160);
            margin: 0;
            text-align: center;
            font-size: .9rem;
        }
    </style>
@endsection

@section('content')
    <section class="top-bar" id="tutorial">
        <style>
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

                .top-bar .sidebar {
                    display: none !important;
                }

                .icon-quit span {
                    display: none !important;
                }
            }

            .top-bar>iframe {
                position: absolute;
                top: 10%;
                left: 26%;
                width: 44%;
                height: 46%;
            }
        </style>

        <img src="{{ asset('frontend/img/hopmaxt banner-04.png') }}" alt="Backdrop" />

        {{-- <iframe src="https://www.youtube.com/embed/Zuy4KRmxtJM" frameborder="0" allowfullscreen></iframe> --}}

        <a href="{{ route('frontend.hall.show') }}" class="icon-quit" title="Lối ra">
            <img src="{{ asset('frontend/img/img_previous.gif') }}" alt="" />
            <span>Lối ra</span>
        </a>

        <div class="sidebar">
            <ul class="sidebar-list">
                <li class="sidebar-item">
                    <a class="sidebar-link"
                        href="https://docs.google.com/forms/d/e/1FAIpQLSfOUMdI45pKY3FI-h_vaNfD5sL51Nc0P9XTOItKRZPmToarIg/viewform"
                        target="_blank">
                        <img src="{{ asset('frontend/img/icon-chon-su-kien.png') }}" alt="" />
                        <span>ĐĂNG KÝ THAM DỰ</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" onclick="showModal(event)">
                        <img src="{{ asset('frontend/img/icon-ve-dien-gia.png') }}" alt="" />
                        <span>VỀ DIỄN GIẢ</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <img src="{{ asset('frontend/img/icon-ve-hoi-thao.png') }}" alt="" />
                        <span>CHƯƠNG TRÌNH SỰ KIỆN</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    @include('frontend.components.submit.speakers', [
        'submit' => $submit,
    ])
@endsection

@section('js')
    <script src="{{ asset('js/frontend/exhibition.js') }}"></script>
@endsection
