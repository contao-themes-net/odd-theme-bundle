<?php

namespace Pdir\ThemeOddBundle\Element;

class WrapperStartElement extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_wrapper_start';


    /**
     * Generate the content element
     */
    protected function compile()
    {
        if (TL_MODE == 'BE')
        {
            $this->strTemplate = 'be_wildcard';
            /** @var BackendTemplate|object $objTemplate */
            $objTemplate = new \BackendTemplate($this->strTemplate);
            $this->Template = $objTemplate;
            if($this->odd_name != "") $this->Template->wildcard = "### " . $this->odd_name. " ###";
        }
    }
}
