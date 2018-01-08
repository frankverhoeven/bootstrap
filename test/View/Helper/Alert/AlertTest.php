<?php
declare(strict_types=1);

namespace FrankVerhoeven\BootstrapTest\View\Helper\Alert;

use FrankVerhoeven\Bootstrap\View\Helper\Alert\Alert;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Zend\View\Renderer\PhpRenderer;

/**
 * AlertTest
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class AlertTest extends TestCase
{
    /**
     * @var Alert
     */
    private $alert;

    /**
     * @var array
     */
    private $standardColorMap = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark'
    ];

    public function setUp()
    {
        $this->alert = new Alert();

        $view = $this->getMockBuilder(PhpRenderer::class)
            ->setMethods(['plugin'])
            ->getMock();

        $view->expects($this->any())
            ->method('plugin')
            ->with($this->logicalOr($this->equalTo('escapehtml'), $this->equalTo('escapehtmlattr')))
            ->willReturn(function($v){return $v;});

        $this->alert->setView($view);

        parent::setUp();
    }

    public function testDefaultOptions()
    {
        $reflection = new ReflectionClass($this->alert);

        $content = $reflection->getProperty('content');
        $content->setAccessible(true);
        $this->assertNull($content->getValue($this->alert));

        $attributes = $reflection->getProperty('attributes');
        $attributes->setAccessible(true);
        $this->assertEquals(['role' => 'alert'], $attributes->getValue($this->alert));

        $dismissible = $reflection->getProperty('dismissible');
        $dismissible->setAccessible(true);
        $this->assertFalse($dismissible->getValue($this->alert));

        $color = $reflection->getProperty('color');
        $color->setAccessible(true);
        $this->assertEquals('primary', $color->getValue($this->alert));

        $standardColorMap = $reflection->getProperty('standardColorMap');
        $standardColorMap->setAccessible(true);
        $this->assertEquals(
            $this->standardColorMap,
            $standardColorMap->getValue($this->alert)
        );
    }

    public function testCanSetDismissible()
    {
        $this->alert->setDismissible(true);
        $this->assertTrue($this->alert->isDismissible());
        $this->alert->setDismissible(false);
        $this->assertFalse($this->alert->isDismissible());
    }

    public function testCanSetColor()
    {
        $this->alert->setColor('secondary');
        $this->assertEquals('secondary', $this->alert->getColor());
        $this->alert->setColor('primary');
        $this->assertEquals('primary', $this->alert->getColor());
    }

    public function testIsStandardColor()
    {
        foreach ($this->standardColorMap as $color) {
            $this->assertTrue($this->alert->isStandardColor($color));
        }

        $this->assertFalse($this->alert->isStandardColor('notStandardColor'));
    }

    public function testSetContentWithInvoke()
    {
        ($this->alert)('hello world');

        $reflection = new ReflectionClass($this->alert);

        $content = $reflection->getProperty('content');
        $content->setAccessible(true);
        $this->assertEquals('hello world', $content->getValue($this->alert));
    }

    public function testSetAttributesWithInvoke()
    {
        ($this->alert)('hello world', ['class' => 'hello world']);

        $reflection = new ReflectionClass($this->alert);

        $attributes = $reflection->getProperty('attributes');
        $attributes->setAccessible(true);

        $this->assertArrayHasKey('class', $attributes->getValue($this->alert));
        $this->assertEquals('hello world', $attributes->getValue($this->alert)['class']);

        $this->assertArrayHasKey('role', $attributes->getValue($this->alert));
        $this->assertEquals('alert', $attributes->getValue($this->alert)['role']);
    }

    public function testOVerrideAttributeWithInvoke()
    {
        ($this->alert)('hello world', ['role' => 'warning']);

        $reflection = new ReflectionClass($this->alert);

        $attributes = $reflection->getProperty('attributes');
        $attributes->setAccessible(true);

        $this->assertArrayHasKey('role', $attributes->getValue($this->alert));
        $this->assertEquals('warning', $attributes->getValue($this->alert)['role']);
    }

    public function testInvokeShouldResetOptions()
    {
        ($this->alert)('hello world', ['class' => 'hi', 'onload' => 'bye']);
        $this->alert->setDismissible(true);
        $this->alert->setColor('secondary');


        $reflection = new ReflectionClass($this->alert);

        $attributes = $reflection->getProperty('attributes');
        $attributes->setAccessible(true);
        $this->assertEquals(['role' => 'alert', 'class' => 'hi', 'onload' => 'bye'], $attributes->getValue($this->alert));

        $dismissible = $reflection->getProperty('dismissible');
        $dismissible->setAccessible(true);
        $this->assertTrue($dismissible->getValue($this->alert));

        $color = $reflection->getProperty('color');
        $color->setAccessible(true);
        $this->assertEquals('secondary', $color->getValue($this->alert));

        ($this->alert)('bye world');

        $this->assertEquals(['role' => 'alert'], $attributes->getValue($this->alert));
        $this->assertFalse($dismissible->getValue($this->alert));
        $this->assertEquals('primary', $color->getValue($this->alert));
    }

    public function testRenderReturnsHtmlAlert()
    {
        $alert = ($this->alert)('hello world')->render();

        $this->assertStringStartsWith('<div', $alert);
        $this->assertContains('alert', $alert);
        $this->assertContains('alert-primary', $alert);
        $this->assertContains('hello world', $alert);
        $this->assertStringEndsWith('</div>', $alert);
    }

    public function testRenderReturnsDismissibleHtmlAlert()
    {
        ($this->alert)('hello world');
        $this->alert->setDismissible(true);
        $alert = $this->alert->render();

        $this->assertStringStartsWith('<div', $alert);
        $this->assertContains('alert', $alert);
        $this->assertContains('alert-dismissible', $alert);
        $this->assertContains('<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
            . '<span aria-hidden="true">&times;</span>'
            . '</button>', $alert);
        $this->assertContains('alert-primary', $alert);
        $this->assertContains('hello world', $alert);
        $this->assertStringEndsWith('</div>', $alert);
    }

    public function testRenderNonStandardColorReturnsHtmlAlert()
    {
        $alert = ($this->alert)('hello world')->setColor('non-std-color')->render();

        $this->assertContains('non-std-color', $alert);
        $this->assertNotContains('alert-non-std-color', $alert);
    }

    public function testMagicMethodStandardColors()
    {
        $reflection = new ReflectionClass($this->alert);

        $color = $reflection->getProperty('color');
        $color->setAccessible(true);

        $this->alert->secondary();
        $this->assertEquals('secondary', $color->getValue($this->alert));
        $this->alert->primary();
        $this->assertEquals('primary', $color->getValue($this->alert));
        $this->alert->success();
        $this->assertEquals('success', $color->getValue($this->alert));
        $this->alert->danger();
        $this->assertEquals('danger', $color->getValue($this->alert));
        $this->alert->warning();
        $this->assertEquals('warning', $color->getValue($this->alert));
        $this->alert->info();
        $this->assertEquals('info', $color->getValue($this->alert));
        $this->alert->light();
        $this->assertEquals('light', $color->getValue($this->alert));
        $this->alert->dark();
        $this->assertEquals('dark', $color->getValue($this->alert));
    }

    public function testInvalidMagicMethod()
    {
        $this->expectException(\BadMethodCallException::class);
        $this->alert->badMethod();
    }
}
