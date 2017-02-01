<?php namespace Arcanesoft\Core\Http;

use Arcanedev\Support\Bases\FormRequest as BaseFormRequest;

/**
 * Class     FormRequest
 *
 * @package  Arcanesoft\Blog\Bases
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class FormRequest extends BaseFormRequest
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * The message format.
     *
     * @var string
     */
    protected $errorsFormat = '<i class="fa fa-fw fa-exclamation-circle"></i> :message';
}
