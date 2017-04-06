<?php
    $labelClass  = $active ? 'success' : 'default';
    $activeTrans = $active ? 'core::statuses.enabled' : 'core::statuses.disabled';
?>
<span class="label label-{{ $labelClass }}">{{ ucfirst(trans($activeTrans)) }}</span>
