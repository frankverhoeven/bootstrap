<?php
declare(strict_types=1);

namespace FrankVerhoeven\BootstrapTest\View\Helper\HtmlList;

use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlList;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Zend\View\Renderer\PhpRenderer;

/**
 * HtmlListTest
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class HtmlListTest extends TestCase
{
    /**
     * @var HtmlList
     */
    private $list;

    public function setUp()
    {
        $this->list = new HtmlList();

        $view = $this->getMockBuilder(PhpRenderer::class)
            ->setMethods(['plugin'])
            ->getMock();

        $view->expects($this->any())
            ->method('plugin')
            ->with($this->logicalOr(
                $this->equalTo('escapehtml'),
                $this->equalTo('escapehtmlattr'),
                $this->equalTo('escapeHtml')
            ))
            ->willReturn(function($v){return $v;});

        $this->list->setView($view);

        parent::setUp();
    }

    public function testGetSetListType()
    {
        $this->list->setListType(HtmlList::LIST_TYPE_INLINE);
        $this->assertEquals(HtmlList::LIST_TYPE_INLINE, $this->list->getListType());
        $this->list->setListType(HtmlList::LIST_TYPE_UNORDERED);
        $this->assertEquals(HtmlList::LIST_TYPE_UNORDERED, $this->list->getListType());
    }

    public function testInvalidListType()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->list->setListType('invalid-list-type');
    }

    public function testInvokeSetsOptions()
    {

    }
}
