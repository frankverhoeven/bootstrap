<?php

namespace FrankVerhoeven\Bootstrap\Button;

/**
 * Button Sizes
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class Size
{
    /**
     * @var string
     */
    private $size;

    /**
     * @param string $size
     */
    private function __construct(string $size)
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->size;
    }

    /**
     * Small button size
     *
     * @return Size
     */
    public static function small(): Size
    {
        return new static('btn-sm');
    }

    /**
     * Normal button size
     *
     * @return Size
     */
    public static function normal(): Size
    {
        return new static('');
    }

    /**
     * Large button size
     *
     * @return Size
     */
    public static function large(): Size
    {
        return new static('btn-lg');
    }
}
