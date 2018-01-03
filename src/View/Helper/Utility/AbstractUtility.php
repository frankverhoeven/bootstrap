<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Utility;

use FrankVerhoeven\Bootstrap\View\Helper\AbstractHelper;
use InvalidArgumentException;

/**
 * AbstractUtility
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
abstract class AbstractUtility
{
    /**
     * Responsive Breakpoints
     * @var array
     */
    protected $breakpoints = ['sm', 'md', 'lg', 'xl'];

    /**
     * Process a utility class.
     *
     * @param string $class
     * @return string
     * @throws InvalidArgumentException
     */
    abstract public function process(string $class): string;

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
