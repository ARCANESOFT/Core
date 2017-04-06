<?php
    $labelClass  = $locked ? 'danger'                : 'success';
    $lockedTrans = $locked ? 'core::statuses.locked' : 'core::statuses.unlocked';
    $iconClass   = $locked ? 'fa fa-fw fa-lock'      : 'fa fa-fw fa-unlock';
?>
<span class="label label-{{ $labelClass }}" data-toggle="tooltip" data-original-title="{{ ucfirst(trans($lockedTrans)) }}">
    <i class="{{ $iconClass }}"></i>
</span>

