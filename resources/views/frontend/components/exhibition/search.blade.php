@if (count($data) > 0)
    @foreach ($data as $key => $items)
        @foreach ($items as $item)
            <li>
                <a href="{{ route('frontend.exhibition.show', ['page' => $key]) }}">
                    <div class="imgBx">
                        <img src="{{ $item->logo }}" alt="Logo">
                    </div>
                    <div class="info">
                        <h5>{{ $item->name }}</h5>
                        <p>{{ $item->description }}</p>
                    </div>
                </a>
            </li>
        @endforeach
    @endforeach
@else
    <li>
        <p class="px-3 py-2 m-0 text-muted">Không tìm thấy gian hàng</p>
    </li>
@endif
