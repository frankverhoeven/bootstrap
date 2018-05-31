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
use FrankVerhoeven\Bootstrap\View\Helper\Form\FormRow;
use FrankVerhoeven\Bootstrap\View\Helper\Form\FormRowCustomCheckbox;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlList;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlListInline;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlListOrdered;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlListUnordered;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlListUnstyled;
use FrankVerhoeven\Bootstrap\View\Helper\Navigation\NavbarNav;
use FrankVerhoeven\Bootstrap\View\Helper\Table\Table;
use FrankVerhoeven\Bootstrap\View\Helper\Table\TableRow;
use FrankVerhoeven\Bootstrap\View\Helper\Table\TableRowHead;
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
            'templates' => $this->getTemplates(),
            'view_helpers' => $this->getViewHelperConfig(),
        ];
    }

    /**
     * Return templates helper configuration.
     *
     * @return array
     */
    public function getViewHelperConfig(): array
    {
        return [
            'aliases' => [
                'bsAlert' => Alert::class,
                'bsAlertDismissible' => AlertDismissible::class,
                'bsButton' => Button::class,
                'bsButtonSmall' => ButtonSmall::class,
                'bsButtonLarge' => ButtonLarge::class,
                'bsButtonAnchor' => ButtonAnchor::class,
                'bsButtonAnchorSmall' => ButtonAnchorSmall::class,
                'bsButtonAnchorLarge' => ButtonAnchorLarge::class,
                'bsList' => HtmlList::class,
                'bsListInline' => HtmlListInline::class,
                'bsListOrdered' => HtmlListOrdered::class,
                'bsListUnordered' => HtmlListUnordered::class,
                'bsListUnstyled' => HtmlListUnstyled::class,
                'bsNavbarNav' => NavbarNav::class,
                'bsTable' => Table::class,
                'bsTableRow' => TableRow::class,
                'bsTableRowHead' => TableRowHead::class,
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
                Table::class => InvokableFactory::class,
                TableRow::class => InvokableFactory::class,
                TableRowHead::class => InvokableFactory::class,
            ],
            'invokables' => [
                'formRow' => FormRow::class,
                'bootstrapFormRowCustomCheckbox' => FormRowCustomCheckbox::class,
            ],
        ];
    }

    public function getTemplates(): array
    {
        return [
            'paths' => [
                'bootstrap' => [__DIR__ . '/../templates/bootstrap'],
            ],
        ];
    }
}
