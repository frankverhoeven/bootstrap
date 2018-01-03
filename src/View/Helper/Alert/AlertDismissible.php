<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Alert;

/**
 * AlertDismissible
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class AlertDismissible extends Alert
{
    /**
     * Whether the alert should be dismissible
     * @var bool
     */
    protected $dismissible = true;
}
