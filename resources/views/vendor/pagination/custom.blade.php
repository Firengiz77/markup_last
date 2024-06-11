@if ($paginator->hasPages())

    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
          
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.prev')">
                  <a href="" class="prev page-numbers">
                  <span aria-hidden="true">Prev</span>
                  </a>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="prev page-numbers" aria-label="@lang('pagination.prev')">Prev</a>
                </li>
            @endif





            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <li><a class="page-numbers disabled"  aria-disabled="true" href="#"><span>{{ $element }}</span></a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())

                            <li class="active current" aria-current="page">
                                <a href="#" class="page-numbers active current">
                                <span>{{ $page }}</span>
                                </a>
                            </li>
                        @else
                       
                            <li><a class="page-numbers" href="{{ $url }}"><span>{{ $page }}</span></a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
           
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="next page-numbers" rel="next" aria-label="@lang('pagination.next')">Next</a>
                </li>
            @else
                <li class="disabled " aria-disabled="true" aria-label="@lang('pagination.next')">
                   <a href="" class="next page-numbers">
                   <span aria-hidden="true">Next</span>
                   </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
