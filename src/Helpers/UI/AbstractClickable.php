<?php namespace Arcanesoft\Core\Helpers\UI;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

/**
 * Class     AbstractClickable
 *
 * @package  Arcanesoft\Core\Helpers\UI
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class AbstractClickable implements Htmlable
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var string */
    protected $action;

    /** @var \Illuminate\Support\Collection */
    protected $attributes;

    /** @var bool */
    protected $disabled = false;

    /** @var string */
    protected $size = 'md';

    /** @var bool */
    protected $withTitle = true;

    /** @var bool */
    protected $withIcon = true;

    /** @var bool */
    protected $withTooltip = false;

    /** @var array */
    protected $extraClass = [];

    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */

    /**
     * Set the action.
     *
     * @param  string  $action
     *
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Set the attributes.
     *
     * @param  array  $attributes
     *
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = collect($attributes);

        return $this;
    }

    /**
     * Set an attribute.
     *
     * @param  string  $key
     * @param  mixed   $value
     *
     * @return $this
     */
    public function setAttribute($key, $value)
    {
        $this->attributes->put($key, $value);

        return $this;
    }

    /**
     * Append a style class.
     *
     * @param  string  $class
     *
     * @return $this
     */
    public function appendClass($class)
    {
        $this->extraClass = array_merge($this->extraClass, explode(' ', $class));

        return $this;
    }

    /**
     * Set disabled state.
     *
     * @param  bool  $disabled
     *
     * @return $this
     */
    public function setDisabled($disabled)
    {
        $this->disabled = (bool) $disabled;

        if ($this->disabled) {
            $this->attributes = $this->attributes->reject(function ($value, $key) {
                return Str::startsWith($key, ['data-']);
            });
        }

        return $this;
    }

    /**
     * Forget attribute(s).
     *
     * @param  string|array  $attributes
     *
     * @return $this
     */
    public function forgetAttribute($attributes)
    {
        $this->attributes->forget($attributes);

        return $this;
    }

    /**
     * Set the size.
     *
     * @param  string  $size
     *
     * @return $this
     */
    public function size($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Show/Hide the title.
     *
     * @param  bool  $withTitle
     *
     * @return $this
     */
    public function withTitle($withTitle)
    {
        $this->withTitle = $withTitle;

        return $this;
    }

    /**
     * Show/Hide the icon.
     *
     * @var  bool  $withIcon
     *
     * @return $this
     */
    public function withIcon($withIcon)
    {
        $this->withIcon = (bool) $withIcon;

        return $this;
    }

    /**
     * Enable/Disable the tooltip.
     *
     * @param  bool  $withTooltip
     *
     * @return $this
     */
    public function withTooltip($withTooltip)
    {
        $this->withTooltip = (bool) $withTooltip;

        return $this;
    }

    /**
     * Show only the icon and the title as tooltip.
     *
     * @return $this
     */
    public function onlyIcon()
    {
        return $this->withIcon(true)->withTooltip(true);
    }

    /**
     * Add loading text attribute.
     *
     * @return $this
     */
    public function withLoadingText()
    {
        return $this->setAttribute('data-loading-text', Str::ucfirst(trans('core::generals.loading')));
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the string content for the link instance.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toHtml();
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Render the value.
     *
     * @return string
     */
    protected function renderValue()
    {
        if ($this->withTooltip || ! $this->withTitle)
            return $this->renderIcon();

        return $this->withIcon
            ? $this->renderIcon().' '.$this->getTitle()
            : $this->getTitle();
    }

    /**
     * Render the icon.
     *
     * @return string
     */
    protected function renderIcon()
    {
        return '<i class="'.$this->getIcon().'"></i>';
    }

    /**
     * Get the action title.
     *
     * @return string
     */
    protected function getTitle()
    {
        return Str::ucfirst(trans("core::actions.{$this->action}"));
    }

    /**
     * Get the icon.
     *
     * @return string|null
     */
    protected function getIcon()
    {
        return $this->getConfig("icons.{$this->action}");
    }

    /**
     * Get the button class.
     *
     * @return string
     */
    protected function getStyleClass()
    {
        $classes = array_merge([
            $this->getBaseStyleClass(),
            $this->getSize(),
            $this->getColor(),
        ], $this->extraClass);

        return implode(' ', array_filter(array_unique($classes, SORT_STRING)));
    }

    /**
     * Get the base style class.
     *
     * @return string
     */
    protected function getBaseStyleClass()
    {
        return 'btn';
    }

    /**
     * Get the link size.
     *
     * @return string|null
     */
    protected function getSize()
    {
        return $this->getConfig("sizes.{$this->size}");
    }

    /**
     * Get the link color.
     *
     * @return string
     */
    protected function getColor()
    {
        $state = $this->disabled ? 'default' : $this->action;

        return $this->getConfig("colors.{$state}");
    }

    /**
     * Get the value from config.
     *
     * @param  string  $key
     *
     * @return mixed
     */
    abstract protected function getConfig($key);
}
