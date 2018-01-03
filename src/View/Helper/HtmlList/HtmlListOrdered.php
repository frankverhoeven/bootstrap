<?php

namespace FrankVerhoeven\Bootstrap\View\Helper\HtmlList;

/**
 * HtmlListOrdered
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class HtmlListOrdered extends HtmlList
{
    /**
     * Type of list to render
     * @var string
     */
    protected $listType = self::LIST_TYPE_ORDERED;
}
