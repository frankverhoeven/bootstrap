<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Navigation;

use Zend\Navigation\AbstractContainer;
use Zend\View\Helper\Navigation;

/**
 * NavbarNav
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class NavbarNav extends Navigation
{
    /**
     * Renders helper
     *
     * @param  AbstractContainer $container
     * @return string
     */
    public function render($container = null)
    {
        /* @var $helper Navigation\Menu */
        $helper = $this->findHelper(Navigation\Menu::class);
        $helper->setPartial('bootstrap::view/helper/navigation/navbar-nav');

        return $helper->render($container);
    }
}
