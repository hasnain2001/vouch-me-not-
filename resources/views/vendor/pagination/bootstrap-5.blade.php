<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<style>
        .pagination-wrapper {
        background-color: #f9f9f9;
        border-radius: 10px;
    }

    .pagination .page-item .page-link {
        color: #704c9f; /* Primary color */
        border: none;
        padding: 0.5rem 1rem;
        margin: 0 5px;
        transition: background-color 0.3s ease;
    }

    .pagination .page-item.active .page-link {
        background-color: #704c9f;
        color: white;
    }

    .pagination .page-item:hover .page-link {
        background-color: #e0d4f3;
        color: #704c9f;
    }

    .pagination .page-item.disabled .page-link {
        color: #bababa;
        background-color: transparent;
    }

    .pagination .page-item .page-link.rounded-pill {
        border-radius: 50px;
    }

    .pagination .page-link:hover {
        text-decoration: none;
    }

    .navbar-light .pagination {
        margin-bottom: 0;
        padding: 0;
        border-radius: 10px;
    }

    @media (max-width: 767.98px) {
        .pagination {
            font-size: 0.8rem;
        }
    }

</style>
</head>
<body>
    @if ($paginator->hasPages())
    <nav class="pagination-wrapper bg-light p-3 d-flex justify-items-center justify-content-between rounded shadow-sm">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination pagination-sm mb-0">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link rounded-pill text-muted">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link rounded-pill text-primary" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link rounded-pill text-primary" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link rounded-pill text-muted">@lang('pagination.next')</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div class="text-muted">
                <p class="small mb-0">
                    {!! __('Showing') !!}
                    <span class="fw-bold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="fw-bold">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="fw-bold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <ul class="pagination pagination-lg mb-0">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link rounded-pill" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link rounded-pill" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link rounded-pill">{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page"><span class="page-link rounded-pill">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link rounded-pill" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link rounded-pill" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link rounded-pill" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif

</body>
</html>
