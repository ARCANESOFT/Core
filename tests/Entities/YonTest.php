<?php namespace Arcanesoft\Core\Tests\Entities;

use Arcanesoft\Core\Entities\Yon;
use Arcanesoft\Core\Tests\TestCase;

/***
 * Class     YonTest
 *
 * @package  Arcanesoft\Core\Tests\Entities
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class YonTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_get_all()
    {
        $all = Yon::all();

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $all);
        $this->assertSame([
            Yon::YES => 'yes',
            Yon::NO  => 'no',
        ], $all->toArray());
    }

    /** @test */
    public function it_can_get_keys()
    {
        $keys = Yon::keys();

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $keys);
        $this->assertSame([Yon::YES, Yon::NO], $keys->toArray());
    }

    /** @test */
    public function it_can_get_translated_value()
    {
        $this->assertSame('yes', Yon::get('yes'));
        $this->assertSame('no', Yon::get('no'));

        $this->app->setLocale('fr');

        $this->assertSame('oui', Yon::get('yes'));
        $this->assertSame('non', Yon::get('no'));

        $this->assertNull(Yon::get('maybe'));
        $this->assertSame('whatever', Yon::get('maybe', 'whatever'));
    }

    /** @test */
    public function it_can_get_translated_with_boolean_value()
    {
        $this->assertSame('yes', Yon::get(true));
        $this->assertSame('no', Yon::get(false));

        $this->app->setLocale('fr');

        $this->assertSame('oui', Yon::get(true));
        $this->assertSame('non', Yon::get(false));
    }
}
