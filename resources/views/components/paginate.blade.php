@if($paginator->hasPages())
    <ul class="pagination_action">
        <li><a href="{{ $paginator->previousPageUrl() }}" >Previous Page</a></li>
        <li><a href="{{ $paginator->nextPageUrl() }}" >Next Page</a></li>
    </ul>
@endif
