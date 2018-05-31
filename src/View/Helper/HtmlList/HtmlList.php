<?php
declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\HtmlList;

use FrankVerhoeven\Bootstrap\View\Helper\AbstractHelper;
use InvalidArgumentException;

/**
 * HtmlList
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class HtmlList extends AbstractHelper
{
    const LIST_TYPE_ORDERED = 'ordered';
    const LIST_TYPE_UNORDERED = 'unordered';
    const LIST_TYPE_UNSTYLED = 'unstyled';
    const LIST_TYPE_INLINE = 'inline';

    /**
     * Type of list to render
     * @var string
     */
    protected $listType = self::LIST_TYPE_ORDERED;

    /**
     * List Items
     * @var array
     */
    protected $items;

    /**
     * Whether to escape list items
     * @var bool
     */
    protected $escape;

    /**
     * @param array $items
     * @param array|null $attributes
     * @param bool $escape
     * @return self
     * @throws InvalidArgumentException
     */
    public function __invoke(array $items, array $attributes = null, bool $escape = false): HtmlList
    {
        if (empty($items)) {
            throw new InvalidArgumentException('$items can not be empty');
        }

        $this->items = $items;
        $this->escape = $escape;
        if (null !== $attributes) {
            $this->attributes = array_merge($this->attributes, $attributes);
        }

        return clone $this;
    }

    /**
     * Render the templates helper.
     *
     * @return string
     */
    public function render(): string
    {
        $li = '<li>';
        if (self::LIST_TYPE_ORDERED == $this->listType) {
            $tag = 'ol';
        } else {
            $tag = 'ul';
        }

        if (self::LIST_TYPE_UNSTYLED == $this->listType) {
            $this->addCssClass('list-unstyled');
        }
        if (self::LIST_TYPE_INLINE == $this->listType) {
            $this->addCssClass('list-inline');
            $li = '<li class="list-inline-item">';
        }

        $list = '';
        foreach ($this->items as $item) {
            if (is_array($item)) {
                $list .= $li . $this($item, $this->attributes) . '</li>';
            } else {
                if ($this->escape) {
                    $escaper = $this->getView()->plugin('escapeHtml');
                    $item = $escaper($item);
                }

                $list .= $li . $item . '</li>';
            }
        }

        return '<' . $tag . $this->htmlAttribs($this->attributes) . '>' . $list . '</' . $tag . '>';
    }

    /**
     * @return string
     */
    public function getListType(): string
    {
        return $this->listType;
    }

    /**
     * @param string $listType
     * @return self
     * @throws InvalidArgumentException
     */
    public function setListType(string $listType): HtmlList
    {
        if (!in_array($listType, [self::LIST_TYPE_ORDERED, self::LIST_TYPE_UNORDERED, self::LIST_TYPE_UNSTYLED, self::LIST_TYPE_INLINE])) {
            throw new InvalidArgumentException(sprintf('Invalid list type provided "%s"', $listType));
        }

        $this->listType = $listType;
        return $this;
    }
}
