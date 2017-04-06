<?php
$positive = isset($positive) ? $positive : 'label label-info';
$zero     = isset($zero)     ? $zero     : 'label label-default';
$negative = isset($negative) ? $negative : 'label label-danger';

$countClass = $count > 0 ? $positive : ($count < 0 ? $negative : $zero);
?>
<span class="{{ $countClass }}">{{ $count }}</span>
