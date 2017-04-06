<?php
$labelClass = isset($labelClass) ? $labelClass : 'label label-danger';
?>
<span class="{{ $labelClass }}">
    <i class="fa fa-fw fa-trash-o"></i> {{ ucfirst(trans('core::statuses.trashed')) }}
</span>

