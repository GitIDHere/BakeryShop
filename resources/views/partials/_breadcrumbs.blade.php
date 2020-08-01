@if (count($breadcrumbs))
    @foreach ($breadcrumbs as $breadcrumb)
        @if ($breadcrumb->url && !$loop->last)
            <a href="{{ $breadcrumb->url }}"><i class="fa fa-home"></i> {{ $breadcrumb->title }}</a>
        @else
            <span>{{ $breadcrumb->title }}</span>
        @endif
    @endforeach
@endif