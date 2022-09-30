<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $title }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @foreach ($breadcrumb as $key => $value)
                        <li class="breadcrumb-item {{ $loop->last && 'active' }}">
                            @if ($loop->last)
                                {{ $value[0] }}
                            @else
                                <a href="{{ $value[1] }}">{{ $value[0] }}</a>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
