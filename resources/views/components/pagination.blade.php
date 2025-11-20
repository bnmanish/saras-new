@if ($paginator->hasPages())
    <div class="pagination dashboard-pagination">
        <ul>
            <li>
                @if ($paginator->onFirstPage())
                    <a href="#" class="page-link prev">Prev</a>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="page-link prev">Prev</a>
                @endif
            </li>
            @for ($page = 1; $page <= $paginator->lastPage(); $page++)
                <li>
                    @if ($page == $paginator->currentPage())
                        <a href="#" class="page-link active">{{ $page }}</a>
                    @else
                        <a href="{{ $paginator->url($page) }}" class="page-link">{{ $page }}</a>
                    @endif
                </li>
            @endfor
            <li>
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link next">Next</a>
                @else
                    <a href="#" class="page-link next">Next</a>
                @endif
            </li>
        </ul>
    </div>
@endif