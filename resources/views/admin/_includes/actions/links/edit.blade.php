<?php
$url       = isset($url)       ? $url       : '#';
$linkClass = isset($linkClass) ? $linkClass : 'btn btn-sm btn-warning';
$iconClass = isset($iconClass) ? $iconClass : 'fa fa-fw fa-pencil';
$linkTitle = isset($linkTitle) ? $linkClass : trans('core::actions.edit');
$disabled  = isset($disabled)  ? $disabled  : false;
?>
@include('core::admin._includes.actions.links._base', compact('url', 'linkClass', 'linkTitle', 'iconClass', 'disabled'))
