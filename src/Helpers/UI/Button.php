<?php namespace Arcanesoft\Core\Helpers\UI;

/**
 * Class     Button
 *
 * @package  Arcanesoft\Core\Helpers\UI
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Button extends AbstractClickable
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var string */
    protected $type;

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
        $this->setAction($action);
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
