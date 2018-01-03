<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper;

use Zend\View\Helper\AbstractHtmlElement;

/**
 * AbstractHelper
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
abstract class AbstractHelper extends AbstractHtmlElement
{
    /**
     * Attributes for the element
     * @var array
     */
    protected $attributes = [];

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }

    /**
     * Render the view helper.
     *
     * @return string
     */
    abstract public function render(): string;

    /**
     * Add css class(es) to the attributes stack.
     *
     * @param string $class Class(es) to add
     * @return self
     */
    public function addCssClass(string $class): self
    {
        $class = trim($class);
        if (empty($class)) {
            return $this;
        }

        if (!isset($this->attributes['class'])) {
            $this->attributes['class'] = $class;
        } else {
            $classesToAdd = explode(' ', $class);
            $currentClasses = explode(' ', $this->attributes['class']);

            foreach ($classesToAdd as $class) {
                if (!in_array($class, $currentClasses)) {
                    $currentClasses[] = $class;
                }
            }

            $this->attributes['class'] = implode(' ', $currentClasses);
        }

        return $this;
    }
}
