<?php
declare(strict_types=1);

namespace FrankVerhoeven\BootstrapTest\View\Helper;

use FrankVerhoeven\Bootstrap\View\Helper\AbstractHelper;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionProperty;

/**
 * AbstractHelperTest
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class AbstractHelperTest extends TestCase
{
    /**
     * @var AbstractHelper
     */
    private $helper;
    /**
     * @var ReflectionProperty
     */
    private $attributes;

    public function setUp()
    {
        $this->helper = $this->getMockForAbstractClass(AbstractHelper::class);

        $reflection = new ReflectionClass($this->helper);
        $this->attributes = $reflection->getProperty('attributes');
        $this->attributes->setAccessible(true);

        parent::setUp();
    }

    public function testAddSingleClassIfNoneExists()
    {
        $this->assertArrayNotHasKey('class', $this->attributes->getValue($this->helper));

        $this->helper->addCssClass('hello');
        $this->assertArrayHasKey('class', $this->attributes->getValue($this->helper));
        $this->assertEquals('hello', $this->attributes->getValue($this->helper)['class']);
    }

    public function testAddMultipleClassesIfNoneExists()
    {
        $this->assertArrayNotHasKey('class', $this->attributes->getValue($this->helper));

        $this->helper->addCssClass('hello world');
        $this->assertArrayHasKey('class', $this->attributes->getValue($this->helper));
        $this->assertEquals('hello world', $this->attributes->getValue($this->helper)['class']);
    }

    public function testDoNotAddClassIfEmpty()
    {
        $this->assertArrayNotHasKey('class', $this->attributes->getValue($this->helper));
        $this->helper->addCssClass('');
        $this->assertArrayNotHasKey('class', $this->attributes->getValue($this->helper));
    }

    public function testDoNotAddClassDuplicateIfExists()
    {
        $this->assertArrayNotHasKey('class', $this->attributes->getValue($this->helper));

        $this->helper->addCssClass('hello');
        $this->assertArrayHasKey('class', $this->attributes->getValue($this->helper));
        $this->assertEquals('hello', $this->attributes->getValue($this->helper)['class']);

        $this->helper->addCssClass('hello');
        $this->assertEquals('hello', $this->attributes->getValue($this->helper)['class']);
    }

    public function testDoNotAddClassDuplicate()
    {
        $this->assertArrayNotHasKey('class', $this->attributes->getValue($this->helper));

        $this->helper->addCssClass('hello hello world');
        $this->assertArrayHasKey('class', $this->attributes->getValue($this->helper));
        $this->assertEquals('hello world', $this->attributes->getValue($this->helper)['class']);
    }

    public function testToStringReturnsRender()
    {
        $this->assertEquals($this->helper->render(), $this->helper->__toString());
    }

    public function testExceptionIfBadMethodCall()
    {
        $this->expectException(\BadMethodCallException::class);
        $this->helper->badMethodCall();
    }
}
