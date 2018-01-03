<?php

namespace FrankVerhoeven\Bootstrap\Renderer;

use FrankVerhoeven\Bootstrap\View\Helper\Alert\Alert;
use FrankVerhoeven\Bootstrap\View\Helper\Alert\AlertDismissible;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlList;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlListInline;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlListOrdered;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlListUnordered;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlListUnstyled;
use Zend\View\Renderer\PhpRenderer as ZendPhpRenderer;

/**
 * PhpRenderer
 *
 * Allow code completion of view helpers.
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 *
 * @method Alert bootstrapAlert(string $content, array $attributes = null)
 * @method AlertDismissible bootstrapDismissibleAlert(string $content, array $attributes = null)
 * @method HtmlList bootstrapList(array $items, array $attributes = null, bool $escape = false)
 * @method HtmlListInline bootstrapListInline(array $items, array $attributes = null, bool $escape = false)
 * @method HtmlListOrdered bootstrapListOrdered(array $items, array $attributes = null, bool $escape = false)
 * @method HtmlListUnordered bootstrapListUnordered(array $items, array $attributes = null, bool $escape = false)
 * @method HtmlListUnstyled bootstrapListUnstyled(array $items, array $attributes = null, bool $escape = false)
 */
class PhpRenderer extends ZendPhpRenderer
{}
