<?php

namespace FrankVerhoeven\Bootstrap\Button;

/**
 * Button Tag
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class Tag
{
    /**
     * @var string
     */
    private $tag;

    /**
     * @param string $tag
     */
    private function __construct(string $tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return string
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * @return bool
     */
    public function isInput(): bool
    {
        return 'input' == $this->tag;
    }

    /**
     * @return bool
     */
    public function isButton(): bool
    {
        return 'button' == $this->tag;
    }

    /**
     * @return bool
     */
    public function isAnchor(): bool
    {
        return 'a' == $this->tag;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->tag;
    }

    /**
     * <input> Tag
     *
     * @return Tag
     */
    public static function input(): Tag
    {
        return new static('input');
    }

    /**
     * <button> Tag
     *
     * @return Tag
     */
    public static function button(): Tag
    {
        return new static('button');
    }

    /**
     * <a> Tag
     *
     * @return Tag
     */
    public static function anchor(): Tag
    {
        return new static('a');
    }
}
