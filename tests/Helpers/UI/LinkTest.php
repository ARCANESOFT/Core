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
     |  Properties
     | -----------------------------------------------------------------
     */
    /** @var  \Arcanesoft\Core\Helpers\UI\Link */
    private $link;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */
    public function setUp()
    {
        parent::setUp();

        $this->link = new Link();
    }

    public function tearDown()
    {
        unset($this->link);

        parent::tearDown();
    }

    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */
    /** @test */
    public function it_can_be_instantiated()
    {
        $this->assertInstanceOf(\Arcanesoft\Core\Helpers\UI\Link::class, $this->link);
    }

    /** @test */
    public function it_can_generate_add_link()
    {
        $link = $this->link->addLink('http://localhost/pages/add');

        $this->assertSame(
            '<a href="http://localhost/pages/add">'.
                '<i class="fa fa-fw fa-plus"></i> Add'.
            '</a>',
            $link->toHtml()
        );

        $link = $this->link->addLink('http://localhost/pages/add', null, ['data-toggle' => 'tooltip', 'data-original-title' => 'Add info']);

        $this->assertSame(
            '<a href="http://localhost/pages/add" data-toggle="tooltip" data-original-title="Add info">'.
                '<i class="fa fa-fw fa-plus"></i> Add'.
            '</a>',
            $link->toHtml()
        );

        $link = $this->link->addLink('http://localhost/pages/add', null, [], false);

        $this->assertSame(
            '<a href="http://localhost/pages/add">Add</a>',
            $link->toHtml()
        );
    }
}
