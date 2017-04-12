<?php namespace Arcanesoft\Core\Helpers\UI;

/**
 * Class     Link
 *
 * @package  Arcanesoft\Core\Helpers\UI
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Link extends AbstractClickable
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */
    /** @var string */
    protected $url;

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
        $this->setAction($action);
        $this->setUrl($url);
        $this->setAttributes($attributes);
        $this->setDisabled($disabled);
    }

    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */
    /**
     * Set the link url.
     *
     * @param  string  $url
     *
     * @return \Arcanesoft\Core\Helpers\UI\Link
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */
    /**
     * Make link instance.
     *
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

    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        return '<a'.$this->renderAttributes().'>'.$this->renderValue().'</a>';
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
        $attributes->put('href',  $this->disabled ? 'javascript:void(0);' : $this->url);
        $attributes->put('class', $this->getStyleClass());

        if ($this->withTooltip) {
            // This is for Bootstrap
            $attributes->put('data-toggle', 'tooltip');
            $attributes->put('data-original-title', $this->getTitle());
        }

        if ($this->disabled)
            $attributes->put('disabled', 'disabled');

        return html()->attributes($attributes->merge($this->attributes)->toArray());
    }

    /**
     * Get the value from config.
     *
     * @param  string  $key
     * @param  mixed   $default
     *
     * @return mixed
     */
    protected function getConfig($key, $default = null)
    {
        return config("arcanesoft.core.ui.links.{$key}", $default);
    }
}
