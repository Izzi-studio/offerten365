<?php
    $link_limit = 5;
?>

@if ($paginator->lastPage() > 1)
    <div class="pagination">
    
        @if ($paginator->onFirstPage())
            <span class="pagination__item pagination__item_prev pagination__item_disabled"></span>
        @else
            <a class="pagination__item pagination__item_prev" href="{{ $paginator->previousPageUrl() }}"></a>
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
                    <span class="pagination__item pagination__item_current">{{ $i }}</span>
                @else
                    <a class="pagination__item" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                @endif
            @endif
        @endfor
            
        @if ($paginator->hasMorePages())
            <a class="pagination__item pagination__item_next" href="{{ $paginator->nextPageUrl() }}"></a>
        @else
            <span class="pagination__item pagination__item_next pagination__item_disabled"></span>
        @endif

    </div>
@endif