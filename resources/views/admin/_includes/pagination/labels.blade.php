<?php /** @var  \Illuminate\Pagination\LengthAwarePaginator  $paginator */ ?>
@include('core::admin._includes.pagination.total-label', compact('paginator'))
@include('core::admin._includes.pagination.pages-label', compact('paginator'))
