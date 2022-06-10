<?php
    $link_limit = 7;
?>

@if ($paginator->lastPage() > 1)
    <div class="d-flex justify-content-between align-items-center flex-wrap">
        <div class="d-flex flex-wrap py-2 mr-3">
            @if ($paginator->onFirstPage())
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-icon btn-light mr-2 my-1 disabled">
                    <i class="ki ki-bold-arrow-back icon-xs"></i>
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-icon btn-light mr-2 my-1">
                    <i class="ki ki-bold-arrow-back icon-xs"></i>
                </a>
            @endif

            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <?php
                    $half_total_links = floor($link_limit / 2);
                    $from = $paginator->currentPage() - $half_total_links;
                    $to = $paginator->currentPage() + $half_total_links;
                    if ($paginator->currentPage() < $half_total_links) {
                        $to += $half_total_links - $paginator->currentPage();
                    }
                    if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                        $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                    }
                ?>
                @if ($from < $i && $i < $to)
                    @if ($i == $paginator->currentPage())
                        <a href="#" class="btn btn-icon border-0 btn-light btn-hover-primary active mr-2 my-1">{{ $i }}</a>
                    @else
                        <a class="btn btn-icon border-0 btn-light mr-2 my-1" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    @endif
                @endif
            @endfor
                
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-icon btn-light mr-2 my-1">
                    <i class="ki ki-bold-arrow-next icon-xs"></i>
                </a>
            @else
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-icon btn-light mr-2 my-1 disabled">
                    <i class="ki ki-bold-arrow-next icon-xs"></i>
                </a>
            @endif
        </div>
    </div>
@endif