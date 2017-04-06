<?php
$attributes = array_merge(isset($attributes) ? $attributes : [], [
    'class' => $linkClass,
]);

if ($disabled) {
    $url                    = 'javascript:void(0);';
    $attributes['class']    = 'btn btn-sm btn-default';
    $attributes['disabled'] = 'disabled';
};
?>
<a href="{{ $url }}"{!! html()->attributes($attributes) !!}>
    <i class="{{ $iconClass }}"></i> {{ ucfirst($linkTitle) }}
</a>
