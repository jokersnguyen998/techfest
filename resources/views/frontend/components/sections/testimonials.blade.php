<section id="testimonials" class="">
    <style>
        #testimonials .testimonial-item .testimonial-content {
            height: auto;
        }
    </style>
    <div class="container">
        <header class="section-header">
            <h3>DANH SÁCH BÀI THAM LUẬN</h3>
        </header>

        <div class="row justify-content-center">
            <div class="col-lg-9">
                @foreach ($submits as $submit)
                    <div class="tab-pane fade tab-pane-discussion {{ $loop->first ? 'show active' : '' }}"
                        id="nav-discussion-{{ $loop->iteration }}" role="tabpanel">
                        <div class="owl-carousel wow fadeInUp" id="testimonials-carousel-{{ $loop->iteration }}">
                            @foreach ($submit->speakers as $speaker)
                                <div class="testimonial-item">
                                    <img src="{{ $speaker->avatar }}" style="object-fit: cover;"
                                        class="testimonial-img mr-1" alt="" />
                                    <div class="testimonial-content">
                                        <h3>{{ $speaker->pivot->name }}</h3>
                                        <h4>{{ $speaker->sex }} {{ $speaker->name }} - {{ $speaker->work_place }}
                                        </h4>
                                        <p class="text-justify"></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
