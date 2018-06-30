<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper\Form;

use Zend\Form\ElementInterface;
use Zend\Form\Exception\DomainException;
use Zend\Form\View\Helper\FormRow;

/**
 * FormRowCustomFileInput
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 */
final class FormRowCustomFileInput extends FormRow
{
    /**
     * @var string
     */
    protected $inputErrorClass = 'is-invalid';

    /**
     * @var string
     */
    protected $partial = 'bootstrap::view/helper/form/form-row-custom-file-input';

    /**
     * Utility form helper that renders a label (if it exists), an element and errors
     *
     * @param  ElementInterface $element
     * @param  null|string $labelPosition
     * @throws DomainException
     * @return string
     */
    public function render(ElementInterface $element, $labelPosition = null)
    {
        $element->setAttribute('class', $element->getAttribute('class') . ' custom-file-input');

        if (\method_exists($element, 'getLabelAttributes')
            && \method_exists($element, 'setLabelAttributes'))
        {
            $attributes = $element->getLabelAttributes();

            $attributes['class'] = isset($attributes['class']) ?
                $attributes['class'] . ' custom-file-label' :
                'custom-file-label';

            $element->setLabelAttributes($attributes);
        }

        $this->getElementErrorsHelper()
            ->setAttributes(['class' => 'list-unstyled alert alert-danger mt-2 mb-4']);

        return parent::render($element, $labelPosition);
    }
}
