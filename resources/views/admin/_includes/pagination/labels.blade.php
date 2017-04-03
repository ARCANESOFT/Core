<?php /** @var  \Illuminate\Pagination\LengthAwarePaginator  $paginator */ ?>
<span class="label label-{{ $paginator->total() ? 'info' : 'default' }}" style="margin-right: 5px;">
    Total : {{ $paginator->total() }}
</span>

@if ($paginator->hasPages())
<span class="label label-info">
    {{ trans('core::pagination.pages', ['current' => $paginator->currentPage(), 'last' => $paginator->lastPage()]) }}
</span>
@endif
