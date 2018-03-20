<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Button;

use FrankVerhoeven\Bootstrap\Button\Tag;

/**
 * ButtonAnchor
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class ButtonAnchor extends Button
{
    /**
     * @return self
     */
    protected function __reset(): Button
    {
        parent::__reset();

        $this->tag = Tag::anchor();
        return $this;
    }
}
