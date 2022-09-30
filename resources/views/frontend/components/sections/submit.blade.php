<section class="submit" id="submit-{{ $index }}">
    <div class="_container">
        <div class="content_container">
            <div class="content-box">
                <p>{{ $submit->type }} khoa học với chủ đề “{{ $submit->name }}” được tổ chức song song với các
                    hoạt động của sự kiện Techmart Nông
                    nghiệp 2022.</p>
                <p>Nội dung xoay quanh: {!! $submit->topic !!}</p>
                <div class="slide">

                </div>
            </div>
        </div>
        <div class="panels_container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>{{ $submit->name }}</h3>
                    <p>Thời gian: Từ {{ $submit->time_start->format('H:i') }} ngày
                        {{ $submit->time_start->format('d/m/Y') }}
                        ({{ $submit->time_start->isoFormat('dddd') }})</p>
                    <p>Địa điểm: {{ $submit->location }}</p>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{ route('frontend.submit.show', $submit) }}"
                            class="btn btn-outline-primary my-3 mr-3">Tham dự
                            trực
                            tuyến</a>
                        <a href="#" class="btn btn-outline-primary " title="Khung chương trình hội thảo"
                            data-toggle="modal" data-target="#preview-pdf-{{ $index }}">
                            Khung chương trình
                        </a>
                    </div>
                </div>
                <img src="{{ $pathImg }}" alt="">
            </div>
        </div>
    </div>
</section>
