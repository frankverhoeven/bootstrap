<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Button;

use FrankVerhoeven\Bootstrap\Button\Size;
use FrankVerhoeven\Bootstrap\Button\Tag;

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

        $this->tag = Tag::anchor();
        $this->size = Size::large();
        return $this;
    }
}
