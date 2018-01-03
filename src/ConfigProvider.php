<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap;

use FrankVerhoeven\Bootstrap\View\Helper\Alert;
use FrankVerhoeven\Bootstrap\View\Helper\DismissibleAlert;
use Zend\ServiceManager\Factory\InvokableFactory;

/**
 * ConfigProvider
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class ConfigProvider
{
    /**
     * Return view helper configuration.
     *
     * @return array
     */
    public function getViewHelperConfig(): array
    {
        return [
            'aliases' => [
                'bootstrapAlert' => Alert::class,
                'bootstrapDismissibleAlert' => DismissibleAlert::class,
            ],
            'factories' => [
                Alert::class => InvokableFactory::class,
                DismissibleAlert::class => InvokableFactory::class,
            ],
        ];
    }
}
