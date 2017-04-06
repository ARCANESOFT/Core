<?php
    $labelClass  = $active ? 'success' : 'default';
    $activeTrans = $active ? 'core::statuses.enabled' : 'core::statuses.disabled';
    $iconClass   = $active ? 'fa fa-check' : 'fa fa-ban';
?>
<span class="label label-{{ $labelClass }}" data-toggle="tooltip" data-original-title="{{ ucfirst(trans($activeTrans)) }}">
    <i class="{{ $iconClass }}"></i>
</span>

