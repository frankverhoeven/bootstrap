<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Button;

use BadMethodCallException;
use FrankVerhoeven\Bootstrap\View\Helper\AbstractHelper;
use InvalidArgumentException;
use Zend\Form\ElementInterface;

/**
 * Button
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
 * @method self link()
 *
 * @method self small()
 * @method self normal()
 * @method self large()
 *
 * @method self a()
 * @method self input()
 *
 * @method self submit()
 * @method self reset()
 *
 * @method self outline()
 * @method self block()
 * @method self active()
 * @method self disabled()
 */
class Button extends AbstractHelper
{
    /**
     * Button content
     * @var string
     */
    protected $content;

    /**
     * Current color
     * @var string
     */
    protected $color = 'primary';

    /**
     * Out of the box colors
     * @var array
     */
    protected $colorMap = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark',
        'link',
    ];

    /**
     * Current size
     * @var string
     */
    protected $size = 'normal';

    /**
     * Out of the box sizes
     * @var array
     */
    protected $sizeMap = [
        'small',
        'normal',
        'large',
    ];

    /**
     * Current tag
     * @var string
     */
    protected $tag = 'button';

    /**
     * Available tags
     * @var array
     */
    protected $tagMap = [
        'button',
        'input',
        'a',
    ];

    /**
     * Current type
     * @var string
     */
    protected $type = 'submit';

    /**
     * Available types
     * @var array
     */
    protected $typeMap = [
        'button',
        'submit',
        'reset',
    ];

    /**
     * URI for <a href> tag
     * @var string
     */
    protected $uri;

    /**
     * Whether the button should have outline style
     * @var bool
     */
    protected $outline = false;

    /**
     * Whether the button should have block style
     * @var bool
     */
    protected $block = false;

    /**
     * Whether the button should be active
     * @var bool
     */
    protected $active = false;

    /**
     * Whether the button should be disabled
     * @var bool
     */
    protected $disabled = false;

    /**
     * Retreive helper and set the button content
     *
     * @param string|ElementInterface $content
     * @param array|null $attributes
     * @return self
     * @throws InvalidArgumentException
     */
    public function __invoke($content, array $attributes = null): Button
    {
        if (is_string($content)) {
            $this->content = $content;
        } else if ($content instanceof ElementInterface) {
            $this->content = $content->getValue();
            $this->attributes = array_merge($this->attributes, $content->getAttributes());
        } else {
            throw new InvalidArgumentException('Invalid $content provided, must be string or ElementInterface');
        }

        if (null !== $attributes) {
            $this->attributes = array_merge($this->attributes, $attributes);
        }

        return $this;
    }

    public function render(): string
    {
        $this->addCssClass('btn');

        $color = $this->color;
        if ($this->isStandardColor($color)) {
            if ($this->outline) {
                $this->addCssClass('btn-outline-' . $color);
            } else {
                $this->addCssClass('btn-' . $color);
            }
        } else {
            $this->addCssClass($color);
        }

        $size = $this->size;
        if ($this->isStandardSize($size)) {
            if ('small' == $size) {
                $size = 'btn-sm';
            } else if ('large' == $size) {
                $size = 'btn-lg';
            } else {
                $size = '';
            }
        }
        $this->addCssClass($size);

        if ($this->block) {
            $this->addCssClass('btn-block');
        }

        if ($this->active) {
            $this->addCssClass('active');
            $this->attributes['aria-pressed'] = 'true';
        }

        if ($this->disabled) {
            $this->addCssClass('disabled');
            $this->attributes['disabled'] = 'disabled';
        }

        if ('a' != $this->tag) {
            $this->attributes['type'] = $this->type;
        } else {
            $this->attributes['role'] = 'button';
            $this->attributes['href'] = empty($this->uri) ? '#' : $this->uri; // @todo: throw exception?
        }

        if ('input' == $this->tag) {
            $this->attributes['value'] = $this->content;
        }

        $btn = '<' . $this->tag . $this->htmlAttribs($this->attributes);

        if ('input' == $this->tag) {
            $btn .= $this->getClosingBracket();
        } else {
            $btn .= '>' . $this->content . '</' . $this->tag . '>';
        }

        return $btn;
    }

    /**
     * Whether the provided color is a standard color.
     *
     * @param string $color
     * @return bool
     */
    public function isStandardColor(string $color): bool
    {
        return in_array($color, $this->colorMap);
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Setter to allow custom colors
     *
     * @param string $color
     * @return self
     */
    public function setColor(string $color): Button
    {
        $this->color = $color;
        return $this;
    }

    /**
     * Whether the provided size is a standard size.
     *
     * @param string $size
     * @return bool
     */
    public function isStandardSize(string $size): bool
    {
        return in_array($size, $this->sizeMap);
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * Setter to allow custom sizes
     *
     * @param string $size
     * @return self
     */
    public function setSize(string $size): Button
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     * @return self
     */
    public function setUri(string $uri): Button
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * Allow helper methods to set color & size
     *
     * @param string $name
     * @param array $arguments
     * @return self
     * @throws BadMethodCallException
     */
    public function __call(string $name, array $arguments): AbstractHelper
    {
        try {
            parent::__call($name, $arguments);
            return $this;
        } catch (BadMethodCallException $e) {}

        if (in_array($name, $this->colorMap)) {
            $this->color = $name;
            return $this;
        }
        if (in_array($name, $this->sizeMap)) {
            $this->size = $name;
            return $this;
        }
        if (in_array($name, ['a', 'input'])) {
            $this->tag = $name;
            return $this;
        }
        if (in_array($name, ['submit', 'reset'])) {
            $this->type = $name;
            return $this;
        }
        if (in_array($name, ['outline', 'block', 'active', 'disabled'])) {
            $this->$name = true;
            return $this;
        }

        throw new BadMethodCallException('Invalid method [' . $name . ']');
    }
}
