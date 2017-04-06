<?php
$url       = isset($url)       ? $url       : '#';
$linkClass = isset($linkClass) ? $linkClass : 'btn btn-xs btn-danger';
$iconClass = isset($iconClass) ? $iconClass : 'fa fa-fw fa-trash-o';
$linkTitle = isset($linkTitle) ? $linkClass : trans('core::actions.delete');
$disabled  = isset($disabled)  ? $disabled  : false;
?>
@include('core::admin._includes.actions._icon-link', compact('url', 'linkClass', 'linkTitle', 'iconClass'))
