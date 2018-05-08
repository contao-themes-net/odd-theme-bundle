<?php

namespace Pdir\ThemeOddBundle\Element;

class TeaserBoxElement extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_teaserbox';

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

        $this->Template->page = $this->oddTeaserBox_page;
        $this->Template->picture = \FilesModel::findByUuid($this->singleSRC)->path;
        $this->Template->metaImg = unserialize(\FilesModel::findByUuid($this->singleSRC)->meta);
        $this->Template->pageText = $this->oddTeaserBox_pageText;
    }
}
