<?php namespace Arcanesoft\Core\Tests\Helpers\UI;

use Arcanesoft\Core\Helpers\UI\Label;
use Arcanesoft\Core\Tests\TestCase;

/**
 * Class     LabelTest
 *
 * @package  Arcanesoft\Core\Tests\Helpers\UI
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LabelTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_generate_active_icon_label_with_defaults()
    {
        $expectations = [
            [true, '<span class="label label-success" data-toggle="tooltip" data-original-title="Enabled"><i class="fa fa-fw fa-check"></i></span>'],
            [false, '<span class="label label-default" data-toggle="tooltip" data-original-title="Disabled"><i class="fa fa-fw fa-ban"></i></span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::activeIcon($expected[0])->toHtml());
            $this->assertSame($expected[1], label_active_icon($expected[0])->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_active_icon_label_with_translation()
    {
        $this->app->setLocale('fr');

        $expectations = [
            [true, '<span class="label label-success" data-toggle="tooltip" data-original-title="Activé"><i class="fa fa-fw fa-check"></i></span>'],
            [false, '<span class="label label-default" data-toggle="tooltip" data-original-title="Désactivé"><i class="fa fa-fw fa-ban"></i></span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::activeIcon($expected[0])->toHtml());
            $this->assertSame($expected[1], label_active_icon($expected[0])->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_active_icon_label_without_tooltip()
    {
        $expectations = [
            [true, '<span class="label label-success"><i class="fa fa-fw fa-check"></i></span>'],
            [false, '<span class="label label-default"><i class="fa fa-fw fa-ban"></i></span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::activeIcon($expected[0], [], false)->toHtml());
            $this->assertSame($expected[1], label_active_icon($expected[0], [], false)->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_active_status_label_with_defaults()
    {
        $expectations = [
            [true, '<span class="label label-success"><i class="fa fa-fw fa-check"></i> Enabled</span>'],
            [false, '<span class="label label-default"><i class="fa fa-fw fa-ban"></i> Disabled</span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::activeStatus($expected[0])->toHtml());
            $this->assertSame($expected[1], label_active_status($expected[0])->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_active_status_label_with_translation()
    {
        $this->app->setLocale('fr');

        $expectations = [
            [true, '<span class="label label-success"><i class="fa fa-fw fa-check"></i> Activé</span>'],
            [false, '<span class="label label-default"><i class="fa fa-fw fa-ban"></i> Désactivé</span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::activeStatus($expected[0])->toHtml());
            $this->assertSame($expected[1], label_active_status($expected[0])->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_active_status_label_without_icon()
    {
        $expectations = [
            [true, '<span class="label label-success">Enabled</span>'],
            [false, '<span class="label label-default">Disabled</span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::activeStatus($expected[0], [], false)->toHtml());
            $this->assertSame($expected[1], label_active_status($expected[0], [], false)->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_check_icon_label_with_defaults()
    {
        $expectations = [
            [true, '<span class="label label-success" data-toggle="tooltip" data-original-title="Checked"><i class="fa fa-fw fa-check"></i></span>'],
            [false, '<span class="label label-default" data-toggle="tooltip" data-original-title="Unchecked"><i class="fa fa-fw fa-ban"></i></span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::checkIcon($expected[0])->toHtml());
            $this->assertSame($expected[1], label_check_icon($expected[0])->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_check_icon_label_with_translation()
    {
        $this->app->setLocale('fr');

        $expectations = [
            [true, '<span class="label label-success" data-toggle="tooltip" data-original-title="Coché"><i class="fa fa-fw fa-check"></i></span>'],
            [false, '<span class="label label-default" data-toggle="tooltip" data-original-title="Décoché"><i class="fa fa-fw fa-ban"></i></span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::checkIcon($expected[0])->toHtml());
            $this->assertSame($expected[1], label_check_icon($expected[0])->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_check_status_label_with_defaults()
    {
        $expectations = [
            [true, '<span class="label label-success"><i class="fa fa-fw fa-check"></i> Checked</span>'],
            [false, '<span class="label label-default"><i class="fa fa-fw fa-ban"></i> Unchecked</span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::checkStatus($expected[0])->toHtml());
            $this->assertSame($expected[1], label_check_status($expected[0])->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_check_status_label_with_translation()
    {
        $this->app->setLocale('fr');

        $expectations = [
            [true, '<span class="label label-success"><i class="fa fa-fw fa-check"></i> Coché</span>'],
            [false, '<span class="label label-default"><i class="fa fa-fw fa-ban"></i> Décoché</span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::checkStatus($expected[0])->toHtml());
            $this->assertSame($expected[1], label_check_status($expected[0])->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_check_status_label_without_icon()
    {
        $expectations = [
            [true, '<span class="label label-success">Checked</span>'],
            [false, '<span class="label label-default">Unchecked</span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::checkStatus($expected[0], [], false)->toHtml());
            $this->assertSame($expected[1], label_check_status($expected[0], [], false)->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_count_label_with_default_classes()
    {
        $expectations = [
            [100, '<span class="label label-info">100</span>'],
            [0, '<span class="label label-default">0</span>'],
            [-100, '<span class="label label-danger">-100</span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::count($expected[0])->toHtml());
            $this->assertSame($expected[1], label_count($expected[0])->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_count_label_with_custom_classes()
    {
        $positive = 'positive-class';
        $zero     = 'zero-class';
        $negative = 'negative-class';
        $options = [
            'classes' => compact('positive', 'zero', 'negative')
        ];

        $expectations = [
            [100, '<span class="'.$positive.'">100</span>'],
            [0, '<span class="'.$zero.'">0</span>'],
            [-100, '<span class="'.$negative.'">-100</span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::count($expected[0], $options)->toHtml());
            $this->assertSame($expected[1], label_count($expected[0], $options)->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_count_label_with_float_number()
    {
        $expectations = [
            [100.5, '<span class="label label-info">100.5</span>'],
            [0.0, '<span class="label label-default">0</span>'],
            [-100.5, '<span class="label label-danger">-100.5</span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::count($expected[0])->toHtml());
            $this->assertSame($expected[1], label_count($expected[0])->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_locked_icon_label_with_defaults()
    {
        $expectations = [
            [true, '<span class="label label-danger" data-toggle="tooltip" data-original-title="Locked"><i class="fa fa-fw fa-lock"></i></span>'],
            [false, '<span class="label label-success" data-toggle="tooltip" data-original-title="Unlocked"><i class="fa fa-fw fa-unlock"></i></span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::lockedIcon($expected[0])->toHtml());
            $this->assertSame($expected[1], label_locked_icon($expected[0])->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_locked_icon_label_without_tooltip()
    {
        $expectations = [
            [true, '<span class="label label-danger"><i class="fa fa-fw fa-lock"></i></span>'],
            [false, '<span class="label label-success"><i class="fa fa-fw fa-unlock"></i></span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::lockedIcon($expected[0], [], false)->toHtml());
            $this->assertSame($expected[1], label_locked_icon($expected[0], [], false)->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_locked_status_label_with_defaults()
    {
        $expectations = [
            [true, '<span class="label label-danger"><i class="fa fa-fw fa-lock"></i> Locked</span>'],
            [false, '<span class="label label-success"><i class="fa fa-fw fa-unlock"></i> Unlocked</span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::lockedStatus($expected[0])->toHtml());
            $this->assertSame($expected[1], label_locked_status($expected[0])->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_locked_status_label_without_icon()
    {
        $expectations = [
            [true, '<span class="label label-danger">Locked</span>'],
            [false, '<span class="label label-success">Unlocked</span>'],
        ];

        foreach ($expectations as $expected) {
            $this->assertSame($expected[1], Label::lockedStatus($expected[0], [], false)->toHtml());
            $this->assertSame($expected[1], label_locked_status($expected[0], [], false)->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_trashed_status_label_with_defaults()
    {
        $expected = '<span class="label label-danger"><i class="fa fa-fw fa-trash-o"></i> Trashed</span>';

        $this->assertSame($expected, Label::trashedStatus()->toHtml());
        $this->assertSame($expected, label_trashed_status()->toHtml());
    }

    /** @test */
    public function it_can_generate_trashed_status_label_without_icon()
    {
        $expected = '<span class="label label-danger">Trashed</span>';

        $this->assertSame($expected, Label::trashedStatus([], false)->toHtml());
        $this->assertSame($expected, label_trashed_status([], false)->toHtml());
    }
}
