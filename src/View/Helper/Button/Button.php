<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Button;

use BadMethodCallException;
use FrankVerhoeven\Bootstrap\Button\Color;
use FrankVerhoeven\Bootstrap\Button\Size;
use FrankVerhoeven\Bootstrap\Button\Tag;
use FrankVerhoeven\Bootstrap\Button\Type;
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
 * @method self anchor()
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
     * @var Color
     */
    protected $color;
    /**
     * @var Size
     */
    protected $size;
    /**
     * @var Tag
     */
    protected $tag;
    /**
     * @var Type
     */
    protected $type;

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
        $this->__reset();

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

    /**
     * Reset button to defaults
     *
     * @return self
     */
    protected function __reset(): Button
    {
        $this->attributes = [];
        $this->content = '';
        $this->color = Color::primary();
        $this->size = Size::normal();
        $this->tag = Tag::button();
        $this->type = Type::submit();
        $this->uri = '';
        $this->outline = false;
        $this->block = false;
        $this->active = false;
        $this->disabled = false;

        return $this;
    }

    public function render(): string
    {
        $this->addCssClass('btn');

        if ($this->outline) {
            $this->addCssClass('btn-outline-' . $this->color->getColor());
        } else {
            $this->addCssClass('btn-' . $this->color->getColor());
        }

        $this->addCssClass($this->size->getSize());

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

        if (!$this->tag->isAnchor()) {
            $this->attributes['type'] = $this->type->getType();
        } else {
            $this->attributes['role'] = 'button';
            $this->attributes['href'] = empty($this->uri) ? '#' : $this->uri; // @todo: throw exception?
        }

        if ($this->tag->isInput()) {
            $this->attributes['value'] = $this->content;
        }

        $btn = '<' . $this->tag->getTag() . $this->htmlAttribs($this->attributes);

        if ($this->tag->isInput()) {
            $btn .= $this->getClosingBracket();
        } else {
            $btn .= '>' . $this->content . '</' . $this->tag->getTag() . '>';
        }

        return $btn;
    }

    /**
     * @return Color
     */
    public function getColor(): Color
    {
        return $this->color;
    }

    /**
     * Setter to allow custom colors
     *
     * @param Color $color
     * @return self
     */
    public function setColor(Color $color): Button
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return Size
     */
    public function getSize(): Size
    {
        return $this->size;
    }

    /**
     * Setter to allow custom sizes
     *
     * @param Size $size
     * @return self
     */
    public function setSize(Size $size): Button
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

        if (\in_array($name, [ // @todo refactor
            'primary',
            'secondary',
            'success',
            'danger',
            'warning',
            'info',
            'light',
            'dark',
            'link',
            'small',
            'normal',
            'large',
            'input',
            'anchor',
            'submit',
            'reset',
            'outline',
            'block',
            'active',
            'disabled'
        ])) {
            if (\is_callable([Color::class, $name])) {
                $this->color = Color::$name();
                return $this;
            }
            if (\is_callable([Size::class, $name])) {
                $this->size = Size::$name();
                return $this;
            }
            if (\is_callable([Tag::class, $name])) {
                $this->tag = Tag::$name();
                return $this;
            }
            if (\is_callable([Type::class, $name])) {
                $this->type = Type::$name();
                return $this;
            }

            $this->$name = true;
            return $this;
        }

        throw new BadMethodCallException('Invalid method [' . $name . ']');
    }
}
