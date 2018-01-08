<?php

namespace FrankVerhoeven\BootstrapTest\View\Helper\Alert;

use FrankVerhoeven\Bootstrap\View\Helper\Alert\Alert;
use FrankVerhoeven\Bootstrap\View\Helper\Alert\AlertDismissible;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * AlertDismissibleTest
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class AlertDismissibleTest extends TestCase
{
    /**
     * @var AlertDismissible
     */
    private $alert;

    public function setUp()
    {
        $this->alert = new AlertDismissible();
    }

    public function testInstanceOfAlert()
    {
        $this->assertInstanceOf(Alert::class, $this->alert);
    }

    public function testDefaultOptions()
    {
        $reflection = new ReflectionClass($this->alert);

        $dismissible = $reflection->getProperty('dismissible');
        $dismissible->setAccessible(true);
        $this->assertTrue($dismissible->getValue($this->alert));
    }

    public function testDismissibleAfterInvoke()
    {
        ($this->alert)('hi');

        $reflection = new ReflectionClass($this->alert);

        $dismissible = $reflection->getProperty('dismissible');
        $dismissible->setAccessible(true);
        $this->assertTrue($dismissible->getValue($this->alert));
    }
}
