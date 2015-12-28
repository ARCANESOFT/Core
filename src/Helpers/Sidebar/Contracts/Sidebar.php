<?php namespace Arcanesoft\Core\Helpers\Sidebar\Contracts;

/**
 * Interface  Sidebar
 *
 * @package   Arcanesoft\Core\Helpers\Sidebar\Contracts
 * @author    ARCANEDEV <arcanedev.maroc@gmail.com>
 */
interface Sidebar
{
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
    public function setView($view);

    /**
     * Get the current item name.
     *
     * @return string
     */
    public function getCurrent();

    /**
     * Set the current item name.
     *
     * @param  string  $currentName
     *
     * @return $this
     */
    public function setCurrent($currentName);

    /**
     * Get the sidebar items.
     *
     * @return \Arcanesoft\Core\Helpers\Sidebar\Entities\ItemCollection
     */
    public function getItems();

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
    public function addRouteItem($name, $title, $route, array $parameters = [], $icon = null);

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
    public function addItem($name, $title, $url = '#', $icon = null);

    /**
     * Add an item from array.
     *
     * @param  array  $array
     *
     * @return self
     */
    public function add(array $array);

    /**
     * Render the sidebar.
     *
     * @param  string|null  $view
     *
     * @return string
     */
    public function render($view = null);

    /* ------------------------------------------------------------------------------------------------
     |  Check Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Check if the sidebar has items.
     *
     * @return bool
     */
    public function hasItems();
}
