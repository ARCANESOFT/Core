<?php
    $labelClass  = $locked ? 'label label-danger'    : 'label label-success';
    $lockedTrans = $locked ? 'core::statuses.locked' : 'core::statuses.unlocked';
?>
<span class="{{ $labelClass }}">{{ ucfirst(trans($lockedTrans)) }}</span>

