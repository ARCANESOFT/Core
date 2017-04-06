<?php /** @var  \Illuminate\Pagination\LengthAwarePaginator  $paginator */ ?>
@if ($paginator->hasPages())
    <span class="label label-info label-paginator-pages">
        {{ trans('core::pagination.pages', ['current' => $paginator->currentPage(), 'last' => $paginator->lastPage()]) }}
    </span>
@endif
