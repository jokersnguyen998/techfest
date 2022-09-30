<section id="team" class="team section-bg">
    <div class="container">
        <div class="section-header">
            <h3 class="mb-5">DIỄN GIẢ</h3>
        </div>
        <div class="tab-content py-3 px-3 px-sm-0">
            @foreach ($submits as $submit)
                <div class="tab-pane fade tab-pane-speaker {{ $loop->first ? 'show active' : '' }}"
                    id="nav-speaker-{{ $loop->iteration }}" role="tabpanel">
                    <div class="row justify-content-center">
                        @foreach ($submit->speakers as $speaker)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration }}s">
                                <div class="member">
                                    <img src="{{ $speaker->avatar }}" class="img-fluid img-custom" alt="" />
                                    <div class="member-info">
                                        <div class="member-info-content">
                                            <h4>{{ $speaker->sex }} {{ $speaker->name }}</h4>
                                            <span>{{ $speaker->work_place }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
