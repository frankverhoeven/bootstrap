<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Button;

use FrankVerhoeven\Bootstrap\Button\Size;

/**
 * ButtonLarge
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class ButtonLarge extends Button
{
    /**
     * @return self
     */
    protected function __reset(): Button
    {
        parent::__reset();

        $this->size = Size::large();
        return $this;
    }
}
