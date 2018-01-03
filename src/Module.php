<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Module
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class Module implements ConfigProviderInterface
{
    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        $provider = new ConfigProvider();

        return [
            'view_helpers' => $provider->getViewHelperConfig(),
        ];
    }
}
