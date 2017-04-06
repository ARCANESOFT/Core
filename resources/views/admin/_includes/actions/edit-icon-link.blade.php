<?php
$url       = isset($url)       ? $url       : '#';
$linkClass = isset($linkClass) ? $linkClass : 'btn btn-xs btn-warning';
$iconClass = isset($iconClass) ? $iconClass : 'fa fa-fw fa-pencil';
$linkTitle = isset($linkTitle) ? $linkClass : trans('core::actions.edit');
$disabled  = isset($disabled)  ? $disabled  : false;
?>
@include('core::admin._includes.actions._icon-link', compact('url', 'linkClass', 'linkTitle', 'iconClass', 'disabled'))
