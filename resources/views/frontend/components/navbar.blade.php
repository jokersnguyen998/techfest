<header id="header">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="logo">
                <a href="/" class="scrollto" style="font-size: 2.5rem; color: #0047ba;"><i class="fa fa-home"></i></a>
            </div>
            <nav class="main-nav d-none d-lg-block ml-auto">
                <ul>
                    <li><a href="/">Trang chủ</a></li>
                    @if (env('OPENING'))
                        <li><a href="{{ route('frontend.hall.show') }}">Triển lãm</a></li>
                    @endif
                    <li><a href="{{ route('frontend.submit.show') }}">Hội thảo</a></li>
                    {{-- <li><a href="#testimonials">Tham luận</a></li> --}}
                    <li><a href="#call-to-action">Liên hệ</a></li>
                    <li><a href="https://docs.google.com/forms/d/1owoMajk9vbcSs7WXsGtzHNyDC48QHgbtIqFo0TMdBcs/viewform?edit_requested=true"
                            target="_blank">Đăng ký</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
