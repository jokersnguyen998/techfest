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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown">Hội thảo</a>
                        <div class="dropdown-menu">
                            @foreach ($submits as $submit)
                                <a class="dropdown-item"
                                    href="#submit-{{ $loop->iteration }}">{{ Str::words($submit->name, 10, '...') }}</a>
                            @endforeach
                        </div>
                    </li>
                    {{-- <li><a href="#testimonials">Tham luận</a></li> --}}
                    <li><a href="#call-to-action">Liên hệ</a></li>
                    <li><a href="https://drive.google.com/drive/folders/1LBHEIR0OpF4guy41oF7YpmoGFZDOdklJ"
                            target="_blank">Đăng ký</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
