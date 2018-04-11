<?php

namespace Pdir\ThemeOddBundle\Element;

class FeatureElement extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_feature_element';

    /**
     * Generate the content element
     */
    protected function compile()
    {
        $this->Template->featureIcon = $this->odd_featureIcon;
    }
}
