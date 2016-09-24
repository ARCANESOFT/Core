<?php namespace Arcanesoft\Core\Helpers\Sidebar\Entities;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;

/**
 * Class     Item
 *
 * @package  Arcanesoft\Core\Helpers\Sidebar\Entities
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Item implements Arrayable
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * The item name.
     *
     * @var string
     */
    protected $name;

    /**
     * The item title.
     *
     * @var string
     */
    public $title;

    /**
     * The item url.
     *
     * @var string
     */
    public $url;

    /**
     * The item icon.
     *
     * @var string
     */
    public $icon;

    /**
     * The item active state.
     *
     * @var bool
     */
    public $active = false;

    /**
     * The authenticated user.
     *
     * @var \Arcanesoft\Contracts\Auth\Models\User
     */
    protected $user;

    /**
     * The item roles.
     *
     * @var array
     */
    protected $roles      = [];

    /**
     * The item permissions.
     *
     * @var array
     */
    protected $permissions = [];

    /**
     * The item children (sub-items).
     *
     * @var \Arcanesoft\Core\Helpers\Sidebar\Entities\ItemCollection
     */
    public $children;

    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Item constructor.
     *
     * @param  string       $name
     * @param  string       $title
     * @param  string       $url
     * @param  string|null  $icon
     */
    public function __construct($name, $title, $url, $icon = null)
    {
        $this->name     = $name;
        $this->title    = $title;
        $this->url      = $url;
        $this->icon     = $icon;
        $this->active   = false;
        $this->children = new ItemCollection;
    }

    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Set the current name.
     *
     * @param  string  $currentName
     *
     * @return self
     */
    public function setCurrent($currentName)
    {
        $this->children->setCurrent($currentName);
        $this->active = ($this->name === $currentName || $this->children->hasActiveItem());

        return $this;
    }

    /**
     * Set the authenticated user.
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\User  $user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the roles.
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set the roles.
     *
     * @param  array  $roles
     *
     * @return self
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get the permissions.
     *
     * @return array
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Set the permissions.
     *
     * @param  array  $permissions
     *
     * @return self
     */
    public function setPermissions(array $permissions)
    {
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * Get the active class.
     *
     * @param  string  $class
     *
     * @return string
     */
    public function activeClass($class = 'active')
    {
        return $this->isActive() ? $class : '';
    }

    /**
     * Get the tree view class.
     *
     * @param  string  $class
     *
     * @return string
     */
    public function treeViewClass($class = 'treeview')
    {
        return $this->hasChildren() ? $class : '';
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Make the item.
     *
     * @param  string       $name
     * @param  string       $title
     * @param  string       $url
     * @param  string|null  $icon
     *
     * @return self
     */
    public static function make($name, $title, $url, $icon = null)
    {
        return new self($name, $title, $url, $icon);
    }

    /**
     * Make a Sidebar item from array.
     *
     * @param  array  $array
     *
     * @return self
     */
    public static function makeFromArray(array $array, $user)
    {
        $item = self::make(
            $array['name'],
            $array['title'],
            self::getUrlFromArray($array),
            Arr::get($array, 'icon', null)
        );

        $item->setUser($user);
        $item->setRoles(Arr::get($array, 'roles', []));
        $item->setPermissions(Arr::get($array, 'permissions', []));
        $item->addChildren(Arr::get($array, 'children', []));

        return $item;
    }

    /**
     * Get url from array.
     *
     * @param  array  $array
     *
     * @return string
     */
    private static function getUrlFromArray(array $array)
    {
        return Arr::has($array, 'route')
            ? route(Arr::get($array, 'route'))
            : Arr::get($array, 'url', '#');
    }

    /**
     * Add children to the parent.
     *
     * @param  array  $children
     *
     * @return self
     */
    private function addChildren(array $children)
    {
        foreach ($children as $child) {
            $item = self::makeFromArray($child, $this->user);

            if ($item->allowed())
                $this->children->push($item);
        }

        return $this;
    }

    /* ------------------------------------------------------------------------------------------------
     |  Check Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Check if the item is active one.
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * Check if the item has children.
     *
     * @return bool
     */
    public function hasChildren()
    {
        return ! $this->children->isEmpty();
    }

    /**
     * Check the user is allowed to see this item.
     *
     * @return bool
     */
    public function allowed()
    {
        if ($this->user->isAdmin())
            return true;

        if (empty($this->roles) && empty($this->permissions))
            return true;

        foreach ($this->roles as $roleSlug) {
            if ($this->user->hasRoleSlug($roleSlug)) return true;
        }

        foreach ($this->permissions as $permissionSlug) {
            if ($this->user->may($permissionSlug))   return true;
        }

        return false;
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'name'        => $this->name,
            'title'       => $this->title,
            'url'         => $this->url,
            'icon'        => $this->icon,
            'active'      => $this->active,
            'roles'       => $this->roles,
            'permissions' => $this->permissions,
            'children'    => $this->children->toArray(),
        ];
    }
}
