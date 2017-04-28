<?php namespace Arcanesoft\Core\Traits;

/**
 * Class     Notifyable
 *
 * @package  Arcanesoft\Foundation\Traits
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
trait Notifyable
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * The notify instance.
     *
     * @param  string|null  $message
     *
     * @return \Arcanedev\Notify\Contracts\Notify
     */
    protected function notify($message = null)
    {
        return notify($message);
    }

    /**
     * Notify a success alert.
     *
     * @param  string       $message
     * @param  string|null  $title
     * @param  array        $options
     */
    protected function notifySuccess($message, $title = null, array $options = [])
    {
        $this->notifyFlash($message, 'success', $title, $options);
    }

    /**
     * Notify a danger alert.
     *
     * @param  string       $message
     * @param  string|null  $title
     * @param  array        $options
     */
    protected function notifyDanger($message, $title = null, array $options = [])
    {
        $this->notifyFlash($message, 'danger', $title, $options);
    }

    /**
     * Notify a warning alert.
     *
     * @param  string       $message
     * @param  string|null  $title
     * @param  array        $options
     */
    protected function notifyWarning($message, $title = null, array $options = [])
    {
        $this->notifyFlash($message, 'warning', $title, $options);
    }

    /**
     * Notify an info alert.
     *
     * @param  string       $message
     * @param  string|null  $title
     * @param  array        $options
     */
    protected function notifyInfo($message, $title = null, array $options = [])
    {
        $this->notifyFlash($message, 'info', $title, $options);
    }

    /**
     * Notify a flash alert.
     *
     * @param  string       $message
     * @param  string       $type
     * @param  string|null  $title
     * @param  array        $options
     */
    protected function notifyFlash($message, $type, $title = null, array $options = [])
    {
        $this->notify()->flash($message, $type, array_merge($options, compact('title')));
    }
}
