<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper;

/**
 * Alert
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class Alert extends AbstractColorableHelper
{
    /**
     * Content to display in the alert, may contain html
     * @var string
     */
    protected $content;

    /**
     * Attributes for the alert
     * @var array
     */
    protected $attributes = [
        'role' => 'alert',
    ];

    /**
     * Whether the alert should be dismissible
     * @var bool
     */
    protected $dismissible = false;

    /**
     * Retreive helper and set the alert content to display
     *
     * @param string $content Content to display, may contain html.
     * @param array|null $attribs Additional html attributes to add to the alert.
     * @return self
     */
    public function __invoke(string $content, array $attribs = null): self
    {
        $this->content = $content;
        if (null !== $attribs) {
            $this->attributes = array_merge($this->attributes, $attribs);
        }

        return $this;
    }

    /**
     * Render the alert.
     *
     * @return string
     */
    public function render(): string
    {
        $this->addCssClass('alert');

        $color = $this->getColor();
        $this->addCssClass($this->isStandardColor($color) ? 'alert-' . $color : $color);

        if ($this->isDismissible()) {
            $this->addCssClass('alert-dismissible fade show');
        }

        $alert = '<div' . $this->htmlAttribs($this->attributes) . '>';

        // @todo: filter links/headings and add appropriate class if missing
        $alert .= $this->content;

        if ($this->isDismissible()) {
            $alert .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                . '<span aria-hidden="true">&times;</span>'
                . '</button>';
        }

        $alert .= '</div>';

        return $alert;
    }

    /**
     * @return bool
     */
    public function isDismissible(): bool
    {
        return $this->dismissible;
    }

    /**
     * @param bool $dismissible
     * @return self
     */
    public function setDismissible(bool $dismissible): self
    {
        $this->dismissible = $dismissible;
        return $this;
    }
}
