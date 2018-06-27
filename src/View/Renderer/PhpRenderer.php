<?php

namespace FrankVerhoeven\Bootstrap\View\Renderer;

use DateTime;
use FrankVerhoeven\Bootstrap\View\Helper\Alert\Alert;
use FrankVerhoeven\Bootstrap\View\Helper\Alert\AlertDismissible;
use FrankVerhoeven\Bootstrap\View\Helper\Button\Button;
use FrankVerhoeven\Bootstrap\View\Helper\Button\ButtonAnchor;
use FrankVerhoeven\Bootstrap\View\Helper\Button\ButtonAnchorLarge;
use FrankVerhoeven\Bootstrap\View\Helper\Button\ButtonAnchorSmall;
use FrankVerhoeven\Bootstrap\View\Helper\Button\ButtonLarge;
use FrankVerhoeven\Bootstrap\View\Helper\Button\ButtonSmall;
use FrankVerhoeven\Bootstrap\View\Helper\Form\FormRowCustomCheckbox;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlList;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlListInline;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlListOrdered;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlListUnordered;
use FrankVerhoeven\Bootstrap\View\Helper\HtmlList\HtmlListUnstyled;
use FrankVerhoeven\Bootstrap\View\Helper\Table\Table;
use FrankVerhoeven\Bootstrap\View\Helper\Table\TableRow;
use FrankVerhoeven\Bootstrap\View\Helper\Table\TableRowHead;
use IntlDateFormatter;
use Zend\Form\ElementInterface;
use Zend\Form\FormInterface;
use Zend\Form\View\Helper\Captcha\Dumb;
use Zend\Form\View\Helper\Captcha\Figlet;
use Zend\Form\View\Helper\Captcha\Image;
use Zend\Form\View\Helper\Captcha\ReCaptcha;
use Zend\Form\View\Helper\File\FormFileApcProgress;
use Zend\Form\View\Helper\File\FormFileSessionProgress;
use Zend\Form\View\Helper\File\FormFileUploadProgress;
use Zend\Form\View\Helper\Form;
use Zend\Form\View\Helper\FormButton;
use Zend\Form\View\Helper\FormCaptcha;
use Zend\Form\View\Helper\FormCheckbox;
use Zend\Form\View\Helper\FormCollection;
use Zend\Form\View\Helper\FormColor;
use Zend\Form\View\Helper\FormDate;
use Zend\Form\View\Helper\FormDateSelect;
use Zend\Form\View\Helper\FormDateTime;
use Zend\Form\View\Helper\FormDateTimeLocal;
use Zend\Form\View\Helper\FormDateTimeSelect;
use Zend\Form\View\Helper\FormElement;
use Zend\Form\View\Helper\FormElementErrors;
use Zend\Form\View\Helper\FormEmail;
use Zend\Form\View\Helper\FormFile;
use Zend\Form\View\Helper\FormHidden;
use Zend\Form\View\Helper\FormImage;
use Zend\Form\View\Helper\FormInput;
use Zend\Form\View\Helper\FormLabel;
use Zend\Form\View\Helper\FormMonth;
use Zend\Form\View\Helper\FormMonthSelect;
use Zend\Form\View\Helper\FormMultiCheckbox;
use Zend\Form\View\Helper\FormNumber;
use Zend\Form\View\Helper\FormPassword;
use Zend\Form\View\Helper\FormRadio;
use Zend\Form\View\Helper\FormRange;
use Zend\Form\View\Helper\FormReset;
use Zend\Form\View\Helper\FormRow;
use Zend\Form\View\Helper\FormSearch;
use Zend\Form\View\Helper\FormSelect;
use Zend\Form\View\Helper\FormSubmit;
use Zend\Form\View\Helper\FormTel;
use Zend\Form\View\Helper\FormText;
use Zend\Form\View\Helper\FormTextarea;
use Zend\Form\View\Helper\FormTime;
use Zend\Form\View\Helper\FormUrl;
use Zend\Form\View\Helper\FormWeek;
use Zend\View\Renderer\PhpRenderer as ZendPhpRenderer;

/**
 * PhpRenderer
 *
 * Allow code completion of templates helpers.
 *
 * @author Frank Verhoeven <hi@frankverhoeven.me>
 *
 * @method string currencyFormat(float $number, string $currencyCode = null, bool $showDecimals = null, string $locale = null, string $pattern = null)
 * @method string dateFormat(DateTime|int|array $date, int $dateType = IntlDateFormatter::NONE, int $timeType = IntlDateFormatter::NONE, string $locale = null, string $pattern = null)
 * @method string numberFormat(int|float $number, int $formatStyle = null, int $formatType = null, string $locale = null, int $decimals = null, array|null $textAttributes = null)
 * @method string plural(array|string $strings, int $number)
 * @method string translate(string $message, string $textDomain = null, string $locale = null)
 * @method string translatePlural(string $singular, string $plural, int $number, string $textDomain = null, string $locale = null)
 *
 * @method string|Form form(FormInterface $form = null)
 * @method string|FormButton formButton(ElementInterface $element = null, string $buttonContent = null)
 * @method string|FormCaptcha formCaptcha(ElementInterface $element = null)
 * @method string|Dumb formCaptchaDumb(ElementInterface $element = null)
 * @method string|Figlet formCaptchaFiglet(ElementInterface $element = null)
 * @method string|Image formCaptchaImage(ElementInterface $element = null)
 * @method string|Recaptcha formCaptchaRecaptcha(ElementInterface $element = null)
 * @method string|FormCheckbox formCheckbox(ElementInterface $element = null)
 * @method string|FormCollection formCollection(ElementInterface $element = null, bool $wrap = true)
 * @method string|FormColor formColor(ElementInterface $element = null)
 * @method string|FormDate formDate(ElementInterface $element = null)
 * @method string|FormDateSelect formDateSelect(ElementInterface $element = null, int $dateType = IntlDateFormatter::LONG, string $locale = null)
 * @method string|FormDateTime formDateTime(ElementInterface $element = null)
 * @method string|FormDateTimeLocal formDateTimeLocal(ElementInterface $element = null)
 * @method string|FormDateTimeSelect formDateTimeSelect(ElementInterface $element = null, int $dateType = IntlDateFormatter::LONG, int $timeType = IntlDateFormatter::LONG, string $locale = null)
 * @method string|FormElement formElement(ElementInterface $element = null)
 * @method string|FormElementErrors formElementErrors(ElementInterface $element = null, array $attributes = [])
 * @method string|FormEmail formEmail(ElementInterface $element = null)
 * @method string|FormFile formFile(ElementInterface $element = null)
 * @method string|FormFileApcProgress formFileApcProgress(ElementInterface $element = null)
 * @method string|FormFileSessionProgress formFileSessionProgress(ElementInterface $element = null)
 * @method string|FormFileUploadProgress formFileUploadProgress(ElementInterface $element = null)
 * @method string|FormHidden formHidden(ElementInterface $element = null)
 * @method string|FormImage formImage(ElementInterface $element = null)
 * @method string|FormInput formInput(ElementInterface $element = null)
 * @method string|FormLabel formLabel(ElementInterface $element = null, string $labelContent = null, string $position = null)
 * @method string|FormMonth formMonth(ElementInterface $element = null)
 * @method string|FormMonthSelect formMonthSelect(ElementInterface $element = null, int $dateType = IntlDateFormatter::LONG, string $locale = null)
 * @method string|FormMultiCheckbox formMultiCheckbox(ElementInterface $element = null, string $labelPosition = null)
 * @method string|FormNumber formNumber(ElementInterface $element = null)
 * @method string|FormPassword formPassword(ElementInterface $element = null)
 * @method string|FormRadio formRadio(ElementInterface $element = null, string $labelPosition = null)
 * @method string|FormRange formRange(ElementInterface $element = null)
 * @method string|FormReset formReset(ElementInterface $element = null)
 * @method string|FormRow formRow(ElementInterface $element = null, string $labelPosition = null, bool $renderErrors = null, string $partial = null)
 * @method string|FormSearch formSearch(ElementInterface $element = null)
 * @method string|FormSelect formSelect(ElementInterface $element = null)
 * @method string|FormSubmit formSubmit(ElementInterface $element = null)
 * @method string|FormTel formTel(ElementInterface $element = null)
 * @method string|FormText formText(ElementInterface $element = null)
 * @method string|FormTextArea formTextArea(ElementInterface $element = null)
 * @method string|FormTime formTime(ElementInterface $element = null)
 * @method string|FormUrl formUrl(ElementInterface $element = null)
 * @method string|FormWeek formWeek(ElementInterface $element = null)
 *
 * @method Alert bsAlert(string $content, array $attributes = null)
 * @method AlertDismissible bsAlertDismissible(string $content, array $attributes = null)
 * @method Button bsButton(string|ElementInterface $content, array $attributes = null)
 * @method ButtonSmall bsButtonSmall(string|ElementInterface $content, array $attributes = null)
 * @method ButtonLarge bsButtonLarge(string|ElementInterface $content, array $attributes = null)
 * @method ButtonAnchor bsButtonAnchor(string|ElementInterface $content, array $attributes = null)
 * @method ButtonAnchorSmall bsButtonAnchorSmall(string|ElementInterface $content, array $attributes = null)
 * @method ButtonAnchorLarge bsButtonAnchorLarge(string|ElementInterface $content, array $attributes = null)
 * @method string|FormRowCustomCheckbox bsFormRowCustomCheckbox(ElementInterface $element = null)
 * @method HtmlList bsList(array $items, array $attributes = null, bool $escape = false)
 * @method HtmlListInline bsListInline(array $items, array $attributes = null, bool $escape = false)
 * @method HtmlListOrdered bsListOrdered(array $items, array $attributes = null, bool $escape = false)
 * @method HtmlListUnordered bsListUnordered(array $items, array $attributes = null, bool $escape = false)
 * @method HtmlListUnstyled bsListUnstyled(array $items, array $attributes = null, bool $escape = false)
 * @method Table bsTable(array $rows, array $attributes = null)
 * @method TableRow bsTableRow(array $cells, array $attributes = null, bool $escape = false)
 * @method TableRowHead bsTableRowHead(array $cells, array $attributes = null, bool $escape = false)
 */
class PhpRenderer extends ZendPhpRenderer
{}
