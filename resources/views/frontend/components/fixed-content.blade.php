<main id="main">
    {{-- @foreach ($submits as $submit)
        @include('frontend.components.sections.submit', [
            'submit' => $submit,
            'index' => $loop->iteration,
            'pathImg' => asset("frontend/images/submit$loop->iteration.svg"),
        ])
    @endforeach --}}

    @include('frontend.components.sections.submit')

    @include('frontend.components.sections.backdrop')

    {{-- @include('frontend.components.sections.team') --}}

    {{-- @include('frontend.components.sections.add') --}}

    {{-- @include('frontend.components.sections.testimonials') --}}

    @include('frontend.components.sections.call-to-action')

    {{-- @foreach ($submits as $submit)
        @include('frontend.components.sections.preview-pdf', [
            'submit' => $submit,
            'index' => $loop->iteration,
            'path' => asset("vendor/pdf-previewer/web/viewer.html?file=../../..$submit->schedule"),
        ])
    @endforeach --}}
</main>
