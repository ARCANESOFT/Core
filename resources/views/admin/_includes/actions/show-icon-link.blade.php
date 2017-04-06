<?php
$url       = isset($url)       ? $url       : '#';
$linkClass = isset($linkClass) ? $linkClass : 'btn btn-xs btn-info';
$iconClass = isset($iconClass) ? $iconClass : 'fa fa-fw fa-search';
$linkTitle = isset($linkTitle) ? $linkClass : trans('core::actions.show');
$disabled  = isset($disabled)  ? $disabled  : false;
?>
@include('core::admin._includes.actions._icon-link', compact('url', 'linkClass', 'linkTitle', 'iconClass'))
