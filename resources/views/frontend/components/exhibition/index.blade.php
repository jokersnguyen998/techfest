@extends('frontend.layout-exhibition')

@section('css')
    <style>
        .top-bar>img {
            height: fit-content;
        }

        .top-bar .icon-seminor {
            position: absolute;
            background: transparent;
            width: 9.8%;
            height: 6%;
            border-radius: 20px;
            top: 83.7%;
            left: 62.7%;
        }

        .top-bar .icon-home {
            position: absolute;
            width: 2%;
            height: 7%;
            top: 84%;
            left: 28%;
            background: transparent;
        }

        .top-bar .icon-quit {
            left: 20%;
            transform: unset;
        }
    </style>
@endsection

@section('content')
    <section class="top-bar" id="tutorial">
        <img src="{{ asset('frontend/images/exhibition-area1.png') }}" alt="" />

        @foreach ($stalls as $stall)
            @php
                switch ($loop->iteration) {
                    case '1':
                        $num = 'one';
                        break;
                    case '2':
                        $num = 'two';
                        break;
                    case '3':
                        $num = 'three';
                        break;
                    case '4':
                        $num = 'four';
                        break;
                    case '5':
                        $num = 'five';
                        break;
                    case '6':
                        $num = 'six';
                        break;
                    case '7':
                        $num = 'seven';
                        break;
                    case '8':
                        $num = 'eight';
                        break;
                    case '9':
                        $num = 'nine';
                        break;
                    case '10':
                        $num = 'ten';
                        break;
                    case '11':
                        $num = 'eleven';
                        break;
                    default:
                        $num = 'twelve';
                        break;
                }
            @endphp
            <div class="btn-open-box {{ $num }}">
                <h5 class="kiot-name"><span>{{ $stall->name }}</span></h5>
                <a href="{{ route('frontend.stall.show', [$stall, $stalls->currentPage()]) }}" class="btn-modal"></a>
            </div>
            <a href="{{ route('frontend.stall.show', [$stall, $stalls->currentPage()]) }}"
                class="area-open {{ $num }} btn-modal">
                <img src="{{ asset('frontend/images/hieu-ung-click_FINAL1.gif') }}" alt="" class="w-25" />
            </a>
        @endforeach

        <a href="{{ route('frontend.hall.show') }}" class="icon-quit" title="Lối ra">
            <img src="{{ asset('frontend/img/img_previous.gif') }}" alt="" />
            <span>Lối ra</span>
        </a>

        {{-- <a href="{{ asset('frontend/img/standy-show.jpg') }}" class="standy-show" data-fancybox="standy-show">
            <img src="{{ asset('frontend/images/hieu-ung-click_FINAL1.gif') }}" alt="" />
        </a>

        <a href="https://sokhcn.cantho.gov.vn/default.aspx?pid=57&nid=21488" class="link-info" target="_blank">
            <img src="{{ asset('frontend/images/hieu-ung-click_FINAL1.gif') }}" alt="" />
        </a> --}}

        <div class="pagination-area">
            {{ $stalls->onEachSide(1)->links() }}
        </div>


        <div class="sidebar-control">
            <div class="wrapper">
                <a href="#" data-target="pane-one">Danh mục</a>
                <a href="#" data-target="pane-two">Gian hàng</a>
            </div>
        </div>

        <div class="sidebar-stall">
            <div class="pane" id="pane-one">
                <div class="search">
                    <button class="sidebar-close"><i class="fa fa-times text-muted"></i></button>
                </div>
                <ul>
                    <li>
                        <a href="#">
                            <div class="info">
                                <h5></h5>
                                <p>Số gian hàng trưng bày: </p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="pane" id="pane-two">
                <div class="search">
                    <button class="sidebar-close"><i class="fa fa-times text-muted"></i></button>
                    <input type="search" class="inputSearch" placeholder="Tìm kiếm gian hàng...">
                </div>
                <ul id="search">
                    @include('frontend.components.exhibition.search')
                </ul>
            </div>
        </div>
    </section>

    <div class="modal modal-stall" id="modal"></div>
    <div class="modal p-0" id="modal-detail"></div>
@endsection

@section('js')
    <script src="{{ asset('js/frontend/exhibition.js') }}"></script>
@endsection
