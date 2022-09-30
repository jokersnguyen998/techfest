<section id="about">
    <div class="container">
        <header class="section-header">
            <h3 class="text-uppercase" style="color: #edb512; font-size: 2rem;">
                TECHFEST 2022 - NGÀY HỘI KHỞI NGHIỆP ĐỔI MỚI SÁNG TẠO VÙNG ĐỒNG BẰNG SÔNG CỬU LONG
            </h3>
        </header>
        <div class="row mt-3">
            <div class="col-xs-12">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        @foreach ($submits as $submit)
                            <a class="nav-item nav-link {{ $loop->first ? 'active' : '' }}"
                                id="nav-submit-{{ $loop->iteration }}-tab" data-toggle="tab"
                                href="#nav-submit-{{ $loop->iteration }}" role="tab"
                                onclick="showTabpanel(event,'{{ $loop->iteration }}')">
                                Hội thảo {{ $loop->iteration }}
                            </a>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0">
                    @foreach ($submits as $submit)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                            id="nav-submit-{{ $loop->iteration }}" role="tabpanel">
                            <h4 class="text-center text-warning font-weight-bold mb-3">{{ $submit->name }} diễn ra
                                vào ngày ({{ \Carbon\Carbon::parse($submit->time_start)->format('d-m-Y') }})</h4>
                            <div class="row text-justify time-show">
                                {!! $submit->schedule !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
