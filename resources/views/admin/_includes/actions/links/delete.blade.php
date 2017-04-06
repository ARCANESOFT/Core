<?php
$url       = isset($url)       ? $url       : '#';
$linkClass = isset($linkClass) ? $linkClass : 'btn btn-sm btn-danger';
$iconClass = isset($iconClass) ? $iconClass : 'fa fa-fw fa-trash-o';
$linkTitle = isset($linkTitle) ? $linkClass : trans('core::actions.delete');
$disabled  = isset($disabled)  ? $disabled  : false;
?>
@include('core::admin._includes.actions.links._base', compact('url', 'linkClass', 'linkTitle', 'iconClass', 'disabled'))
