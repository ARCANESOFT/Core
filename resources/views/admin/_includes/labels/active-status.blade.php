<?php
    $labelClass  = $active ? 'label label-success'    : 'label label-default';
    $activeTrans = $active ? 'core::statuses.enabled' : 'core::statuses.disabled';
?>
<span class="{{ $labelClass }}">{{ ucfirst(trans($activeTrans)) }}</span>
