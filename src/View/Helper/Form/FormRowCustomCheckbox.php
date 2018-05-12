<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Form;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormRow;

/**
 * FormRowCustomCheckbox
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
class FormRowCustomCheckbox extends FormRow
{
    /**
     * @var string
     */
    protected $inputErrorClass = 'is-invalid';

    /**
     * @var string
     */
    protected $partial = 'bootstrap::view/helper/form/form-row-custom-checkbox';

    /**
     * Render a form <input> element from the provided $element
     *
     * @param ElementInterface $element
     * @param null|string      $labelPosition
     *
     * @return string
     */
    public function render(ElementInterface $element, $labelPosition = null)
    {
        $element->setAttribute('class', $element->getAttribute('class') . 'custom-control-input');
        $element->setAttribute('id', $element->getAttribute('name'));

        $this->getElementErrorsHelper()
            ->setAttributes(['class' => 'list-unstyled alert alert-danger mt-2 mb-4']);

        return parent::render($element, $labelPosition);
    }
}
