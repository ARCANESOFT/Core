<?php namespace Arcanesoft\Core\Helpers\Sidebar\Entities;

use Arcanedev\Support\Collection;

/**
 * Class     ItemCollection
 *
 * @package  Arcanesoft\Core\Helpers\Sidebar\Entities
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ItemCollection extends Collection
{
    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Set the current name to the items collection.
     *
     * @param  string  $currentName
     *
     * @return self
     */
    public function setCurrent($currentName)
    {
        return $this->map(function (Item $item) use ($currentName) {
            return $item->setCurrent($currentName);
        });
    }

    /* ------------------------------------------------------------------------------------------------
     |  Check Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Check if the items collection has an active one.
     *
     * @return bool
     */
    public function hasActiveItem()
    {
        $activeItems = $this->filter(function (Item $item) {
            return $item->isActive();
        });

        return ! $activeItems->isEmpty();
    }
}
