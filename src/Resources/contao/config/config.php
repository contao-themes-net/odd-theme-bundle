<?php

use Pdir\ThemeOddBundle\Element\WrapperStartElement;
use Pdir\ThemeOddBundle\Element\WrapperStopElement;
use Pdir\ThemeOddBundle\Element\FeatureElement;
use Pdir\ThemeOddBundle\Element\SliderElement;
use Pdir\ThemeOddBundle\Element\PriceBoxElement;

// Insert the mate theme category
array_insert($GLOBALS['TL_CTE'], 1, array('themeOdd' => array()));

/**
 * Add content element
 */
$GLOBALS['TL_CTE']['themeOdd']['wrapperStart'] = WrapperStartElement::class;
$GLOBALS['TL_CTE']['themeOdd']['wrapperStop'] = WrapperStopElement::class;
$GLOBALS['TL_CTE']['themeOdd']['featureElement'] = FeatureElement::class;
$GLOBALS['TL_CTE']['themeOdd']['sliderElement'] = SliderElement::class;
$GLOBALS['TL_CTE']['themeOdd']['priceBox'] = PriceBoxElement::class;

/**
 * Wrapper elements
 */
$GLOBALS['TL_WRAPPERS']['start'][] = 'wrapperStart';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'wrapperStop';

/**
 * Available tags for MATE theme
 */
$GLOBALS['tl_config']['theme_tags'] = array(
    '-',
    'ODD01/01',
    'ODD01/02',
    'ODD02/01',
    'ODD02/02',
    'ODD02/03',
    'ODD02/04',
    'ODD02/05'
);