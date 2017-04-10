<?php namespace Arcanesoft\Core\Tests\Helpers\UI;

use Arcanesoft\Core\Helpers\UI\Link;
use Arcanesoft\Core\Tests\TestCase;
use Illuminate\Support\Str;

/**
 * Class     LinkTest
 *
 * @package  Arcanesoft\Core\Tests\Helpers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LinkTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */
    /** @test */
    public function it_can_be_instantiated()
    {
        $url  = 'http://localhost/add';
        $link = Link::make('add', $url);

        $expectations = [
            \Illuminate\Contracts\Support\Htmlable::class,
            \Arcanesoft\Core\Helpers\UI\Link::class,
        ];

        foreach ($expectations as $expected) {
            $this->assertInstanceOf($expected, $link);
        }

        $expected = '<a href="'.$url.'" class="btn btn-primary">'.
                        '<i class="fa fa-fw fa-plus"></i> Add'.
                    '</a>';

        $this->assertSame($expected, $link->toHtml());
        $this->assertSame($expected, (string) $link); // Test __toString()
    }

    /** @test */
    public function it_can_be_instantiated_via_helper_for_arcanesoft()
    {
        $url  = 'http://localhost/add';
        $link = ui_link('add', $url);

        $expectations = [
            \Illuminate\Contracts\Support\Htmlable::class,
            \Arcanesoft\Core\Helpers\UI\Link::class,
        ];

        foreach ($expectations as $expected) {
            $this->assertInstanceOf($expected, $link);
        }

        $expected = '<a href="'.$url.'" class="btn btn-sm btn-primary">'.
                        '<i class="fa fa-fw fa-plus"></i> Add'.
                    '</a>';

        $this->assertSame($expected, $link->toHtml());
    }

    /** @test */
    public function it_can_generate_with_custom_attributes()
    {
        $url  = 'http://localhost/add';
        $link = Link::make('add', $url, ['class' => 'button', 'id' => 'link-id', 'data-toggle' => 'button']);

        $expected = '<a href="'.$url.'" class="button" id="link-id" data-toggle="button">'.
                        '<i class="fa fa-fw fa-plus"></i> Add'.
                    '</a>';

        $this->assertSame($expected, $link->toHtml());
    }

    /** @test */
    public function it_can_set_attributes()
    {
        $url  = 'http://localhost/add';
        $link = Link::make('add', $url);

        $link->setAttributes(['class' => 'button', 'id' => 'link-id', 'data-toggle' => 'button']);

        $expected = '<a href="'.$url.'" class="button" id="link-id" data-toggle="button">'.
                        '<i class="fa fa-fw fa-plus"></i> Add'.
                    '</a>';

        $this->assertSame($expected, $link->toHtml());
    }

    /** @test */
    public function it_can_set_attributes_one_by_one()
    {
        $url  = 'http://localhost/add';
        $link = Link::make('add', $url);

        $link->setAttribute('class', 'button');
        $link->setAttribute('id', 'link-id');
        $link->setAttribute('data-toggle', 'button');

        $expected = '<a href="'.$url.'" class="button" id="link-id" data-toggle="button">'.
                        '<i class="fa fa-fw fa-plus"></i> Add'.
                    '</a>';

        $this->assertSame($expected, $link->toHtml());
    }

    /** @test */
    public function it_can_generate_disabled_link()
    {
        $url  = 'http://localhost/add';
        $link = Link::make('add', $url, [], true);

        $expected = '<a href="javascript:void(0);" class="btn btn-default" disabled="disabled">'.
                        '<i class="fa fa-fw fa-plus"></i> Add'.
                    '</a>';

        $this->assertSame($expected, $link->toHtml());
    }

    /** @test */
    public function it_can_generate_without_title()
    {
        $url  = 'http://localhost/add';
        $link = Link::make('add', $url)->withTitle(false);

        $expected = '<a href="'.$url.'" class="btn btn-primary">'.
                        '<i class="fa fa-fw fa-plus"></i>'.
                    '</a>';

        $this->assertSame($expected, $link->toHtml());
    }

    /** @test */
    public function it_can_generate_correct_color_by_action()
    {
        foreach (config('arcanesoft.core.ui.links.colors') as $action => $colorClass) {
            $this->assertContains($colorClass, Link::make($action, '#')->toHtml());
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
            $this->assertContains($expected, Link::make('add', '#')->size($size)->toHtml());
        }

        $expected = '<a href="#" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Add</a>';

        foreach (['md','custom'] as $size) {
            $this->assertSame($expected, Link::make('add', '#')->size($size)->toHtml());
        }
    }

    /** @test */
    public function it_can_generate_without_icon()
    {
        $url  = 'http://localhost/add';

        $this->assertSame(
            '<a href="'.$url.'" class="btn btn-primary">Add</a>',
            Link::make('add', $url)->withIcon(false)->toHtml()
        );
    }

    /** @test */
    public function it_can_generate_with_tooltip()
    {
        $url  = 'http://localhost/add';
        $link = Link::make('add', $url)->withTooltip(true);

        $expected = '<a href="http://localhost/add" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add">'.
                        '<i class="fa fa-fw fa-plus"></i>'.
                    '</a>';

        $this->assertSame($expected, $link->toHtml());
    }

    /** @test */
    public function it_can_generate_with_icon_and_tooltip()
    {
        $url  = 'http://localhost/add';
        $link = Link::make('add', $url)->withIcon(false);

        $link->onlyIcon();

        $expected = '<a href="http://localhost/add" class="btn btn-primary" data-toggle="tooltip" data-original-title="Add">'.
                        '<i class="fa fa-fw fa-plus"></i>'.
                    '</a>';

        $this->assertSame($expected, $link->toHtml());
    }

    /** @test */
    public function it_can_generate_with_translated_title()
    {
        $url  = '#';

        foreach (['en', 'fr'] as $locale) {
            $this->app->setLocale($locale);

            foreach (trans('core::actions') as $action => $translated) {
                $this->assertContains(
                    Str::ucfirst($translated), Link::make($action, $url)->withIcon(false)->toHtml()
                );
            }
        }
    }
}
