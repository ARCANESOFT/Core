<?php namespace Arcanesoft\Core\Tests\Helpers\UI;

use Arcanesoft\Core\Helpers\UI\Button;
use Arcanesoft\Core\Tests\TestCase;
use Illuminate\Support\Str;

/**
 * Class     ButtonTest
 *
 * @package  Arcanesoft\Core\Tests\Helpers\UI
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ButtonTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */
    /** @test */
    public function it_can_be_instantiated()
    {
        $button = Button::make('add');

        $expectations = [
            \Illuminate\Contracts\Support\Htmlable::class,
            \Arcanesoft\Core\Helpers\UI\Button::class,
        ];

        foreach ($expectations as $expected) {
            $this->assertInstanceOf($expected, $button);
        }

        $expected = '<button type="button" class="btn btn-primary">'.
                        '<i class="fa fa-fw fa-plus"></i> Add'.
                    '</button>';

        $this->assertSame($expected, $button->toHtml());
        $this->assertSame($expected, (string) $button); // Test __toString()
    }

    /** @test */
    public function it_can_be_instantiated_via_helper_for_arcanesoft()
    {
        $button = ui_button('add');

        $expectations = [
            \Illuminate\Contracts\Support\Htmlable::class,
            \Arcanesoft\Core\Helpers\UI\Button::class,
        ];

        foreach ($expectations as $expected) {
            $this->assertInstanceOf($expected, $button);
        }

        $expected = '<button type="button" class="btn btn-sm btn-primary">'.
                        '<i class="fa fa-fw fa-plus"></i> Add'.
                    '</button>';

        $this->assertSame($expected, $button->toHtml());
    }

    /** @test */
    public function it_can_generate_with_custom_attributes()
    {
        $button   = Button::make('add', 'submit', ['class' => 'button', 'id' => 'button-id', 'data-toggle' => 'button']);
        $expected = '<button type="submit" class="button" id="button-id" data-toggle="button">'.
                        '<i class="fa fa-fw fa-plus"></i> Add'.
                    '</button>';

        $this->assertSame($expected, $button->toHtml());
    }

    /** @test */
    public function it_can_set_attributes()
    {
        $button = Button::make('add', 'submit');

        $button->setAttributes(['class' => 'button', 'id' => 'button-id', 'data-toggle' => 'button']);

        $expected = '<button type="submit" class="button" id="button-id" data-toggle="button">'.
                        '<i class="fa fa-fw fa-plus"></i> Add'.
                    '</button>';

        $this->assertSame($expected, $button->toHtml());
    }

    /** @test */
    public function it_can_set_attributes_one_by_one()
    {
        $button = Button::make('add');

        $button->setAttribute('class', 'button');
        $button->setAttribute('id', 'button-id');
        $button->setAttribute('data-toggle', 'button');

        $expected = '<button type="button" class="button" id="button-id" data-toggle="button">'.
                        '<i class="fa fa-fw fa-plus"></i> Add'.
                    '</button>';

        $this->assertSame($expected, $button->toHtml());
    }

    /** @test */
    public function it_can_generate_disabled_button()
    {
        $button = Button::make('add', 'submit', [], true);

        $expected = '<button type="button" class="btn btn-default" disabled="disabled">'.
                        '<i class="fa fa-fw fa-plus"></i> Add'.
                    '</button>';

        $this->assertSame($expected, $button->toHtml());
    }

    /** @test */
    public function it_can_generate_without_title()
    {
        $button = Button::make('add')->withTitle(false);

        $expected = '<button type="button" class="btn btn-primary">'.
                        '<i class="fa fa-fw fa-plus"></i>'.
                    '</button>';

        $this->assertSame($expected, $button->toHtml());
    }

    /** @test */
    public function it_can_generate_correct_color_by_action()
    {
        foreach (config('arcanesoft.core.ui.buttons.colors') as $action => $colorClass) {
            $this->assertContains($colorClass, Button::make($action, '#')->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_correct_size()
    {
        $expectations = [
            'lg' => 'btn-lg',
            'sm' => 'btn-sm',
            'xs' => 'btn-xs',
        ];

        foreach ($expectations as $size => $expected) {
            $this->assertContains($expected, Button::make('add', '#')->size($size)->toHtml());
        }

        $expected = '<button type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Add</button>';

        foreach (['md','custom'] as $size) {
            $this->assertSame($expected, Button::make('add', '#')->size($size)->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_without_icon()
    {
        $this->assertSame(
            '<button type="button" class="btn btn-primary">Add</button>',
            Button::make('add')->withIcon(false)->toHtml()
        );
    }

    /** @test */
    public function it_can_generate_with_tooltip()
    {
        $button = Button::make('add')->withTooltip(true);

        $expected = '<button type="button" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add">'.
                        '<i class="fa fa-fw fa-plus"></i>'.
                    '</button>';

        $this->assertSame($expected, $button->toHtml());
    }

    /** @test */
    public function it_can_generate_with_icon_and_tooltip()
    {
        $button = Button::make('add')->withIcon(false);

        $button->onlyIcon();

        $expected = '<button type="button" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add">'.
                        '<i class="fa fa-fw fa-plus"></i>'.
                    '</button>';

        $this->assertSame($expected, $button->toHtml());
    }

    /** @test */
    public function it_can_generate_with_translated_title()
    {
        $url  = '#';

        foreach (['en', 'fr'] as $locale) {
            $this->app->setLocale($locale);

            foreach (trans('core::actions') as $action => $translated) {
                $this->assertContains(
                    Str::ucfirst($translated), Button::make($action, $url)->withIcon(false)->toHtml()
                );
            }
        }
    }
}
