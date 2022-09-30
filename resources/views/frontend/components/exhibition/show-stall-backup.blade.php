<div class="modal-dialog modal-xl">
    <div class="modal-content" style="background-color: transparent;">
        <div class="control-slide-modal">
            <div class="previous-modal">
                @if ($stallBefore)
                    <a href="{{ route('frontend.stall.show', [$stallBefore, $stallSorted->currentPage()]) }}"
                        class="btn-modal" title="Trước">
                        <img src="{{ asset('frontend/img/img_next.gif') }}" alt="">
                    </a>
                @endif
            </div>
            <div class="next-modal">
                @if ($stallAfter)
                    <a href="{{ route('frontend.stall.show', [$stallAfter, $stallSorted->currentPage()]) }}"
                        class="btn-modal" title="Sau">
                        <img src="{{ asset('frontend/img/img_next.gif') }}" alt="">
                    </a>
                @endif
            </div>
        </div>
        <div class="kiot kiot-modal">
            <!-- <span class="close" data-dismiss="modal">&times;</span> -->

            <div class="kiot-name">{{ $stall->name }}</div>

            <img src="{{ asset('frontend/images/kiot_12.png') }}" alt="" />

            <div class="img-content">
                <div class="video-box">
                    <video controls src="{{ $stall->video_path }}" {{ $stall->id }}></video>
                </div>

                <div class="box-container-one">
                    <div class="link-box-effect standy">
                        <img src="{{ $stall->standy }}" alt="Stall Detail">
                        <a href="{{ route('frontend.stall.detail', $stall) }}" target="_blank"
                            class="link-icon-effect btn-detail">
                            <img src="{{ asset('frontend/images/hieu-ung-click_FINAL1.gif') }}" alt="" />
                        </a>
                    </div>
                    @foreach ($stall->images as $image)
                        @if ($loop->iteration <= 4)
                            @php
                                switch ($image->position) {
                                    case '1':
                                        $num = 'one';
                                        $class = '';
                                        break;
                                    case '2':
                                        $num = 'two';
                                        $class = '';
                                        break;
                                    case '3':
                                        $num = 'three';
                                        $class = '';
                                        break;
                                    case '4':
                                        $num = 'four';
                                        $class = '';
                                        break;
                                    case '5':
                                        $num = 'five';
                                        $class = 'btn-detail';
                                        break;
                                    default:
                                        $num = 'six';
                                        $class = 'btn-detail';
                                        break;
                                }
                            @endphp
                            <div class="link-box-effect {{ $num }}">
                                <img src="{{ $image->file_path }}" alt="Stall Detail">
                                <a href="{{ $class ? route('frontend.stall.detail', $stall) : $image->link }}"
                                    target="_blank" class="link-icon-effect {{ $class }}">
                                    <img src="{{ asset('frontend/images/hieu-ung-click_FINAL1.gif') }}"
                                        alt="" />
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="box-container-two">
                    @foreach ($stall->images as $image)
                        @if ($loop->iteration >= 5 && $loop->iteration <= 6)
                            @php
                                switch ($image->position) {
                                    case '1':
                                        $num = 'one';
                                        $class = '';
                                        break;
                                    case '2':
                                        $num = 'two';
                                        $class = '';
                                        break;
                                    case '3':
                                        $num = 'three';
                                        $class = '';
                                        break;
                                    case '4':
                                        $num = 'four';
                                        $class = '';
                                        break;
                                    case '5':
                                        $num = 'five';
                                        $class = 'btn-detail';
                                        break;
                                    default:
                                        $num = 'six';
                                        $class = 'btn-detail';
                                        break;
                                }
                            @endphp
                            <div class="link-box-effect {{ $num }}">
                                <img src="{{ $image->file_path }}" alt="Stall Detail">
                                <a href="{{ $class ? route('frontend.stall.detail', $stall) : $image->link }}"
                                    target="_blank" class="link-icon-effect {{ $class }}">
                                    <img src="{{ asset('frontend/images/hieu-ung-click_FINAL1.gif') }}"
                                        alt="" />
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="link-box-effect logo">
                    <img src="{{ $stall->logo }}" alt="Logo">
                    <a href="{{ route('frontend.stall.detail', $stall) }}" target="_blank"
                        class="link-icon-effect btn-detail">
                        <img src="{{ asset('frontend/images/hieu-ung-click_FINAL1.gif') }}" alt="" />
                    </a>
                </div>
                <div class="link-box-effect contact">
                    <a href="{{ $stall->contact }}" target="_blank" class="link-icon-effect">
                        <img src="{{ asset('frontend/images/hieu-ung-click_FINAL1.gif') }}" alt="" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
