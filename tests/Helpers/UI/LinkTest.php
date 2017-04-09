<?php namespace Arcanesoft\Core\Tests\Helpers\UI;

use Arcanesoft\Core\Helpers\UI\Link;
use Arcanesoft\Core\Tests\TestCase;

/**
 * Class     LinkTest
 *
 * @package  Arcanesoft\Core\Tests\Helpers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LinkTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Activate Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_generate_activate_icon_link_with_defaults()
    {
        $url          = 'http://localhost/activate';
        $expectations = [
            [true, '<a href="'.$url.'" class="btn btn-xs btn-success" data-toggle="tooltip" data-original-title="Enable"><i class="fa fa-fw fa-power-off"></i></a>'],
            [false, '<a href="'.$url.'" class="btn btn-xs btn-inverse" data-toggle="tooltip" data-original-title="Disable"><i class="fa fa-fw fa-power-off"></i></a>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Link::activateIcon($expected[0], $url)->toHtml());
            $this->assertSame($expected[1], link_activate_icon($expected[0], $url)->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_activate_icon_link_without_tooltip()
    {
        $url          = 'http://localhost/activate';
        $expectations = [
            [true, '<a href="'.$url.'" class="btn btn-xs btn-success"><i class="fa fa-fw fa-power-off"></i></a>'],
            [false, '<a href="'.$url.'" class="btn btn-xs btn-inverse"><i class="fa fa-fw fa-power-off"></i></a>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Link::activateIcon($expected[0], $url, [], false)->tooltip(false)->toHtml());
            $this->assertSame($expected[1], link_activate_icon($expected[0], $url, [], false)->tooltip(false)->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_activate_icon_with_disabled_state()
    {
        $url          = 'http://localhost/activate';
        $expectations = [
            [true, '<a href="javascript:void(0);" class="btn btn-xs btn-default" data-toggle="tooltip" data-original-title="Enable" disabled="disabled"><i class="fa fa-fw fa-power-off"></i></a>'],
            [false, '<a href="javascript:void(0);" class="btn btn-xs btn-default" data-toggle="tooltip" data-original-title="Disable" disabled="disabled"><i class="fa fa-fw fa-power-off"></i></a>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Link::activateIcon($expected[0], $url, [], true)->toHtml());
            $this->assertSame($expected[1], link_activate_icon($expected[0], $url, [], true)->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_activate_icon_with_custom_attributes()
    {
        $url = '#activateModal';

        $expected =
            '<a href="'.$url.'" class="btn btn-xs btn-success" data-toggle="tooltip" data-original-title="Enable" data-current-status="disabled">'.
                '<i class="fa fa-fw fa-power-off"></i>'.
            '</a>';

        $this->assertSame($expected, Link::activateIcon(true, $url, ['data-current-status' => 'disabled'])->toHtml());
        $this->assertSame($expected, link_activate_icon(true, $url, ['data-current-status' => 'disabled'])->toHtml());

        $expected =
            '<a href="'.$url.'" class="btn btn-xs btn-inverse" data-toggle="tooltip" data-original-title="Disable" data-current-status="enabled">'.
                '<i class="fa fa-fw fa-power-off"></i>'.
            '</a>';

        $this->assertSame($expected, Link::activateIcon(false, $url, ['data-current-status' => 'enabled'])->toHtml());
        $this->assertSame($expected, link_activate_icon(false, $url, ['data-current-status' => 'enabled'])->toHtml());
    }

    /** @test */
    public function it_can_generate_activate_icon_for_modals()
    {
        $url = '#activateModal';

        $expected = '<a href="'.$url.'" class="btn btn-xs btn-inverse" data-toggle="tooltip" data-original-title="Disable" data-current-status="enabled">'.
                        '<i class="fa fa-fw fa-power-off"></i>'.
                    '</a>';

        $this->assertSame($expected, Link::activateModalIcon(true, $url)->toHtml());

        $expected = '<a href="'.$url.'" class="btn btn-xs btn-success" data-toggle="tooltip" data-original-title="Enable" data-current-status="disabled">'.
                        '<i class="fa fa-fw fa-power-off"></i>'.
                    '</a>';

        $this->assertSame($expected, Link::activateModalIcon(false, $url)->toHtml());
    }

    /** @test */
    public function it_can_generate_activate_with_icon_for_modals()
    {
        $url = '#activateModal';

        $expected = '<a href="'.$url.'" class="btn btn-sm btn-success" data-id="12" data-current-status="disabled">'.
                        '<i class="fa fa-fw fa-power-off"></i> Enable'.
                    '</a>';

        $this->assertSame($expected, Link::activateModalWithIcon(false, $url, ['data-id' => '12'])->toHtml());

        $expected = '<a href="'.$url.'" class="btn btn-sm btn-inverse" data-id="12" data-current-status="enabled">'.
                        '<i class="fa fa-fw fa-power-off"></i> Disable'.
                    '</a>';

        $this->assertSame($expected, Link::activateModalWithIcon(true, $url, ['data-id' => '12'])->toHtml());
    }

    /* -----------------------------------------------------------------
     |  Add Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_generate_add_icon_link_with_defaults()
    {
        $url      = 'http://localhost/add';
        $expected = '<a href="http://localhost/add" class="btn btn-xs btn-primary" data-toggle="tooltip" data-original-title="Add">'.
                        '<i class="fa fa-fw fa-plus"></i>'.
                    '</a>';

        $this->assertSame($expected, Link::addIcon($url)->toHtml());
        $this->assertSame($expected, link_add_icon($url)->toHtml());
    }

    /** @test */
    public function it_can_generate_add_icon_link_without_tooltip()
    {
        $url      = 'http://localhost/add';
        $expected = '<a href="http://localhost/add" class="btn btn-xs btn-primary"><i class="fa fa-fw fa-plus"></i></a>';

        $this->assertSame($expected, Link::addIcon($url, [], false)->tooltip(false)->toHtml());
        $this->assertSame($expected, link_add_icon($url, [], false)->tooltip(false)->toHtml());
    }

    /** @test */
    public function it_can_generate_add_icon_with_disabled_state()
    {
        $url      = 'http://localhost/add';
        $expected = '<a href="javascript:void(0);" class="btn btn-xs btn-default" data-toggle="tooltip" data-original-title="Add" disabled="disabled">'.
                        '<i class="fa fa-fw fa-plus"></i>'.
                    '</a>';

        $this->assertSame($expected, Link::addIcon($url, [], true, true)->toHtml());
        $this->assertSame($expected, link_add_icon($url, [], true, true)->toHtml());
    }

    /* -----------------------------------------------------------------
     |  Delete
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_generate_delete_icon_link_for_modals()
    {
        $url      = '#deleteModal';
        $expected = '<a href="'.$url.'" class="btn btn-xs btn-danger" data-toggle="tooltip" data-original-title="Delete">'.
                        '<i class="fa fa-fw fa-trash-o"></i>'.
                    '</a>';

        $this->assertSame($expected, Link::deleteModalIcon($url)->toHtml());
    }

    /** @test */
    public function it_can_generate_delete_icon_link_for_modals_with_attributes()
    {
        $url      = '#deleteModal';
        $expected = '<a href="#deleteModal" class="btn btn-xs btn-danger" data-toggle="tooltip" data-original-title="Delete" data-model-id="1">'.
                        '<i class="fa fa-fw fa-trash-o"></i>'.
                    '</a>';

        $this->assertSame($expected, Link::deleteModalIcon($url, ['data-model-id' => '1'])->toHtml());
    }

    /** @test */
    public function it_can_generate_delete_icon_link_for_modals_with_attributes_but_without_data_if_disabled()
    {
        $url      = '#deleteModal';
        $expected = '<a href="javascript:void(0);" class="btn btn-xs btn-default" data-toggle="tooltip" data-original-title="Delete" disabled="disabled" id="delete-link">'.
                        '<i class="fa fa-fw fa-trash-o"></i>'.
                    '</a>';

        $this->assertSame($expected, Link::deleteModalIcon($url, ['data-model-id' => '1', 'id' => 'delete-link'], true, true)->toHtml());
    }

    /** @test */
    public function it_can_generate_delete_link_with_icon_for_modals()
    {
        $url      = '#deleteModal';
        $expected = '<a href="'.$url.'" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash-o"></i> Delete</a>';

        $this->assertSame($expected, Link::deleteModalWithIcon($url)->toHtml());

        $url      = '#deleteModal';
        $expected = '<a href="javascript:void(0);" class="btn btn-sm btn-default" disabled="disabled">'.
                        '<i class="fa fa-fw fa-trash-o"></i> Delete'.
                    '</a>';

        $this->assertSame($expected, Link::deleteModalWithIcon($url, [], true)->toHtml());
    }

    /* -----------------------------------------------------------------
     |  Detach Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_generate_detach_icon_link_for_modals()
    {
        $url      = '#detachModal';
        $expected = '<a href="'.$url.'" class="btn btn-xs btn-danger" data-toggle="tooltip" data-original-title="Detach">'.
                        '<i class="fa fa-fw fa-chain-broken"></i>'.
                    '</a>';

        $this->assertSame($expected, Link::detachModalIcon($url)->toHtml());
    }

    /** @test */
    public function it_can_generate_detach_icon_link_for_modals_with_attributes()
    {
        $url      = '#detachModal';
        $expected = '<a href="#detachModal" class="btn btn-xs btn-danger" data-toggle="tooltip" data-original-title="Detach" data-model-id="1">'.
                        '<i class="fa fa-fw fa-chain-broken"></i>'.
                    '</a>';

        $this->assertSame($expected, Link::detachModalIcon($url, ['data-model-id' => '1'])->toHtml());
    }

    /** @test */
    public function it_can_generate_detach_icon_link_for_modals_with_attributes_but_without_data_if_disabled()
    {
        $url      = '#detachModal';
        $expected = '<a href="javascript:void(0);" class="btn btn-xs btn-default" data-toggle="tooltip" data-original-title="Detach" disabled="disabled" id="detach-link">'.
                        '<i class="fa fa-fw fa-chain-broken"></i>'.
                    '</a>';

        $this->assertSame($expected, Link::detachModalIcon($url, ['data-model-id' => '1', 'id' => 'detach-link'], true, true)->toHtml());
    }

    /* -----------------------------------------------------------------
     |  Restore Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_generate_restore_icon_link_for_modals()
    {
        $url      = '#restoreModal';
        $expected = '<a href="'.$url.'" class="btn btn-xs btn-primary" data-toggle="tooltip" data-original-title="Restore">'.
                        '<i class="fa fa-fw fa-reply"></i>'.
                    '</a>';

        $this->assertSame($expected, Link::restoreModalIcon($url)->toHtml());
    }

    /** @test */
    public function it_can_generate_restore_link_with_icon_for_modals()
    {
        $url      = '#restoreModal';
        $expected = '<a href="'.$url.'" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-reply"></i> Restore</a>';

        $this->assertSame($expected, Link::restoreModalWithIcon($url)->toHtml());
    }

    /* -----------------------------------------------------------------
     |  Edit Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_generate_edit_icon_link_with_defaults()
    {
        $url      = 'http://localhost/edit';
        $expected = '<a href="http://localhost/edit" class="btn btn-xs btn-warning" data-toggle="tooltip" data-original-title="Edit">'.
                        '<i class="fa fa-fw fa-pencil"></i>'.
                    '</a>';

        $this->assertSame($expected, Link::editIcon($url)->toHtml());
        $this->assertSame($expected, link_edit_icon($url)->toHtml());
    }

    /** @test */
    public function it_can_generate_edit_icon_link_without_tooltip()
    {
        $url      = 'http://localhost/edit';
        $expected = '<a href="http://localhost/edit" class="btn btn-xs btn-warning"><i class="fa fa-fw fa-pencil"></i></a>';

        $this->assertSame($expected, Link::editIcon($url, [], false)->tooltip(false)->toHtml());
        $this->assertSame($expected, link_edit_icon($url, [], false)->tooltip(false)->toHtml());
    }

    /** @test */
    public function it_can_generate_edit_icon_with_disabled_state()
    {
        $url      = 'http://localhost/edit';
        $expected = '<a href="javascript:void(0);" class="btn btn-xs btn-default" data-toggle="tooltip" data-original-title="Edit" disabled="disabled">'.
                        '<i class="fa fa-fw fa-pencil"></i>'.
                    '</a>';

        $this->assertSame($expected, Link::editIcon($url, [], true, true)->toHtml());
        $this->assertSame($expected, link_edit_icon($url, [], true, true)->toHtml());
    }

    /** @test */
    public function it_can_generate_edit_link_with_icon()
    {
        $url      = 'http://localhost/edit';
        $expected = '<a href="http://localhost/edit" class="btn btn-sm btn-warning">'.
                        '<i class="fa fa-fw fa-pencil"></i> Edit'.
                    '</a>';

        $this->assertSame($expected, Link::editWithIcon($url)->toHtml());
    }

    /* -----------------------------------------------------------------
     |  Show Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_generate_show_icon_link_with_defaults()
    {
        $url      = 'http://localhost/show';
        $expected = '<a href="http://localhost/show" class="btn btn-xs btn-info" data-toggle="tooltip" data-original-title="Show">'.
                        '<i class="fa fa-fw fa-search"></i>'.
                    '</a>';

        $this->assertSame($expected, Link::showIcon($url)->toHtml());
        $this->assertSame($expected, link_show_icon($url)->toHtml());
    }

    /** @test */
    public function it_can_generate_show_icon_link_without_tooltip()
    {
        $url      = 'http://localhost/show';
        $expected = '<a href="http://localhost/show" class="btn btn-xs btn-info"><i class="fa fa-fw fa-search"></i></a>';

        $this->assertSame($expected, Link::showIcon($url, [], false)->tooltip(false)->toHtml());
        $this->assertSame($expected, link_show_icon($url, [], false)->tooltip(false)->toHtml());
    }

    /** @test */
    public function it_can_generate_show_icon_with_disabled_state()
    {
        $url      = 'http://localhost/show';
        $expected = '<a href="javascript:void(0);" class="btn btn-xs btn-default" data-toggle="tooltip" data-original-title="Show" disabled="disabled">'.
                        '<i class="fa fa-fw fa-search"></i>'.
                    '</a>';

        $this->assertSame($expected, Link::showIcon($url, [], true, true)->toHtml());
        $this->assertSame($expected, link_show_icon($url, [], true, true)->toHtml());
    }
}
