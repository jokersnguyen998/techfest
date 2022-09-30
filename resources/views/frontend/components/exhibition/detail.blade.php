<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold text-uppercase">{{ $stall->name }}</h5>
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div id="carousel-detail" class="carousel slide" data-interval="false">
                <div class="carousel-inner">
                    @foreach ($stall->posts()->active()->get() as $post)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <h3 class="title">{{ $post->title }}</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content">
                                        {!! $post->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="control-slide-modal">
            <div class="previous-modal">
                <a href="#" class="" data-target="#carousel-detail" data-slide="prev">
                    <img src="{{ asset('frontend/img/img_next.gif') }}" alt="">
                </a>
            </div>
            <div class="next-modal">
                <a href="#" class="" data-target="#carousel-detail" data-slide="next">
                    <img src="{{ asset('frontend/img/img_next.gif') }}" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
