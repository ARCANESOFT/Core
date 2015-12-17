<?php namespace Arcanesoft\Core\Tests;

use Arcanesoft\Core\CoreServiceProvider;

/**
 * Class     CoreServiceProviderTest
 *
 * @package  Arcanesoft\Core\Tests
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CoreServiceProviderTest extends TestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * @var  \Arcanesoft\Core\CoreServiceProvider
     */
    private $provider;

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function setUp()
    {
        parent::setUp();

        $this->provider = $this->app->getProvider(CoreServiceProvider::class);
    }

    public function tearDown()
    {
        unset($this->provider);

        parent::tearDown();
    }

    /* ------------------------------------------------------------------------------------------------
     |  Test Functions
     | ------------------------------------------------------------------------------------------------
     */
    /** @test */
    public function it_can_be_instantiated()
    {
        $expectations = [
            \Illuminate\Support\ServiceProvider::class,
            \Arcanedev\Support\ServiceProvider::class,
            \Arcanedev\Support\PackageServiceProvider::class,
            \Arcanesoft\Core\Bases\PackageServiceProvider::class,
            \Arcanesoft\Core\CoreServiceProvider::class,
        ];

        foreach ($expectations as $expected) {
            $this->assertInstanceOf($expected, $this->provider);
        }
    }

    /** @test */
    public function it_can_provides()
    {
        $expected = [];

        $this->assertEquals($expected, $this->provider->provides());
    }
}
