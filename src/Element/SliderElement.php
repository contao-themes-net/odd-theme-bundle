<?php

namespace ContaoThemesNet\ThemeOddBundle\Element;

use Contao\BackendTemplate;
use Contao\FilesModel;
use Contao\StringUtil;

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
            /** @var BackendTemplate|object $objTemplate */
            $objTemplate = new BackendTemplate('be_wildcard');

            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->text = StringUtil::toHtml5($this->text);

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
        $this->Template->picture = $this->singleSRC;
        $this->Template->subheadline = $this->odd_subHeadline;
        $this->Template->target = '';
        $this->Template->rel = '';

        if (null !== $this->singleSRC) {
            $objModel = FilesModel::findByUuid($this->singleSRC);

            if (null !== $objModel) {
                $this->Template->href = $objModel->path;
            }

            if (isset($objModel->meta)) {
                $this->Template->metaImg = unserialize(FilesModel::findByUuid($this->singleSRC)->meta);
            }
        }

        // overwrite link target
        if ($this->target)
        {
            $this->Template->target = ' target="_blank"';
            $this->Template->rel = ' rel="noreferrer noopener"';
        }
    }
}
