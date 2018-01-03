<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper;

use BadMethodCallException;

/**
 * AbstractColorableHelper
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 *
 * @method self primary()
 * @method self secondary()
 * @method self success()
 * @method self danger()
 * @method self warning()
 * @method self info()
 * @method self light()
 * @method self dark()
 */
abstract class AbstractColorableHelper extends AbstractHelper
{
    /**
     * Out of the box colors.
     * @var array
     */
    protected $standardColorMap = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark',
    ];

    /**
     * Current color
     * @var string
     */
    protected $color = 'primary';

    /**
     * Whether the provided color is a standard color.
     *
     * @param string $color
     * @return bool
     */
    public function isStandardColor(string $color): bool
    {
        return in_array($color, $this->standardColorMap);
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return self
     */
    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    /**
     * Allow helper methods to set standard colors.
     *
     * @param string $name
     * @return self
     * @throws BadMethodCallException
     */
    public function __call(string $name): self
    {
        if (!$this->isStandardColor($name)) {
            throw new BadMethodCallException(sprintf('Undefined method "%s"', $name));
        }

        $this->color = $name;
        return $this;
    }
}
