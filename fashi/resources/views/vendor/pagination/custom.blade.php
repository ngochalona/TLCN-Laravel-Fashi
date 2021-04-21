
@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
    @if ($paginator->onFirstPage())
    <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">←</a>
    </li>
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">←</a></li>
    @endif



    @foreach ($elements as $element)

        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif



        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active my-active page-item"><span class="page-link rounded-circle"
                    style="background-color: #5cb85c !important;
                        color: white !important;
                        border-color: #5cb85c !important;">{{ $page }}</span></li>
                @else
                    <li class="page-item"><a class="page-link rounded-circle" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach



    @if ($paginator->hasMorePages())
    <li class="page-item">
        <a class="page-link rounded-circle"  href="{{ $paginator->nextPageUrl() }}" rel="next">→</a></li>
    @else
    <li class="page-item disabled">
        <a class="page-link rounded-circle">→</a></li>
    @endif
</ul>
@endif
