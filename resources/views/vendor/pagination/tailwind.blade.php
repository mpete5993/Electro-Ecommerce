
@if ($paginator->hasPages())
<div class="store-filter clearfix">
    <ul class="store-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        {{-- <li class="" aria-disabled="true" disabled> <i class="fa fa-angle-left"></i> </li> --}}
            @else
            <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>
            {{-- <li><a href="{{ $paginator->previousPageUrl() }}">«</a></li> --}}
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li ><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="active">{{ $page }}</li>
                        {{-- <li><a href="" class="active">{{ $page }}</a></li> --}}
                    @else
                        <li><a  href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fa fa-angle-right"></i></a>
            </li>
        @else
        {{-- <li class="" aria-disabled="true" disabled> <i class="fa fa-angle-right"></i> </li> --}}
        @endif
    </ul>
</div>
@endif