<?php

declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper;

use BadMethodCallException;
use Zend\View\Helper\AbstractHtmlElement;

/**
 * AbstractHelper
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 *
 * @method self m_0()
 * @method self m_1()
 * @method self m_2()
 * @method self m_3()
 * @method self m_4()
 * @method self m_5()
 * @method self mt_0()
 * @method self mt_1()
 * @method self mt_2()
 * @method self mt_3()
 * @method self mt_4()
 * @method self mt_5()
 * @method self mr_0()
 * @method self mr_1()
 * @method self mr_2()
 * @method self mr_3()
 * @method self mr_4()
 * @method self mr_5()
 * @method self mb_0()
 * @method self mb_1()
 * @method self mb_2()
 * @method self mb_3()
 * @method self mb_4()
 * @method self mb_5()
 * @method self ml_0()
 * @method self ml_1()
 * @method self ml_2()
 * @method self ml_3()
 * @method self ml_4()
 * @method self ml_5()
 * @method self mx_0()
 * @method self mx_1()
 * @method self mx_2()
 * @method self mx_3()
 * @method self mx_4()
 * @method self mx_5()
 * @method self my_0()
 * @method self my_1()
 * @method self my_2()
 * @method self my_3()
 * @method self my_4()
 * @method self my_5()
 * @method self m_sm_0()
 * @method self m_sm_1()
 * @method self m_sm_2()
 * @method self m_sm_3()
 * @method self m_sm_4()
 * @method self m_sm_5()
 * @method self mt_sm_0()
 * @method self mt_sm_1()
 * @method self mt_sm_2()
 * @method self mt_sm_3()
 * @method self mt_sm_4()
 * @method self mt_sm_5()
 * @method self mr_sm_0()
 * @method self mr_sm_1()
 * @method self mr_sm_2()
 * @method self mr_sm_3()
 * @method self mr_sm_4()
 * @method self mr_sm_5()
 * @method self mb_sm_0()
 * @method self mb_sm_1()
 * @method self mb_sm_2()
 * @method self mb_sm_3()
 * @method self mb_sm_4()
 * @method self mb_sm_5()
 * @method self ml_sm_0()
 * @method self ml_sm_1()
 * @method self ml_sm_2()
 * @method self ml_sm_3()
 * @method self ml_sm_4()
 * @method self ml_sm_5()
 * @method self mx_sm_0()
 * @method self mx_sm_1()
 * @method self mx_sm_2()
 * @method self mx_sm_3()
 * @method self mx_sm_4()
 * @method self mx_sm_5()
 * @method self my_sm_0()
 * @method self my_sm_1()
 * @method self my_sm_2()
 * @method self my_sm_3()
 * @method self my_sm_4()
 * @method self my_sm_5()
 * @method self m_md_0()
 * @method self m_md_1()
 * @method self m_md_2()
 * @method self m_md_3()
 * @method self m_md_4()
 * @method self m_md_5()
 * @method self mt_md_0()
 * @method self mt_md_1()
 * @method self mt_md_2()
 * @method self mt_md_3()
 * @method self mt_md_4()
 * @method self mt_md_5()
 * @method self mr_md_0()
 * @method self mr_md_1()
 * @method self mr_md_2()
 * @method self mr_md_3()
 * @method self mr_md_4()
 * @method self mr_md_5()
 * @method self mb_md_0()
 * @method self mb_md_1()
 * @method self mb_md_2()
 * @method self mb_md_3()
 * @method self mb_md_4()
 * @method self mb_md_5()
 * @method self ml_md_0()
 * @method self ml_md_1()
 * @method self ml_md_2()
 * @method self ml_md_3()
 * @method self ml_md_4()
 * @method self ml_md_5()
 * @method self mx_md_0()
 * @method self mx_md_1()
 * @method self mx_md_2()
 * @method self mx_md_3()
 * @method self mx_md_4()
 * @method self mx_md_5()
 * @method self my_md_0()
 * @method self my_md_1()
 * @method self my_md_2()
 * @method self my_md_3()
 * @method self my_md_4()
 * @method self my_md_5()
 * @method self m_lg_0()
 * @method self m_lg_1()
 * @method self m_lg_2()
 * @method self m_lg_3()
 * @method self m_lg_4()
 * @method self m_lg_5()
 * @method self mt_lg_0()
 * @method self mt_lg_1()
 * @method self mt_lg_2()
 * @method self mt_lg_3()
 * @method self mt_lg_4()
 * @method self mt_lg_5()
 * @method self mr_lg_0()
 * @method self mr_lg_1()
 * @method self mr_lg_2()
 * @method self mr_lg_3()
 * @method self mr_lg_4()
 * @method self mr_lg_5()
 * @method self mb_lg_0()
 * @method self mb_lg_1()
 * @method self mb_lg_2()
 * @method self mb_lg_3()
 * @method self mb_lg_4()
 * @method self mb_lg_5()
 * @method self ml_lg_0()
 * @method self ml_lg_1()
 * @method self ml_lg_2()
 * @method self ml_lg_3()
 * @method self ml_lg_4()
 * @method self ml_lg_5()
 * @method self mx_lg_0()
 * @method self mx_lg_1()
 * @method self mx_lg_2()
 * @method self mx_lg_3()
 * @method self mx_lg_4()
 * @method self mx_lg_5()
 * @method self my_lg_0()
 * @method self my_lg_1()
 * @method self my_lg_2()
 * @method self my_lg_3()
 * @method self my_lg_4()
 * @method self my_lg_5()
 * @method self m_xl_0()
 * @method self m_xl_1()
 * @method self m_xl_2()
 * @method self m_xl_3()
 * @method self m_xl_4()
 * @method self m_xl_5()
 * @method self mt_xl_0()
 * @method self mt_xl_1()
 * @method self mt_xl_2()
 * @method self mt_xl_3()
 * @method self mt_xl_4()
 * @method self mt_xl_5()
 * @method self mr_xl_0()
 * @method self mr_xl_1()
 * @method self mr_xl_2()
 * @method self mr_xl_3()
 * @method self mr_xl_4()
 * @method self mr_xl_5()
 * @method self mb_xl_0()
 * @method self mb_xl_1()
 * @method self mb_xl_2()
 * @method self mb_xl_3()
 * @method self mb_xl_4()
 * @method self mb_xl_5()
 * @method self ml_xl_0()
 * @method self ml_xl_1()
 * @method self ml_xl_2()
 * @method self ml_xl_3()
 * @method self ml_xl_4()
 * @method self ml_xl_5()
 * @method self mx_xl_0()
 * @method self mx_xl_1()
 * @method self mx_xl_2()
 * @method self mx_xl_3()
 * @method self mx_xl_4()
 * @method self mx_xl_5()
 * @method self my_xl_0()
 * @method self my_xl_1()
 * @method self my_xl_2()
 * @method self my_xl_3()
 * @method self my_xl_4()
 * @method self my_xl_5()
 * @method self mx_auto()
 *
 * @method self p_0()
 * @method self p_1()
 * @method self p_2()
 * @method self p_3()
 * @method self p_4()
 * @method self p_5()
 * @method self pt_0()
 * @method self pt_1()
 * @method self pt_2()
 * @method self pt_3()
 * @method self pt_4()
 * @method self pt_5()
 * @method self pr_0()
 * @method self pr_1()
 * @method self pr_2()
 * @method self pr_3()
 * @method self pr_4()
 * @method self pr_5()
 * @method self pb_0()
 * @method self pb_1()
 * @method self pb_2()
 * @method self pb_3()
 * @method self pb_4()
 * @method self pb_5()
 * @method self pl_0()
 * @method self pl_1()
 * @method self pl_2()
 * @method self pl_3()
 * @method self pl_4()
 * @method self pl_5()
 * @method self px_0()
 * @method self px_1()
 * @method self px_2()
 * @method self px_3()
 * @method self px_4()
 * @method self px_5()
 * @method self py_0()
 * @method self py_1()
 * @method self py_2()
 * @method self py_3()
 * @method self py_4()
 * @method self py_5()
 * @method self p_sm_0()
 * @method self p_sm_1()
 * @method self p_sm_2()
 * @method self p_sm_3()
 * @method self p_sm_4()
 * @method self p_sm_5()
 * @method self pt_sm_0()
 * @method self pt_sm_1()
 * @method self pt_sm_2()
 * @method self pt_sm_3()
 * @method self pt_sm_4()
 * @method self pt_sm_5()
 * @method self pr_sm_0()
 * @method self pr_sm_1()
 * @method self pr_sm_2()
 * @method self pr_sm_3()
 * @method self pr_sm_4()
 * @method self pr_sm_5()
 * @method self pb_sm_0()
 * @method self pb_sm_1()
 * @method self pb_sm_2()
 * @method self pb_sm_3()
 * @method self pb_sm_4()
 * @method self pb_sm_5()
 * @method self pl_sm_0()
 * @method self pl_sm_1()
 * @method self pl_sm_2()
 * @method self pl_sm_3()
 * @method self pl_sm_4()
 * @method self pl_sm_5()
 * @method self px_sm_0()
 * @method self px_sm_1()
 * @method self px_sm_2()
 * @method self px_sm_3()
 * @method self px_sm_4()
 * @method self px_sm_5()
 * @method self py_sm_0()
 * @method self py_sm_1()
 * @method self py_sm_2()
 * @method self py_sm_3()
 * @method self py_sm_4()
 * @method self py_sm_5()
 * @method self p_md_0()
 * @method self p_md_1()
 * @method self p_md_2()
 * @method self p_md_3()
 * @method self p_md_4()
 * @method self p_md_5()
 * @method self pt_md_0()
 * @method self pt_md_1()
 * @method self pt_md_2()
 * @method self pt_md_3()
 * @method self pt_md_4()
 * @method self pt_md_5()
 * @method self pr_md_0()
 * @method self pr_md_1()
 * @method self pr_md_2()
 * @method self pr_md_3()
 * @method self pr_md_4()
 * @method self pr_md_5()
 * @method self pb_md_0()
 * @method self pb_md_1()
 * @method self pb_md_2()
 * @method self pb_md_3()
 * @method self pb_md_4()
 * @method self pb_md_5()
 * @method self pl_md_0()
 * @method self pl_md_1()
 * @method self pl_md_2()
 * @method self pl_md_3()
 * @method self pl_md_4()
 * @method self pl_md_5()
 * @method self px_md_0()
 * @method self px_md_1()
 * @method self px_md_2()
 * @method self px_md_3()
 * @method self px_md_4()
 * @method self px_md_5()
 * @method self py_md_0()
 * @method self py_md_1()
 * @method self py_md_2()
 * @method self py_md_3()
 * @method self py_md_4()
 * @method self py_md_5()
 * @method self p_lg_0()
 * @method self p_lg_1()
 * @method self p_lg_2()
 * @method self p_lg_3()
 * @method self p_lg_4()
 * @method self p_lg_5()
 * @method self pt_lg_0()
 * @method self pt_lg_1()
 * @method self pt_lg_2()
 * @method self pt_lg_3()
 * @method self pt_lg_4()
 * @method self pt_lg_5()
 * @method self pr_lg_0()
 * @method self pr_lg_1()
 * @method self pr_lg_2()
 * @method self pr_lg_3()
 * @method self pr_lg_4()
 * @method self pr_lg_5()
 * @method self pb_lg_0()
 * @method self pb_lg_1()
 * @method self pb_lg_2()
 * @method self pb_lg_3()
 * @method self pb_lg_4()
 * @method self pb_lg_5()
 * @method self pl_lg_0()
 * @method self pl_lg_1()
 * @method self pl_lg_2()
 * @method self pl_lg_3()
 * @method self pl_lg_4()
 * @method self pl_lg_5()
 * @method self px_lg_0()
 * @method self px_lg_1()
 * @method self px_lg_2()
 * @method self px_lg_3()
 * @method self px_lg_4()
 * @method self px_lg_5()
 * @method self py_lg_0()
 * @method self py_lg_1()
 * @method self py_lg_2()
 * @method self py_lg_3()
 * @method self py_lg_4()
 * @method self py_lg_5()
 * @method self p_xl_0()
 * @method self p_xl_1()
 * @method self p_xl_2()
 * @method self p_xl_3()
 * @method self p_xl_4()
 * @method self p_xl_5()
 * @method self pt_xl_0()
 * @method self pt_xl_1()
 * @method self pt_xl_2()
 * @method self pt_xl_3()
 * @method self pt_xl_4()
 * @method self pt_xl_5()
 * @method self pr_xl_0()
 * @method self pr_xl_1()
 * @method self pr_xl_2()
 * @method self pr_xl_3()
 * @method self pr_xl_4()
 * @method self pr_xl_5()
 * @method self pb_xl_0()
 * @method self pb_xl_1()
 * @method self pb_xl_2()
 * @method self pb_xl_3()
 * @method self pb_xl_4()
 * @method self pb_xl_5()
 * @method self pl_xl_0()
 * @method self pl_xl_1()
 * @method self pl_xl_2()
 * @method self pl_xl_3()
 * @method self pl_xl_4()
 * @method self pl_xl_5()
 * @method self px_xl_0()
 * @method self px_xl_1()
 * @method self px_xl_2()
 * @method self px_xl_3()
 * @method self px_xl_4()
 * @method self px_xl_5()
 * @method self py_xl_0()
 * @method self py_xl_1()
 * @method self py_xl_2()
 * @method self py_xl_3()
 * @method self py_xl_4()
 * @method self py_xl_5()
 */
abstract class AbstractHelper extends AbstractHtmlElement
{
    /**
     * Attributes for the element
     * @var array
     */
    protected $attributes = [];

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }

    /**
     * Render the view helper.
     *
     * @return string
     */
    abstract public function render(): string;

    /**
     * Add css class(es) to the attributes stack.
     *
     * @param string $class Class(es) to add
     * @return self
     */
    public function addCssClass(string $class): self
    {
        $class = trim($class);
        if (empty($class)) {
            return $this;
        }

        if (!isset($this->attributes['class'])) {
            $this->attributes['class'] = $class;
        } else {
            $classesToAdd = explode(' ', $class);
            $currentClasses = explode(' ', $this->attributes['class']);

            foreach ($classesToAdd as $class) {
                if (!in_array($class, $currentClasses)) {
                    $currentClasses[] = $class;
                }
            }

            $this->attributes['class'] = implode(' ', $currentClasses);
        }

        return $this;
    }

    /**
     * Allow helper methods to set spacing.
     *  @link http://getbootstrap.com/docs/4.0/utilities/spacing/
     *  The dash should be replaced by an underscore on method call.
     *
     * @param string $name
     * @param array $arguments
     * @return self
     * @throws BadMethodCallException
     */
    public function __call(string $name, array $arguments): AbstractHelper
    {
        $parts = explode('_', $name);

        if (count($parts) > 3 || count($parts) < 2) {
            throw new BadMethodCallException(sprintf('Invalid method "%s"', $name));
        }

        if (3 == count($parts)) {
            $size = $parts[2];
            $breakpoint = $parts[1];
        } else {
            $size = $parts[1];
            $breakpoint = null;
        }

        if ('auto' != $size && !ctype_digit($size)) {
            throw new BadMethodCallException(sprintf('Invalid method "%s"', $name));
        }
        if (null !== $breakpoint && !in_array($breakpoint, ['sm', 'md', 'lg', 'xl'])) { // xs should be omitted
            throw new BadMethodCallException(sprintf('Invalid method "%s"', $name));
        }
        if (strlen($parts[0]) > 2) {
            throw new BadMethodCallException(sprintf('Invalid method "%s"', $name));
        }
        if (!in_array(substr($parts[0], 0, 1), ['p', 'm'])) {
            throw new BadMethodCallException(sprintf('Invalid method "%s"', $name));
        }
        if (2 == strlen($parts[0]) && !in_array(substr($parts[0], 1, 1), ['t', 'b', 'l', 'r', 'x', 'y'])) {
            throw new BadMethodCallException(sprintf('Invalid method "%s"', $name));
        }

        $class = str_replace('_', '-', $name);
        $this->addCssClass($class);

        return $this;
    }
}
