<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap;

use FrankVerhoeven\Bootstrap\View\Helper\Alert\Alert;
use FrankVerhoeven\Bootstrap\View\Helper\Alert\AlertDismissible;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlList;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlListInline;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlListOrdered;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlListUnordered;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlListUnstyled;
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
                'bootstrapAlertDismissible' => AlertDismissible::class,
                'bootstrapList' => HtmlList::class,
                'bootstrapListInline' => HtmlListInline::class,
                'bootstrapListOrdered' => HtmlListOrdered::class,
                'bootstrapListUnordered' => HtmlListUnordered::class,
                'bootstrapListUnstyled' => HtmlListUnstyled::class,
            ],
            'factories' => [
                Alert::class => InvokableFactory::class,
                AlertDismissible::class => InvokableFactory::class,
                HtmlList::class => InvokableFactory::class,
                HtmlListInline::class => InvokableFactory::class,
                HtmlListOrdered::class => InvokableFactory::class,
                HtmlListUnordered::class => InvokableFactory::class,
                HtmlListUnstyled::class => InvokableFactory::class,
            ],
        ];
    }
}
