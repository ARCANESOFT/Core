<?php namespace Arcanesoft\Core\Helpers\UI;

use Arcanesoft\Settings\Helpers\Arr;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class Link implements Htmlable
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */
    /** @var  string */
    protected $url;

    /** @var  string */
    protected $title;

    /** @var  string */
    protected $icon;

    /** @var  array */
    protected $attributes = [];

    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */
    /**
     * Link constructor.
     */
    public function __construct()
    {
        //
    }

    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set the title.
     *
     * @param  string  $title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set the icon.
     *
     * @param  string  $icon
     *
     * @return self
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

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
        $this->attributes = $attributes;

        return $this;
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */
    /**
     * @param  string  $url
     * @param  string  $title
     * @param  array   $attributes
     * @param  bool    $withIcon
     *
     * @return self
     */
    public function addLink($url, $title = null, array $attributes = [], $withIcon = true)
    {
        $icon = $withIcon ? 'fa fa-fw fa-plus' : null;

        return $this->build('add', $url, $title, $attributes, $icon);
    }

    /**
     * @param  string  $action
     * @param  string  $url
     * @param  string  $title
     * @param  array   $attributes
     * @param  bool    $withIcon
     *
     * @return self
     */
    public function build($action, $url, $title = null, array $attributes = [], $withIcon)
    {
        if (is_null($title))
            $title = "core::actions.{$action}";

        return $this->setUrl($url)
                    ->setTitle($title)
                    ->setAttributes($attributes)
                    ->setIcon($withIcon ? $this->getIconFromAction($action) : null);
    }

    /**
     * Render the link.
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function render()
    {
        $attributes = html()->attributes($this->attributes);
        $value      = $this->renderIcon() . $this->title();

        return new HtmlString(
            '<a href="'.$this->url.'"'.$attributes.'>'.$value.'</a>'
        );
    }

    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        return $this->render()->toHtml();
    }

    /* -----------------------------------------------------------------
     |  Check Functions
     | -----------------------------------------------------------------
     */
    /**
     * Render the icon.
     *
     * @return string
     */
    private function renderIcon()
    {
        return $this->hasIcon() ? '<i class="'.$this->icon.'"></i> ' : '';
    }

    /**
     * Check if the icon exists.
     *
     * @return bool
     */
    protected function hasIcon()
    {
        return ! is_null($this->icon);
    }

    /**
     * Get the title.
     *
     * @return string
     */
    private function title()
    {
        /** @var \Illuminate\Translation\Translator $trans */
        $trans = trans();

        $title = $trans->has($this->title) ? $trans->get($this->title) : $this->title;

        return Str::ucfirst($title);
    }

    private function getIconFromAction($action)
    {
        $icons = [
            'add' => 'fa fa-fw fa-plus',
        ];

        return Arr::get($icons, $action);
    }
}
