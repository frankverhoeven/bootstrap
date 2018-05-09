<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\Form\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormRow as ZendFormRow;

/**
 * FormRow
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class FormRow extends ZendFormRow
{
    /**
     * @var string
     */
    protected $inputErrorClass = 'is-invalid';
    /**
     * @var string
     */
    protected $partial = 'bootstrap::form/view/helper/form-row';

    /**
     * Utility form helper that renders a label (if it exists), an element and errors
     *
     * @param  ElementInterface $element
     * @param  null|string      $labelPosition
     * @throws \Zend\Form\Exception\DomainException
     * @return string
     */
    public function render(ElementInterface $element, $labelPosition = null)
    {
        $element->setAttribute('class', $element->getAttribute('class') . ' form-control');

        $this->getElementErrorsHelper()
            ->setAttributes(['class' => 'list-unstyled alert alert-danger mt-2 mb-4']);

        return parent::render($element, $labelPosition);
    }
}
