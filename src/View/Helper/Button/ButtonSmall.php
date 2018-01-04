<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Button;

/**
 * ButtonSmall
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class ButtonSmall extends Button
{
    /**
     * @return self
     */
    protected function __reset(): Button
    {
        parent::__reset();

        $this->size = 'small';
        return $this;
    }
}
