<?php

namespace FrankVerhoeven\Bootstrap\Button;

/**
 * Button Input Type
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class Type
{
    /**
     * @var string
     */
    private $type;

    /**
     * @param string $type
     */
    private function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->type;
    }

    /**
     * <input type="button"> Tag
     *
     * @return Type
     */
    public static function button(): Type
    {
        return new static('button');
    }

    /**
     * <input type="submit"> Tag
     *
     * @return Type
     */
    public static function submit(): Type
    {
        return new static('submit');
    }

    /**
     * <input type="reset"> Tag
     *
     * @return Type
     */
    public static function reset(): Type
    {
        return new static('reset');
    }
}
