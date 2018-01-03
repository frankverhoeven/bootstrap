<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper;

/**
 * DismissibleAlert
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class DismissibleAlert extends Alert
{
    /**
     * Whether the alert should be dismissible
     * @var bool
     */
    protected $dismissible = true;
}
