<?php /** @var  \Illuminate\Pagination\LengthAwarePaginator  $paginator */ ?>
<span class="label label-{{ $paginator->total() ? 'info' : 'default' }} label-paginator-total" style="margin-right: 5px;">
    Total : {{ $paginator->total() }}
</span>
