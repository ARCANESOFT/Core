<?php namespace Arcanesoft\Core\Http\Controllers;

use Arcanedev\Breadcrumbs\Traits\BreadcrumbsTrait;
use Arcanedev\SeoHelper\Traits\Seoable;
use Arcanedev\Support\Bases\Controller as BaseController;
use Arcanedev\Support\Traits\Templatable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
    use BreadcrumbsTrait,
        Seoable,
        Templatable,
        AuthorizesRequests;

    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * The view namespace.
     *
     * @var string|null
     */
    protected $viewNamespace;
}
