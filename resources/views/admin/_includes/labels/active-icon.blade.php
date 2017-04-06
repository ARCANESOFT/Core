<?php
    $labelClass  = $active ? 'label label-success'    : 'label label-default';
    $activeTrans = $active ? 'core::statuses.enabled' : 'core::statuses.disabled';
    $iconClass   = $active ? 'fa fa-fw fa-check'      : 'fa fa-fw fa-ban';
?>
<span class="{{ $labelClass }}" data-toggle="tooltip" data-original-title="{{ ucfirst(trans($activeTrans)) }}">
    <i class="{{ $iconClass }}"></i>
</span>

