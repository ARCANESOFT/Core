<?php namespace Arcanesoft\Core\Traits;

/**
 * Class     Notifyable
 *
 * @package  Arcanesoft\Foundation\Traits
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
trait Notifyable
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the notification instance.
     *
     * @return \Arcanesoft\Core\Helpers\Notification
     */
    protected function notification()
    {
        return notification();
    }

    /**
     * Notify a success alert.
     *
     * @param  string  $title
     * @param  string  $message
     */
    protected function notifySuccess($title, $message = '')
    {
        $this->notification()->success($title, $message);
    }

    /**
     * Notify a danger alert.
     *
     * @param  string  $title
     * @param  string  $message
     */
    protected function notifyDanger($title, $message = '')
    {
        $this->notification()->danger($title, $message);
    }

    /**
     * Notify a warning alert.
     *
     * @param  string  $title
     * @param  string  $message
     */
    protected function notifyWarning($title, $message = '')
    {
        $this->notification()->warning($title, $message);
    }

    /**
     * Notify an info alert.
     *
     * @param  string  $title
     * @param  string  $message
     */
    protected function notifyInfo($title, $message = '')
    {
        $this->notification()->warning($title, $message);
    }
}
