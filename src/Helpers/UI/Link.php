<?php namespace Arcanesoft\Core\Helpers\UI;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * Class     Link
 *
 * @package  Arcanesoft\Core\Helpers\UI
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @TODO: Refactoring
 */
class Link implements Htmlable
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */
    /** @var string */
    protected $action;

    /** @var string */
    protected $url;

    /** @var \Illuminate\Support\Collection */
    protected $attributes;

    /** @var bool */
    protected $disabled;

    /** @var string */
    protected $size = 'md';

    /** @var bool */
    public $withTitle = true;

    /** @var bool */
    protected $withIcon = true;

    /** @var bool */
    protected $withTooltip = true;

    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */
    /**
     * LinkElement constructor.
     *
     * @param  string  $action
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     */
    public function __construct($action, $url, array $attributes = [], $disabled = false)
    {
        $this->disabled   = $disabled;
        $this->action     = $action;
        $this->url        = $url;

        $this->setAttributes($attributes);
    }

    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */
    /**
     * Get the action title.
     *
     * @return string
     */
    protected function getActionTitle()
    {
        return Str::ucfirst(trans("core::actions.{$this->action}"));
    }

    /**
     * Set the attributes.
     *
     * @param  array  $attributes
     *
     * @return self
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = collect($attributes);

        if ($this->disabled)
            $this->cleanAttributes();

        return $this;
    }

    /**
     * Set an attribute.
     *
     * @param  string  $key
     * @param  mixed   $value
     *
     * @return self
     */
    public function setAttribute($key, $value)
    {
        $this->attributes->put($key, $value);

        return $this;
    }

    protected function cleanAttributes()
    {
        $this->attributes = $this->attributes->reject(function ($value, $key) {
            return Str::startsWith($key, ['data-']);
        });

        return $this;
    }

    /**
     * Set the size.
     *
     * @param  string  $size
     *
     * @return self
     */
    public function size($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @param  bool  $withTitle
     *
     * @return self
     */
    public function withTitle($withTitle)
    {
        $this->withTitle = $withTitle;

        return $this;
    }

    /**
     * Show/Hide the icon.
     *
     * @var  bool  $icon
     *
     * @return self
     */
    public function icon($withIcon)
    {
        $this->withIcon = $withIcon;

        return $this;
    }

    /**
     * Enable the tooltip.
     *
     * @param  bool  $withTooltip
     *
     * @return self
     */
    public function tooltip($withTooltip)
    {
        $this->withTooltip = $withTooltip;

        return $this;
    }

    /**
     * Show only the icon and the title as tooltip.
     *
     * @return self
     */
    public function onlyIcon()
    {
        return $this->icon(true)->tooltip(true);
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */
    /**
     * @param  string  $action
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function make($action, $url, array $attributes = [], $disabled = false)
    {
        return new static($action, $url, $attributes, $disabled);
    }

    /* -----------------------------------------------------------------
     |  Other Functions
     | -----------------------------------------------------------------
     */
    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        return '<a'.$this->renderAttributes().'>'.$this->renderValue().'</a>';
    }

    /**
     * Render the link value.
     *
     * @return string
     */
    protected function renderValue()
    {
        return ($this->withTooltip || ! $this->withTitle)
            ? $this->renderIcon()
            : $this->renderIcon().' '.$this->getActionTitle();
    }

    /**
     * Render the icon.
     *
     * @return string
     */
    protected function renderIcon()
    {
        $icon = Arr::get([
            'add'     => 'fa fa-fw fa-plus',
            'delete'  => 'fa fa-fw fa-trash-o',
            'detach'  => 'fa fa-fw fa-chain-broken',
            'disable' => 'fa fa-fw fa-power-off',
            'edit'    => 'fa fa-fw fa-pencil',
            'enable'  => 'fa fa-fw fa-power-off',
            'restore' => 'fa fa-fw fa-reply',
            'show'    => 'fa fa-fw fa-search',
            'update'  => 'fa fa-fw fa-pencil',
        ], $this->action);

        return '<i class="'.$icon.'"></i>';
    }

    /**
     * Render the attributes.
     *
     * @return string
     */
    protected function renderAttributes()
    {
        $attributes = collect();
        $attributes->put('href',  $this->disabled ? 'javascript:void(0);' : $this->url);
        $attributes->put('class', $this->getLinkClass());

        if ($this->withTooltip) {
            $attributes->put('data-toggle', 'tooltip');
            $attributes->put('data-original-title', $this->getActionTitle());
        }

        if ($this->disabled) {
            $attributes->put('disabled', 'disabled');
        }

        $attributes = $attributes->merge($this->attributes);

        return html()->attributes($attributes->toArray());
    }

    /**
     * Get the link class.
     *
     * @return string
     */
    protected function getLinkClass()
    {
        return implode(' ', array_filter(['btn', $this->getLinkSize(), $this->getLinkColor()]));
    }

    protected function getLinkColor()
    {
        if ($this->disabled)
            return 'btn-default';

        return Arr::get([
            'add'     => 'btn-primary',
            'delete'  => 'btn-danger',
            'detach'  => 'btn-danger',
            'disable' => 'btn-inverse',
            'edit'    => 'btn-warning',
            'enable'  => 'btn-success',
            'restore' => 'btn-primary',
            'show'    => 'btn-info',
            'update'  => 'btn-warning',
        ], $this->action);
    }

    protected function getLinkSize()
    {
        return Arr::get([
            'lg' => 'btn-lg',
            'md' => '',
            'sm' => 'btn-sm',
            'xs' => 'btn-xs',
        ], $this->size);
    }

    /* -----------------------------------------------------------------
     |  Helpers Methods
     | -----------------------------------------------------------------
     */
    /**
     * Generate activate icon link.
     *
     * @param  bool    $active
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function activateIcon($active, $url, array $attributes = [], $disabled = false)
    {
        return self::make($active ? 'enable' : 'disable', $url, $attributes, $disabled)
                   ->size('xs')
                   ->withTitle(false)
                   ->icon(true);
    }

    /**
     * Generate activate icon link for modals (reverse button based on active state).
     *
     * @param  bool    $active
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function activateModalIcon($active, $url, array $attributes = [], $disabled = false)
    {
        $dataAttribute = 'data-current-status';
        $statuses      = [
            'enabled'  => 'enabled',
            'disabled' => 'disabled',
        ];

        return static::activateIcon( ! $active, $url, $attributes, $disabled)
                     ->setAttribute($dataAttribute, $statuses[$active ? 'enabled' : 'disabled']);
    }

    /**
     * Generate activate link with icon for modals (reverse button based on active state).
     *
     * @param  bool    $active
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function activateModalWithIcon($active, $url, array $attributes = [], $disabled = false)
    {
        $dataAttribute = 'data-current-status';
        $statuses      = [
            'enabled'  => 'enabled',
            'disabled' => 'disabled',
        ];

        return static::activateIcon( ! $active, $url, $attributes, $disabled)
                     ->setAttribute($dataAttribute, $statuses[$active ? 'enabled' : 'disabled'])
                     ->size('sm')
                     ->withTitle(true)
                     ->tooltip(false);
    }

    /**
     * Generate add icon link.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function addIcon($url, array $attributes = [], $disabled = false)
    {
        return self::make('add', $url, $attributes, $disabled)
                   ->size('xs')
                   ->withTitle(false);
    }

    /**
     * Generate delete icon link for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function deleteModalIcon($url, array $attributes = [], $disabled = false)
    {
        return self::make('delete', $url, $attributes, $disabled)
                   ->size('xs')
                   ->withTitle(false);
    }

    /**
     * Generate delete link with icon for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function deleteModalWithIcon($url, array $attributes = [], $disabled = false)
    {
        return static::make('delete', $url, $attributes, $disabled)
                     ->size('sm')
                     ->withTitle(true)
                     ->tooltip(false);
    }

    /**
     * Generate detach icon link for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function detachModalIcon($url, array $attributes = [], $disabled = false)
    {
        return self::make('detach', $url, $attributes, $disabled)
                   ->size('xs')
                   ->withTitle(false);
    }

    /**
     * Generate edit icon link.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function editIcon($url, array $attributes = [], $disabled = false)
    {
        return self::make('edit', $url, $attributes, $disabled)
                   ->size('xs')
                   ->withTitle(false);
    }

    /**
     * Generate edit link with icon.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function editWithIcon($url, array $attributes = [], $disabled = false)
    {
        return self::make('edit', $url, $attributes, $disabled)
                   ->size('sm')
                   ->tooltip(false);
    }

    /**
     * Generate restore icon link for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function restoreModalIcon($url, array $attributes = [], $disabled = false)
    {
        return self::make('restore', $url, $attributes, $disabled)
                   ->size('xs')
                   ->withTitle(false);
    }

    /**
     * Generate restore link with icon for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function restoreModalWithIcon($url, array $attributes = [], $disabled = false)
    {
        return static::make('restore', $url, $attributes, $disabled)
                     ->size('sm')
                     ->withTitle(true)
                     ->tooltip(false);
    }

    /**
     * Generate show icon link.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function showIcon($url, array $attributes = [], $disabled = false)
    {
        return self::make('show', $url, $attributes, $disabled)
                   ->size('xs')
                   ->withTitle(false);
    }
}
