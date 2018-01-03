<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Utility;

use FrankVerhoeven\Bootstrap\View\Helper\AbstractHelper;
use InvalidArgumentException;

/**
 * Spacing
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class Spacing extends AbstractUtility
{
    /**
     * Allowed classes
     * @var array
     */
    protected $validClasses;

    /**
     * Setup validClasses classes
     *
     * @todo: allow custom sizes
     *
     */
    public function __construct()
    {
        $this->validClasses = ['mxAuto'];
        $properties = ['p', 'm'];
        $sides = ['t', 'b', 'l', 'r', 'x', 'y'];
        $sizes = [0, 1, 2, 3, 4, 5];

        foreach ($properties as $property) {
            foreach ($sizes as $size) {
                $this->validClasses[] = $property . $size;

                foreach ($this->breakpoints as $breakpoint) {
                    $this->validClasses[] = $property . ucfirst($breakpoint) . $size;
                }

                foreach ($sides as $side) {
                    $this->validClasses[] = $property . $side . $size;

                    foreach ($this->breakpoints as $breakpoint) {
                        $this->validClasses[] = $property . $side . ucfirst($breakpoint) . $size;
                    }
                }
            }
        }
    }

    /**
     * Allow helper methods to set spacing.
     *  @link http://getbootstrap.com/docs/4.0/utilities/spacing/
     *
     * @param string $class
     * @return string
     * @throws InvalidArgumentException
     */
    public function process(string $class): string
    {
        if (!in_array($class, $this->validClasses)) {
            throw new InvalidArgumentException(sprintf('Tried to use invalid class: [%s]', $class));
        }

        return $this->covertCamelCaseToCssClass($class);
    }
}
