<?php
$attributes = array_merge(isset($attributes) ? $attributes : [], [
    'class'               => $linkClass,
    'data-toggle'         => 'tooltip',
    'data-original-title' => ucfirst($linkTitle)
]);

if ($disabled) {
    $url                    = 'javascript:void(0);';
    $attributes['class']    = 'btn btn-xs btn-default';
    $attributes['disabled'] = 'disabled';
};
?>
<a href="{{ $url }}"{!! html()->attributes($attributes) !!}>
    <i class="{{ $iconClass }}"></i>
</a>
