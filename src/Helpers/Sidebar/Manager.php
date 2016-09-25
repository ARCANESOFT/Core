<?php namespace Arcanesoft\Core\Helpers\Sidebar;

use Arcanesoft\Core\Helpers\Sidebar\Entities\Item;
use Arcanesoft\Core\Helpers\Sidebar\Entities\ItemCollection;

/**
 * Class     Manager
 *
 * @package  Arcanesoft\Core\Helpers\Sidebar
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Manager implements Contracts\Sidebar
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * The view name.
     *
     * @var string
     */
    protected $view = '';

    /**
     * The current name.
     *
     * @var string
     */
    protected $currentName;

    /**
     * The sidebar items collection.
     *
     * @var \Arcanesoft\Core\Helpers\Sidebar\Entities\ItemCollection
     */
    protected $items;

    /**
     * The authenticated user.
     *
     * @var \Arcanesoft\Contracts\Auth\Models\User
     */
    protected $user;

    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    public function __construct()
    {
        $this->user  = auth()->user()->load(['roles', 'roles.permissions']);
        $this->items = new ItemCollection;
    }

    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Set the view name.
     *
     * @param  string  $view
     *
     * @return self
     */
    public function setView($view)
    {
        if ( ! is_null($view)) {
            $this->view = $view;
        }

        return $this;
    }

    /**
     * Get the current item name.
     *
     * @return string
     */
    public function getCurrent()
    {
        return $this->currentName;
    }

    /**
     * Set the current item name.
     *
     * @param  string  $currentName
     *
     * @return $this
     */
    public function setCurrent($currentName)
    {
        $this->currentName = $currentName;

        return $this;
    }

    /**
     * Get the sidebar items.
     *
     * @return \Arcanesoft\Core\Helpers\Sidebar\Entities\ItemCollection
     */
    public function getItems()
    {
        return $this->items;
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Add a routed item.
     *
     * @param  string       $name
     * @param  string       $title
     * @param  string       $route
     * @param  array        $parameters
     * @param  string|null  $icon
     *
     * @return self
     */
    public function addRouteItem($name, $title, $route, array $parameters = [], $icon = null)
    {
        return $this->addItem($name, $title, route($route, $parameters), $icon);
    }

    /**
     * Add an item.
     *
     * @param  string       $name
     * @param  string       $title
     * @param  string       $url
     * @param  string|null  $icon
     *
     * @return self
     */
    public function addItem($name, $title, $url = '#', $icon = null)
    {
        return $this->add(compact('name', 'title', 'url', 'icon'));
    }

    /**
     * Add an item from array.
     *
     * @param  array  $array
     *
     * @return self
     */
    public function add(array $array)
    {
        $item = Item::makeFromArray($array, $this->user);

        if ($item->allowed())
            $this->items->push($item);

        return $this;
    }

    /**
     * Render the sidebar.
     *
     * @param  string|null  $view
     *
     * @return string
     */
    public function render($view = null)
    {
        $this->syncCurrentName()->setView($view);

        return view($this->view, ['sidebarItems' => $this->items])->render();
    }

    /* ------------------------------------------------------------------------------------------------
     |  Check Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Check if the sidebar has items.
     *
     * @return bool
     */
    public function hasItems()
    {
        return ! $this->items->isEmpty();
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Sync the current name wih the sidebar items.
     *
     * @return self
     */
    private function syncCurrentName()
    {
        $this->items->setCurrent($this->currentName);

        return $this;
    }
}
