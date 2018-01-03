<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Utility;

use FrankVerhoeven\Bootstrap\View\Helper\AbstractHelper;
use InvalidArgumentException;

/**
 * Text
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class Text extends AbstractUtility
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
        $this->validClasses = ['fontWeightBold', 'fontWeightNormal', 'fontWeightLight', 'fontItalic'];

        $withBreakpoints = ['left', 'center', 'right'];
        $withoutBreakpoints = ['justify', 'nowrap','truncate','lowercase', 'uppercase', 'capitalize'];

        foreach ($withBreakpoints as $key) {
            $this->validClasses[] = 'text' . ucfirst($key);
            foreach ($this->breakpoints as $breakpoint) {
                $this->validClasses[] = 'text' . ucfirst($breakpoint) . ucfirst($key);
            }
        }
        foreach ($withoutBreakpoints as $key) {
            $this->validClasses[] = 'text' . ucfirst($key);
        }
    }

    /**
     * Allow helper methods to set text utilities.
     *  @link http://getbootstrap.com/docs/4.0/utilities/text/
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
