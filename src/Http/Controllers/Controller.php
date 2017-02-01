<?php namespace Arcanesoft\Core\Http\Controllers;

use Arcanedev\Support\Bases\Controller as BaseController;

/**
 * Class     Controller
 *
 * @package  Arcanesoft\Foundation\Bases
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class Controller extends BaseController
{
    /* ------------------------------------------------------------------------------------------------
     |  Traits
     | ------------------------------------------------------------------------------------------------
     */
    use \Arcanedev\Breadcrumbs\Traits\BreadcrumbsTrait,
        \Arcanedev\SeoHelper\Traits\Seoable,
        \Arcanedev\Support\Traits\Templatable,
        \Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * The view namespace.
     *
     * @var string
     */
    protected $viewNamespace;
}
