<?php namespace Arcanesoft\Core\Helpers;

use Illuminate\Session\Store as Session;

/**
 * Class     Notification
 *
 * @package  Arcanesoft\Foundation\Helpers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Notification
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * The session store instance.
     *
     * @var \Illuminate\Session\Store
     */
    private $session;

    /**
     * Session name.
     *
     * @var string
     */
    protected $name = 'notification';

    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Notification constructor.
     *
     * @param  \Illuminate\Session\Store  $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the session name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the session name.
     *
     * @param  string  $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Notify a success alert.
     *
     * @param  string  $title
     * @param  string  $message
     */
    public function success($title, $message = '')
    {
        $this->notify('success', $title, $message);
    }

    /**
     * Notify a danger alert.
     *
     * @param  string  $title
     * @param  string  $message
     */
    public function danger($title, $message = '')
    {
        $this->notify('danger', $title, $message);
    }

    /**
     * Notify an warning alert.
     *
     * @param  string  $title
     * @param  string  $message
     */
    public function warning($title, $message = '')
    {
        $this->notify('warning', $title, $message);
    }

    /**
     * Notify an info alert.
     *
     * @param  string  $title
     * @param  string  $message
     */
    public function info($title, $message = '')
    {
        $this->notify('info', $title, $message);
    }

    /**
     * Notify an alert.
     *
     * @param  string  $status
     * @param  string  $title
     * @param  string  $message
     */
    public function notify($status, $title, $message = '')
    {
        $this->session->flash($this->name, compact('status', 'title', 'message'));
    }
}
