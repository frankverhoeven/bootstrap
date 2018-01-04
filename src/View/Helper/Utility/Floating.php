<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Utility;

use InvalidArgumentException;

/**
 * Floating
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class Floating extends AbstractUtility
{
    /**
     * Allowed classes
     * @var array
     */
    protected $validClasses = [];

    /**
     * Setup validClasses classes
     *
     */
    public function __construct()
    {
        $floats = ['left', 'right', 'none'];

        foreach ($floats as $float) {
            $this->validClasses[] = 'float' . ucfirst($float);
            foreach ($this->breakpoints as $breakpoint) {
                $this->validClasses[] = 'float' . ucfirst($breakpoint) . ucfirst($float);
            }
        }
    }

    /**
     * Process a utility class.
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
