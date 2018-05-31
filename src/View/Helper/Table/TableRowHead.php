<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Table;

/**
 * TableRowHead
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class TableRowHead extends TableRow
{
    /**
     * Render the templates helper.
     *
     * @return string
     */
    public function render(): string
    {
        $row = '<tr' . $this->htmlAttribs($this->attributes) . '>';

        foreach ($this->cells as $cell) {
            $row .= '<th scope="col">';

            if ($this->escape) {
                $escaper = $this->getView()->plugin('escapeHtml');
                $row .= $escaper($cell);
            } else {
                $row .= $cell;
            }

            $row .= '</th>';
        }

        $row .= '</tr>';

        return $row;
    }
}
