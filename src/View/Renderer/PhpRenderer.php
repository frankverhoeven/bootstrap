<?php

namespace FrankVerhoeven\Bootstrap\Renderer;

use FrankVerhoeven\Bootstrap\View\Helper\Alert;
use FrankVerhoeven\Bootstrap\View\Helper\DismissibleAlert;
use Zend\View\Renderer\PhpRenderer as ZendPhpRenderer;

/**
 * PhpRenderer
 *
 * Allow code completion of view helpers.
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 *
 * @method Alert bootstrapAlert(string $content, array $arguments = null)
 * @method DismissibleAlert bootstrapDismissibleAlert(string $content, array $arguments = null)
 */
class PhpRenderer extends ZendPhpRenderer
{}
