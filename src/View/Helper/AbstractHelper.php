<?php
declare(strict_types=1);

namespace FrankVerhoeven\Bootstrap\View\Helper;

use BadMethodCallException;
use FrankVerhoeven\Bootstrap\View\Helper\Utility\AbstractUtility;
use FrankVerhoeven\Bootstrap\View\Helper\Utility\Floating;
use FrankVerhoeven\Bootstrap\View\Helper\Utility\Spacing;
use FrankVerhoeven\Bootstrap\View\Helper\Utility\Text;
use InvalidArgumentException;
use Zend\View\Helper\AbstractHtmlElement;

/**
 * AbstractHelper
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 *
 * @method self floatLeft()
 * @method self floatSmLeft()
 * @method self floatMdLeft()
 * @method self floatLgLeft()
 * @method self floatXlLeft()
 * @method self floatRight()
 * @method self floatSmRight()
 * @method self floatMdRight()
 * @method self floatLgRight()
 * @method self floatXlRight()
 * @method self floatNone()
 * @method self floatSmNone()
 * @method self floatMdNone()
 * @method self floatLgNone()
 * @method self floatXlNone()
 *
 * @method self m0()
 * @method self m1()
 * @method self m2()
 * @method self m3()
 * @method self m4()
 * @method self m5()
 * @method self mSm0()
 * @method self mSm1()
 * @method self mSm2()
 * @method self mSm3()
 * @method self mSm4()
 * @method self mSm5()
 * @method self mMd0()
 * @method self mMd1()
 * @method self mMd2()
 * @method self mMd3()
 * @method self mMd4()
 * @method self mMd5()
 * @method self mLg0()
 * @method self mLg1()
 * @method self mLg2()
 * @method self mLg3()
 * @method self mLg4()
 * @method self mLg5()
 * @method self mXl0()
 * @method self mXl1()
 * @method self mXl2()
 * @method self mXl3()
 * @method self mXl4()
 * @method self mXl5()
 * @method self mb0()
 * @method self mb1()
 * @method self mb2()
 * @method self mb3()
 * @method self mb4()
 * @method self mb5()
 * @method self mbSm0()
 * @method self mbSm1()
 * @method self mbSm2()
 * @method self mbSm3()
 * @method self mbSm4()
 * @method self mbSm5()
 * @method self mbMd0()
 * @method self mbMd1()
 * @method self mbMd2()
 * @method self mbMd3()
 * @method self mbMd4()
 * @method self mbMd5()
 * @method self mbLg0()
 * @method self mbLg1()
 * @method self mbLg2()
 * @method self mbLg3()
 * @method self mbLg4()
 * @method self mbLg5()
 * @method self mbXl0()
 * @method self mbXl1()
 * @method self mbXl2()
 * @method self mbXl3()
 * @method self mbXl4()
 * @method self mbXl5()
 * @method self ml0()
 * @method self ml1()
 * @method self ml2()
 * @method self ml3()
 * @method self ml4()
 * @method self ml5()
 * @method self mlSm0()
 * @method self mlSm1()
 * @method self mlSm2()
 * @method self mlSm3()
 * @method self mlSm4()
 * @method self mlSm5()
 * @method self mlMd0()
 * @method self mlMd1()
 * @method self mlMd2()
 * @method self mlMd3()
 * @method self mlMd4()
 * @method self mlMd5()
 * @method self mlLg0()
 * @method self mlLg1()
 * @method self mlLg2()
 * @method self mlLg3()
 * @method self mlLg4()
 * @method self mlLg5()
 * @method self mlXl0()
 * @method self mlXl1()
 * @method self mlXl2()
 * @method self mlXl3()
 * @method self mlXl4()
 * @method self mlXl5()
 * @method self mr0()
 * @method self mr1()
 * @method self mr2()
 * @method self mr3()
 * @method self mr4()
 * @method self mr5()
 * @method self mrSm0()
 * @method self mrSm1()
 * @method self mrSm2()
 * @method self mrSm3()
 * @method self mrSm4()
 * @method self mrSm5()
 * @method self mrMd0()
 * @method self mrMd1()
 * @method self mrMd2()
 * @method self mrMd3()
 * @method self mrMd4()
 * @method self mrMd5()
 * @method self mrLg0()
 * @method self mrLg1()
 * @method self mrLg2()
 * @method self mrLg3()
 * @method self mrLg4()
 * @method self mrLg5()
 * @method self mrXl0()
 * @method self mrXl1()
 * @method self mrXl2()
 * @method self mrXl3()
 * @method self mrXl4()
 * @method self mrXl5()
 * @method self mt0()
 * @method self mt1()
 * @method self mt2()
 * @method self mt3()
 * @method self mt4()
 * @method self mt5()
 * @method self mtSm0()
 * @method self mtSm1()
 * @method self mtSm2()
 * @method self mtSm3()
 * @method self mtSm4()
 * @method self mtSm5()
 * @method self mtMd0()
 * @method self mtMd1()
 * @method self mtMd2()
 * @method self mtMd3()
 * @method self mtMd4()
 * @method self mtMd5()
 * @method self mtLg0()
 * @method self mtLg1()
 * @method self mtLg2()
 * @method self mtLg3()
 * @method self mtLg4()
 * @method self mtLg5()
 * @method self mtXl0()
 * @method self mtXl1()
 * @method self mtXl2()
 * @method self mtXl3()
 * @method self mtXl4()
 * @method self mtXl5()
 * @method self mx0()
 * @method self mx1()
 * @method self mx2()
 * @method self mx3()
 * @method self mx4()
 * @method self mx5()
 * @method self mxSm0()
 * @method self mxSm1()
 * @method self mxSm2()
 * @method self mxSm3()
 * @method self mxSm4()
 * @method self mxSm5()
 * @method self mxMd0()
 * @method self mxMd1()
 * @method self mxMd2()
 * @method self mxMd3()
 * @method self mxMd4()
 * @method self mxMd5()
 * @method self mxLg0()
 * @method self mxLg1()
 * @method self mxLg2()
 * @method self mxLg3()
 * @method self mxLg4()
 * @method self mxLg5()
 * @method self mxXl0()
 * @method self mxXl1()
 * @method self mxXl2()
 * @method self mxXl3()
 * @method self mxXl4()
 * @method self mxXl5()
 * @method self mxAuto()
 * @method self my0()
 * @method self my1()
 * @method self my2()
 * @method self my3()
 * @method self my4()
 * @method self my5()
 * @method self mySm0()
 * @method self mySm1()
 * @method self mySm2()
 * @method self mySm3()
 * @method self mySm4()
 * @method self mySm5()
 * @method self myMd1()
 * @method self myMd2()
 * @method self myMd3()
 * @method self myMd4()
 * @method self myMd5()
 * @method self myLg0()
 * @method self myLg1()
 * @method self myLg2()
 * @method self myLg3()
 * @method self myLg4()
 * @method self myLg5()
 * @method self myMd0()
 * @method self myXl0()
 * @method self myXl1()
 * @method self myXl2()
 * @method self myXl3()
 * @method self myXl4()
 * @method self myXl5()
 * @method self p0()
 * @method self p1()
 * @method self p2()
 * @method self p3()
 * @method self p4()
 * @method self p5()
 * @method self pSm0()
 * @method self pSm1()
 * @method self pSm2()
 * @method self pSm3()
 * @method self pSm4()
 * @method self pSm5()
 * @method self pMd0()
 * @method self pMd1()
 * @method self pMd2()
 * @method self pMd3()
 * @method self pMd4()
 * @method self pMd5()
 * @method self pLg0()
 * @method self pLg1()
 * @method self pLg2()
 * @method self pLg3()
 * @method self pLg4()
 * @method self pLg5()
 * @method self pXl0()
 * @method self pXl1()
 * @method self pXl2()
 * @method self pXl3()
 * @method self pXl4()
 * @method self pXl5()
 * @method self pb0()
 * @method self pb1()
 * @method self pb2()
 * @method self pb3()
 * @method self pb4()
 * @method self pb5()
 * @method self pbSm0()
 * @method self pbSm1()
 * @method self pbSm2()
 * @method self pbSm3()
 * @method self pbSm4()
 * @method self pbSm5()
 * @method self pbMd0()
 * @method self pbMd1()
 * @method self pbMd2()
 * @method self pbMd3()
 * @method self pbMd4()
 * @method self pbMd5()
 * @method self pbLg0()
 * @method self pbLg1()
 * @method self pbLg2()
 * @method self pbLg3()
 * @method self pbLg4()
 * @method self pbLg5()
 * @method self pbXl0()
 * @method self pbXl1()
 * @method self pbXl2()
 * @method self pbXl3()
 * @method self pbXl4()
 * @method self pbXl5()
 * @method self pl0()
 * @method self pl1()
 * @method self pl2()
 * @method self pl3()
 * @method self pl4()
 * @method self pl5()
 * @method self plSm0()
 * @method self plSm1()
 * @method self plSm2()
 * @method self plSm3()
 * @method self plSm4()
 * @method self plSm5()
 * @method self plMd0()
 * @method self plMd1()
 * @method self plMd2()
 * @method self plMd3()
 * @method self plMd4()
 * @method self plMd5()
 * @method self plLg0()
 * @method self plLg1()
 * @method self plLg2()
 * @method self plLg3()
 * @method self plLg4()
 * @method self plLg5()
 * @method self plXl0()
 * @method self plXl1()
 * @method self plXl2()
 * @method self plXl3()
 * @method self plXl4()
 * @method self plXl5()
 * @method self pr0()
 * @method self pr1()
 * @method self pr2()
 * @method self pr3()
 * @method self pr4()
 * @method self pr5()
 * @method self prSm0()
 * @method self prSm1()
 * @method self prSm2()
 * @method self prSm3()
 * @method self prSm4()
 * @method self prSm5()
 * @method self prMd0()
 * @method self prMd1()
 * @method self prMd2()
 * @method self prMd3()
 * @method self prMd4()
 * @method self prMd5()
 * @method self prLg0()
 * @method self prLg1()
 * @method self prLg2()
 * @method self prLg3()
 * @method self prLg4()
 * @method self prLg5()
 * @method self prXl0()
 * @method self prXl1()
 * @method self prXl2()
 * @method self prXl3()
 * @method self prXl4()
 * @method self prXl5()
 * @method self pt0()
 * @method self pt1()
 * @method self pt2()
 * @method self pt3()
 * @method self pt4()
 * @method self pt5()
 * @method self ptSm0()
 * @method self ptSm1()
 * @method self ptSm2()
 * @method self ptSm3()
 * @method self ptSm4()
 * @method self ptSm5()
 * @method self ptMd0()
 * @method self ptMd1()
 * @method self ptMd2()
 * @method self ptMd3()
 * @method self ptMd4()
 * @method self ptMd5()
 * @method self ptLg0()
 * @method self ptLg1()
 * @method self ptLg2()
 * @method self ptLg3()
 * @method self ptLg4()
 * @method self ptLg5()
 * @method self ptXl0()
 * @method self ptXl1()
 * @method self ptXl2()
 * @method self ptXl3()
 * @method self ptXl4()
 * @method self ptXl5()
 * @method self px0()
 * @method self px1()
 * @method self px2()
 * @method self px3()
 * @method self px4()
 * @method self px5()
 * @method self pxSm0()
 * @method self pxSm1()
 * @method self pxSm2()
 * @method self pxSm3()
 * @method self pxSm4()
 * @method self pxSm5()
 * @method self pxMd0()
 * @method self pxMd1()
 * @method self pxMd2()
 * @method self pxMd3()
 * @method self pxMd4()
 * @method self pxMd5()
 * @method self pxLg0()
 * @method self pxLg1()
 * @method self pxLg2()
 * @method self pxLg3()
 * @method self pxLg4()
 * @method self pxLg5()
 * @method self pxXl0()
 * @method self pxXl1()
 * @method self pxXl2()
 * @method self pxXl3()
 * @method self pxXl4()
 * @method self pxXl5()
 * @method self py0()
 * @method self py1()
 * @method self py2()
 * @method self py3()
 * @method self py4()
 * @method self py5()
 * @method self pySm0()
 * @method self pySm1()
 * @method self pySm2()
 * @method self pySm3()
 * @method self pySm4()
 * @method self pySm5()
 * @method self pyMd0()
 * @method self pyMd1()
 * @method self pyMd2()
 * @method self pyMd3()
 * @method self pyMd4()
 * @method self pyMd5()
 * @method self pyLg0()
 * @method self pyLg1()
 * @method self pyLg2()
 * @method self pyLg3()
 * @method self pyLg4()
 * @method self pyLg5()
 * @method self pyXl0()
 * @method self pyXl1()
 * @method self pyXl2()
 * @method self pyXl3()
 * @method self pyXl4()
 * @method self pyXl5()
 *
 * @method self fontWeightBold()
 * @method self fontWeightNormal()
 * @method self fontWeightLight()
 * @method self fontItalic()
 * @method self textLeft()
 * @method self textSmLeft()
 * @method self textMdLeft()
 * @method self textLgLeft()
 * @method self textXlLeft()
 * @method self textCenter()
 * @method self textSmCenter()
 * @method self textMdCenter()
 * @method self textLgCenter()
 * @method self textXlCenter()
 * @method self textRight()
 * @method self textSmRight()
 * @method self textMdRight()
 * @method self textLgRight()
 * @method self textXlRight()
 * @method self textJustify()
 * @method self textNowrap()
 * @method self textTruncate()
 * @method self textLowercase()
 * @method self textUppercase()
 * @method self textCapitalize()
 * @method self textPrimary()
 * @method self textSecondary()
 * @method self textSuccess()
 * @method self textDanger()
 * @method self textWarning()
 * @method self textInfo()
 * @method self textLight()
 * @method self textDark()
 * @method self textMuted()
 * @method self textWhite()
 */
abstract class AbstractHelper extends AbstractHtmlElement
{
    /**
     * Attributes for the element
     * @var array
     */
    protected $attributes = [];

    /**
     * Available utility methods
     * @var array
     */
    protected static $availableUtilities;

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }

    /**
     * Render the templates helper.
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
            $this->attributes['class'] = '';
        }

        $classesToAdd = explode(' ', $class);
        $currentClasses = explode(' ', $this->attributes['class']);

        foreach ($classesToAdd as $class) {
            if (!in_array($class, $currentClasses)) {
                $currentClasses[] = $class;
            }
        }

        $this->attributes['class'] = trim(implode(' ', $currentClasses));
        return $this;
    }

    /**
     * Add helper methods for various formatting classes.
     *
     * @param string $name
     * @param array $arguments
     * @return self
     * @throws BadMethodCallException
     */
    public function __call(string $name, array $arguments): AbstractHelper
    {
        $this->setupUtilities();

        /* @var AbstractUtility $utility */
        foreach (self::$availableUtilities as $utility) {
            try {
                $class = $utility->process($name);
                $this->addCssClass($class);
                return $this;
            } catch (InvalidArgumentException $e) {}
        }

        throw new BadMethodCallException('Invalid method [' . $name . ']', 0, isset($e) ? $e : null);
    }

    /**
     * Setup available utilities
     *
     * @return self
     */
    protected function setupUtilities(): AbstractHelper
    {
        if (null === self::$availableUtilities) {
            self::$availableUtilities = [
                new Spacing(),
                new Text(),
                new Floating(),
            ];
        }

        return $this;
    }
}
