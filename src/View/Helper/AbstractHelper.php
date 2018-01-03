<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper;

use BadMethodCallException;
use Zend\View\Helper\AbstractHtmlElement;

/**
 * AbstractHelper
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
abstract class AbstractHelper extends AbstractHtmlElement implements SpacingUtilityInterface, TextUtilityInterface
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

    /**
     * Add helper methods for various formatting classes.
     *
     * @param string $name
     * @param array $arguments
     * @return self
     * @throws BadMethodCallException
     */
    public function __call(string $name, array $arguments): AbstractHelper
    {
        try {
            $this->spacing($name);
            return $this;
        } catch (BadMethodCallException $e) {}
        try {
            $this->text($name);
            return $this;
        } catch (BadMethodCallException $e) {}

        throw $e;
    }

    /**
     * Allow helper methods to set spacing.
     *  @link http://getbootstrap.com/docs/4.0/utilities/spacing/
     *
     * @param string $class
     * @return void
     * @throws BadMethodCallException
     */
    protected function spacing(string $class): void
    {
        $allowed = ['mxAuto'];
        $breakpoints = ['sm', 'md', 'lg', 'xl'];
        $properties = ['p', 'm'];
        $sides = ['t', 'b', 'l', 'r', 'x', 'y'];
        $sizes = [0, 1, 2, 3, 4, 5];

        foreach ($properties as $property) {
            foreach ($sizes as $size) {
                $allowed[] = $property . $size;

                foreach ($breakpoints as $breakpoint) {
                    $allowed[] = $property . ucfirst($breakpoint) . $size;
                }

                foreach ($sides as $side) {
                    $allowed[] = $property . $side . $size;

                    foreach ($breakpoints as $breakpoint) {
                        $allowed[] = $property . $side . ucfirst($breakpoint) . $size;
                    }
                }
            }
        }

        if (!in_array($class, $allowed)) {
            throw new BadMethodCallException(sprintf('Invalid method "%s"', $class));
        }

        $this->addCssClass($this->covertCamelCaseToCssClass($class));
    }

    /**
     * Allow helper methods to set text utilities.
     *  @link http://getbootstrap.com/docs/4.0/utilities/text/
     *
     * @param string $class
     * @return void
     * @throws BadMethodCallException
     */
    protected function text(string $class): void
    {
        $allowed = ['fontWeightBold', 'fontWeightNormal', 'fontWeightLight', 'fontItalic'];

        $breakpoints = ['sm', 'md', 'lg', 'xl'];
        $withBreakpoints = ['left', 'center', 'right'];
        $withoutBreakpoints = ['justify', 'nowrap','truncate','lowercase', 'uppercase', 'capitalize'];

        foreach ($withBreakpoints as $key) {
            $allowed[] = 'text' . ucfirst($key);
            foreach ($breakpoints as $breakpoint) {
                $allowed[] = 'text' . ucfirst($breakpoint) . ucfirst($key);
            }
        }
        foreach ($withoutBreakpoints as $key) {
            $allowed[] = 'text' . ucfirst($key);
        }

        if (!in_array($class, $allowed)) {
            throw new BadMethodCallException(sprintf('Invalid method "%s"', $class));
        }

        $this->addCssClass($this->covertCamelCaseToCssClass($class));
    }

    /**
     * Convert a camal case string to a css class.
     *  Eg. fontWeightBold -> font-weight-bold
     *
     * @param string $camel
     * @param bool $includeNumeric
     * @return string
     */
    protected function covertCamelCaseToCssClass(string $camel, bool $includeNumeric = true): string
    {
        $search = range('A', 'Z');
        $replace = range('a', 'z');

        if ($includeNumeric) {
            $search = array_merge($search, range(0, 9));
            $replace = array_merge($replace, range(0, 9));
        }

        $replace = array_map(function($v) {return '-' . $v;}, $replace);

        return str_replace($search, $replace, $camel);
    }
}
