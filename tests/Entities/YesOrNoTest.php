<?php namespace Arcanesoft\Core\Tests\Entities;

use Arcanesoft\Core\Entities\YesOrNo;
use Arcanesoft\Core\Tests\TestCase;

/***
 * Class     YesOrNoTest
 *
 * @package  Arcanesoft\Core\Tests\Entities
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class YesOrNoTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_get_all()
    {
        $all = YesOrNo::all();

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $all);
        $this->assertSame([
            YesOrNo::YES => 'yes',
            YesOrNo::NO  => 'no',
        ], $all->toArray());
    }

    /** @test */
    public function it_can_get_keys()
    {
        $keys = YesOrNo::keys();

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $keys);
        $this->assertSame([YesOrNo::YES, YesOrNo::NO], $keys->toArray());
    }

    /** @test */
    public function it_can_get_translated_value()
    {
        $this->assertSame('yes', YesOrNo::get('yes'));
        $this->assertSame('no', YesOrNo::get('no'));

        $this->app->setLocale('fr');

        $this->assertSame('oui', YesOrNo::get('yes'));
        $this->assertSame('non', YesOrNo::get('no'));

        $this->assertNull(YesOrNo::get('maybe'));
        $this->assertSame('whatever', YesOrNo::get('maybe', 'whatever'));
    }

    /** @test */
    public function it_can_get_translated_with_boolean_value()
    {
        $this->assertSame('yes', YesOrNo::get(true));
        $this->assertSame('no', YesOrNo::get(false));

        $this->app->setLocale('fr');

        $this->assertSame('oui', YesOrNo::get(true));
        $this->assertSame('non', YesOrNo::get(false));
    }
}
