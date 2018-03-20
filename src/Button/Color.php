<?php

namespace FrankVerhoeven\Bootstrap\Button;

/**
 * Button Colors
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class Color
{
    /**
     * @var string
     */
    private $color;

    /**
     * @param string $color
     */
    private function __construct(string $color)
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->color;
    }

    /**
     * Primary button color.
     *
     * @return Color
     */
    public static function primary(): Color
    {
        return new static('primary');
    }

    /**
     * Secondary button color.
     *
     * @return Color
     */
    public static function secondary(): Color
    {
        return new static('secondary');
    }

    /**
     * Success button color.
     *
     * @return Color
     */
    public static function success(): Color
    {
        return new static('success');
    }

    /**
     * Danger button color.
     *
     * @return Color
     */
    public static function danger(): Color
    {
        return new static('danger');
    }

    /**
     * Warning button color.
     *
     * @return Color
     */
    public static function warning(): Color
    {
        return new static('warning');
    }

    /**
     * Info button color.
     *
     * @return Color
     */
    public static function info(): Color
    {
        return new static('info');
    }

    /**
     * Light button color.
     *
     * @return Color
     */
    public static function light(): Color
    {
        return new static('light');
    }

    /**
     * Dark button color.
     *
     * @return Color
     */
    public static function dark(): Color
    {
        return new static('dark');
    }

    /**
     * Link button color.
     *
     * @return Color
     */
    public static function link(): Color
    {
        return new static('link');
    }
}
