<?php

namespace ContaoThemesNet\ThemeOddBundle\Element;

class SliderElement extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_slider_element';

    /**
     * Display a wildcard in the back end
     *
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            /** @var \BackendTemplate|object $objTemplate */
            $objTemplate = new \BackendTemplate('be_wildcard');

            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->text = \StringUtil::toHtml5($this->text);

            return $objTemplate->parse();
        }

        return parent::generate();
    }

    /**
     * Generate the content element
     */
    protected function compile()
    {
        $this->Template->page = $this->odd_page;
        $this->Template->linkText = $this->odd_linkText;
        $this->Template->href = \FilesModel::findByUuid($this->singleSRC)->path;
        $this->Template->metaImg = unserialize(\FilesModel::findByUuid($this->singleSRC)->meta);
        $this->Template->picture = $this->singleSRC;
        $this->Template->subheadline = $this->odd_subHeadline;

        // overwrite link target
        $this->Template->target = '';
        $this->Template->rel = '';
        if ($this->target)
        {
            $this->Template->target = ' target="_blank"';
            $this->Template->rel = ' rel="noreferrer noopener"';
        }
    }
}