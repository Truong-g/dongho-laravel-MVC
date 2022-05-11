@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled pagination-items" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class = "btn--paginate-disable" aria-hidden="true"><i class="fas fa-arrow-alt-circle-left"></i></span>
                </li>
            @else
                <li class="pagination-items">
                    <a class="btn--paginate" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fas fa-arrow-alt-circle-left"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled pagination-items" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active pagination-items" aria-current="page"><span class="text--paginate-disable">{{ $page }}</span></li>
                        @else
                            <li class="pagination-items"><a class="text--paginate" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-items">
                    <a class="btn--paginate" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fas fa-arrow-alt-circle-right"></i></a>
                </li>
            @else
                <li class="disabled pagination-items" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="btn--paginate-disable" aria-hidden="true"><i class="fas fa-arrow-alt-circle-right"></i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
