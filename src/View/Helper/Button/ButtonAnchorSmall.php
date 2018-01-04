<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Button;

/**
 * ButtonAnchorSmall
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class ButtonAnchorSmall extends Button
{
    /**
     * @return self
     */
    protected function __reset(): Button
    {
        parent::__reset();

        $this->tag = 'anchor';
        $this->size = 'small';
        return $this;
    }
}
