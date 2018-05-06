<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap;

use FrankVerhoeven\Bootstrap\View\Helper\Alert\Alert;
use FrankVerhoeven\Bootstrap\View\Helper\Alert\AlertDismissible;
use FrankVerhoeven\Bootstrap\View\Helper\Button\Button;
use FrankVerhoeven\Bootstrap\View\Helper\Button\ButtonAnchor;
use FrankVerhoeven\Bootstrap\View\Helper\Button\ButtonAnchorLarge;
use FrankVerhoeven\Bootstrap\View\Helper\Button\ButtonAnchorSmall;
use FrankVerhoeven\Bootstrap\View\Helper\Button\ButtonLarge;
use FrankVerhoeven\Bootstrap\View\Helper\Button\ButtonSmall;
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
     * @return array
     */
    public function __invoke(): array
    {
        return [
            'view_helpers' => $this->getViewHelperConfig(),
        ];
    }

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
                'bootstrapButton' => Button::class,
                'bootstrapButtonSmall' => ButtonSmall::class,
                'bootstrapButtonLarge' => ButtonLarge::class,
                'bootstrapButtonAnchor' => ButtonAnchor::class,
                'bootstrapButtonAnchorSmall' => ButtonAnchorSmall::class,
                'bootstrapButtonAnchorLarge' => ButtonAnchorLarge::class,
                'bootstrapList' => HtmlList::class,
                'bootstrapListInline' => HtmlListInline::class,
                'bootstrapListOrdered' => HtmlListOrdered::class,
                'bootstrapListUnordered' => HtmlListUnordered::class,
                'bootstrapListUnstyled' => HtmlListUnstyled::class,
            ],
            'factories' => [
                Alert::class => InvokableFactory::class,
                AlertDismissible::class => InvokableFactory::class,
                Button::class => InvokableFactory::class,
                ButtonSmall::class => InvokableFactory::class,
                ButtonLarge::class => InvokableFactory::class,
                ButtonAnchor::class => InvokableFactory::class,
                ButtonAnchorSmall::class => InvokableFactory::class,
                ButtonAnchorLarge::class => InvokableFactory::class,
                HtmlList::class => InvokableFactory::class,
                HtmlListInline::class => InvokableFactory::class,
                HtmlListOrdered::class => InvokableFactory::class,
                HtmlListUnordered::class => InvokableFactory::class,
                HtmlListUnstyled::class => InvokableFactory::class,
            ],
        ];
    }
}
