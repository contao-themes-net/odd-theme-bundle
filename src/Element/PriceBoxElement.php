<?php

namespace Pdir\ThemeOddBundle\Element;

class PriceBoxElement extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_price_box';

    /**
     * Generate the content element
     */
    protected function compile()
    {
        if (TL_MODE == 'BE')
        {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new \BackendTemplate($this->strTemplate);
            $this->Template->wildcard = "### ".$this->headline." ###";
            $this->Template->text = \StringUtil::toHtml5($this->text);
        }

        if($this->odd_priceBox_customTpl != "") {
            $this->Template->setName($this->odd_priceBox_customTpl);
        }

        $this->Template->price = $this->odd_price;
        $this->Template->priceLabel = $this->odd_priceLabel;
        $this->Template->link1 = $this->odd_priceBox_link1;
        $this->Template->link2 = $this->odd_priceBox_link2;
        $this->Template->linkText1 = $this->odd_priceBox_linkText1;
        $this->Template->linkText2 = $this->odd_priceBox_linkText2;
        $this->Template->popularBox = $this->odd_popularPriceBox;
    }
}
