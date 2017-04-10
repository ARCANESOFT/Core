<?php namespace Arcanesoft\Core\Helpers\UI;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

/**
 * Class     Button
 *
 * @package  Arcanesoft\Core\Helpers\UI
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Button implements Htmlable
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */
    /** @var string */
    protected $action;

    /** @var string */
    protected $type;

    /** @var \Illuminate\Support\Collection */
    protected $attributes;

    /** @var bool */
    protected $disabled;

    /** @var string */
    protected $size = 'md';

    /** @var bool */
    protected $withTitle = true;

    /** @var bool */
    protected $withIcon = true;

    /** @var bool */
    protected $withTooltip = false;

    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */
    /**
     * Button constructor.
     *
     * @param  string  $action
     * @param  string  $type
     * @param  array   $attributes
     * @param  bool    $disabled
     */
    public function __construct($action, $type = 'button', array $attributes = [], $disabled)
    {
        $this->action = $action;
        $this->setType($type);
        $this->setAttributes($attributes);
        $this->setDisabled($disabled);
    }

    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */
    /**
     * Set the button type.
     *
     * @param  string  $type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = in_array($type = strtolower($type), ['button', 'submit', 'reset']) ? $type : 'button';

        return $this;
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

    /**
     * Set disabled state.
     *
     * @param  bool  $disabled
     *
     * @return self
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
     * Show/Hide the title.
     *
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
     * @var  bool  $withIcon
     *
     * @return self
     */
    public function withIcon($withIcon)
    {
        $this->withIcon = (bool) $withIcon;

        return $this;
    }

    /**
     * Enable the tooltip.
     *
     * @param  bool  $withTooltip
     *
     * @return self
     */
    public function withTooltip($withTooltip)
    {
        $this->withTooltip = (bool) $withTooltip;

        return $this;
    }

    /**
     * Show only the icon and the title as tooltip.
     *
     * @return self
     */
    public function onlyIcon()
    {
        return $this->withIcon(true)->withTooltip(true);
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */
    /**
     * Make a button instance.
     *
     * @param  string  $action
     * @param  string  $type
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function make($action, $type = 'button', array $attributes = [], $disabled = false)
    {
        return new static($action, $type, $attributes, $disabled);
    }

    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        return '<button'.$this->renderAttributes().'>'.$this->renderValue().'</button>';
    }

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
     * Render the attributes.
     *
     * @return string
     */
    protected function renderAttributes()
    {
        $attributes = collect();
        $attributes->put('type', $this->type);
        $attributes->put('class', $this->getStyleClass());

        if ($this->withTooltip) {
            // This is for Bootstrap
            $attributes->put('data-toggle', 'tooltip');
            $attributes->put('data-original-title', $this->getTitle());
        }

        if ($this->disabled) {
            $attributes->put('type', 'button');
            $attributes->put('disabled', 'disabled');
        }

        return html()->attributes($attributes->merge($this->attributes)->toArray());
    }

    /**
     * Render the link value.
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
     * Get the button class.
     *
     * @return string
     */
    protected function getStyleClass()
    {
        return implode(' ', array_filter(['btn', $this->getSize(), $this->getColor()]));
    }

    /**
     * Get the button size.
     *
     * @return string|null
     */
    protected function getSize()
    {
        return $this->getConfig("sizes.{$this->size}");
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
     * Render the icon.
     *
     * @return string
     */
    protected function renderIcon()
    {
        return '<i class="'.$this->getIcon().'"></i>';
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
     * Get the value from config.
     *
     * @param  string  $key
     *
     * @return mixed
     */
    protected function getConfig($key)
    {
        return config("arcanesoft.core.ui.buttons.{$key}");
    }
}
