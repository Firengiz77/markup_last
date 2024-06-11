@if ($paginator->hasPages())
{{--    <ul class="pagination">--}}
{{--        <li class="page-item page-item-custom">--}}
{{--            <a class="page-link" href="javascript:void(0)" tabindex="-1">1</a>--}}
{{--        </li>--}}
{{--        <li class="page-item page-item-custom"><a class="page-link" href="javascript:void(0)">2</a></li>--}}
{{--        <li class="page-item page-item-custom"><a class="page-link" href="javascript:void(0)">3</a></li>--}}
{{--        <li class="page-item page-item-custom"><a class="page-link" href="javascript:void(0)"><i class="fa-solid fa-angle-right"></i></a></li>--}}
{{--    </ul>--}}

    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
{{--                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">--}}
{{--                    <span class="page-link" aria-hidden="true">&lsaquo;</span>--}}
{{--                </li>--}}

                <li class="page-item page-item-custom disabled"><a class="page-link" href="#!"><i class="fa-solid fa-angle-left"></i></a></li>

            @else

                <li class="page-item page-item-custom"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="fa-solid fa-angle-left"></i></a></li>

            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
{{--                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>--}}
                            <li class="page-item page-item-custom active"><a class="page-link" href="#!">{{ $page }}</a></li>
                        @else
{{--                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>--}}
                                <li class="page-item page-item-custom"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>

                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())

                <li class="page-item page-item-custom"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="fa-solid fa-angle-right"></i></a></li>

            @else

                <li class="page-item page-item-custom disabled"><a class="page-link" href="javascript:void(0)"><i class="fa-solid fa-angle-right"></i></a></li>
            @endif
        </ul>
    </nav>
@endif
