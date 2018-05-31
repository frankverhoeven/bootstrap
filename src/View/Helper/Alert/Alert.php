<?php
declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Alert;

use BadMethodCallException;
use FrankVerhoeven\Bootstrap\View\Helper\AbstractHelper;

/**
 * Alert
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
 */
class Alert extends AbstractHelper
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
     * Current color
     * @var string
     */
    protected $color = 'primary';

    /**
     * Out of the box colors.
     * @var array
     */
    protected $standardColorMap = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark',
    ];

    /**
     * Retreive helper and set the alert content to display
     *
     * @param string $content Content to display, may contain html.
     * @param array|null $attribs Additional html attributes to add to the alert.
     * @return self
     */
    public function __invoke(string $content, array $attribs = null): AbstractHelper
    {
        $this->reset();

        $this->content = $content;
        if (null !== $attribs) {
            $this->attributes = array_merge($this->attributes, $attribs);
        }

        return clone $this;
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

    /**
     * Whether the provided color is a standard color.
     *
     * @param string $color
     * @return bool
     */
    public function isStandardColor(string $color): bool
    {
        return in_array($color, $this->standardColorMap);
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return self
     */
    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    /**
     * Allow helper methods to set standard colors.
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
        } catch (BadMethodCallException $e) {
            if (!$this->isStandardColor($name)) {
                throw new BadMethodCallException(sprintf('Undefined method "%s"', $name));
            }

            $this->color = $name;
        }

        return $this;
    }

    /**
     * Reset helper to defaults
     *
     * @return self
     */
    protected function reset(): AbstractHelper
    {
        $this->content = null;
        $this->attributes = ['role' => 'alert'];
        $this->dismissible = false;
        $this->color = 'primary';

        return $this;
    }
}
