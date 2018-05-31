<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Table;

use FrankVerhoeven\Bootstrap\View\Helper\AbstractHelper;

/**
 * Table
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class Table extends AbstractHelper
{
    /**
     * @var bool
     */
    private $bordered = false;

    /**
     * @var bool
     */
    private $dark = false;

    /**
     * @var bool
     */
    private $hoverable = false;

    /**
     * @var TableRow[]
     */
    private $rows;

    /**
     * @var bool
     */
    private $small = false;

    /**
     * @var bool
     */
    private $striped = false;

    /**
     * @param TableRow[] $rows
     * @param array|null $attributes
     * @return Table
     */
    public function __invoke(array $rows, array $attributes = null): self
    {
        $this->rows = $rows;
        $this->attributes = $attributes;

        $this->addCssClass('table');

        return clone $this;
    }

    /**
     * @inheritdoc
     */
    public function render(): string
    {
        if ($this->isDark()) {
            $this->addCssClass('table-dark');
        }

        $table = '<table' . $this->htmlAttribs($this->attributes) . '>';

        $openBody = false;

        foreach ($this->rows as $row) {
            if ($row instanceof TableRowHead) {
                if ($openBody) {
                    $table .= '</tbody>';
                    $openBody = false;
                }

                $table .= '<thead>' . $row->render() . '</thead>';
            } else {
                if (!$openBody) {
                    $table .= '<tbody>';
                    $openBody = true;
                }

                $table .= $row->render();
            }
        }

        if ($openBody) {
            $table .= '</tbody>';
        }

        $table .= '</table>';

        return $table;
    }

    /**
     * @return bool
     */
    public function isBordered(): bool
    {
        return $this->bordered;
    }

    /**
     * @return Table
     */
    public function bordered(): self
    {
        $this->bordered = true;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDark(): bool
    {
        return $this->dark;
    }

    /**
     * @return Table
     */
    public function dark(): self
    {
        $this->dark = true;
        return $this;
    }

    /**
     * @return bool
     */
    public function isHoverable(): bool
    {
        return $this->hoverable;
    }

    /**
     * @return Table
     */
    public function hoverable(): self
    {
        $this->hoverable = true;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSmall(): bool
    {
        return $this->small;
    }

    public function small(): self
    {
        $this->small = true;
        return $this;
    }

    /**
     * @return bool
     */
    public function isStriped(): bool
    {
        return $this->striped;
    }

    /**
     * @return Table
     */
    public function striped(): self
    {
        $this->striped = true;
        return $this;
    }
}
