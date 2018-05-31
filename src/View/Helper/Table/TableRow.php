<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Table;

use FrankVerhoeven\Bootstrap\View\Helper\AbstractHelper;

class TableRow extends AbstractHelper
{
    /**
     * @var string[]
     */
    protected $cells;

    /**
     * @var bool
     */
    protected $escape;

    /**
     * @param string[] $cells
     * @param array|null $attributes
     * @param bool $escape
     * @return TableRow
     */
    public function __invoke(array $cells, array $attributes = null, bool $escape = false): self
    {
        $this->cells = $cells;
        $this->attributes = $attributes;
        $this->escape = $escape;

        return clone $this;
    }

    /**
     * Render the templates helper.
     *
     * @return string
     */
    public function render(): string
    {
        $row = '<tr' . $this->htmlAttribs($this->attributes) . '>';

        foreach ($this->cells as $cell) {
            $row .= '<td>';

            if ($this->escape) {
                $escaper = $this->getView()->plugin('escapeHtml');
                $row .= $escaper($cell);
            } else {
                $row .= $cell;
            }

            $row .= '</td>';
        }

        $row .= '</tr>';

        return $row;
    }
}
