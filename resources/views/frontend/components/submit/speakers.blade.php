<div id="speakers" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex justify-content-center mb-2 justify-content-md-end">
                    <button type="button" class="close btn-modal-close" data-dismiss="modal" aria-label="Close">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29.24 29.24">
                                <g fill="none" stroke="#52bbab" stroke-miterlimit="10">
                                    <path d="m28.22 28.88-27.87-27.86" />
                                    <path d="m.35 28.88 28.53-28.53" />
                                </g>
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="container-fluid">
                    <div class="carousel-wrap">
                        <div class="owl-carousel">
                            @foreach ($submit->speakers as $speaker)
                                <div class="item">
                                    <img src="{{ $speaker->avatar }}" alt="">
                                    <div class="info">
                                        <h4>{{ $speaker->sex }} {{ $speaker->name }} {{ $speaker->name }}</h4>
                                        <p>{{ $speaker->work_place }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
