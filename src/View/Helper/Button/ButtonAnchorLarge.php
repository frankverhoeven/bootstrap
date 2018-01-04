<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Button;

/**
 * ButtonAnchorLarge
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class ButtonAnchorLarge extends Button
{
    /**
     * @return self
     */
    protected function __reset(): Button
    {
        parent::__reset();

        $this->tag = 'anchor';
        $this->size = 'large';
        return $this;
    }
}
