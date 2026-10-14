@if ($paginator->hasPages())
        <div class="pagination-area text-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="page-numbers first disabled" aria-hidden="true">&lsaquo;</span>
            @else
                <a class="page-numbers first" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="page-numbers disabled" aria-disabled="true">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="page-numbers current" aria-current="page">{{ $page }}</span>
                        @else
                            <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="page-numbers latest" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            @else
                <span class="page-numbers latest disabled" aria-hidden="true">&rsaquo;</span>
            @endif
        </div>
@endif
