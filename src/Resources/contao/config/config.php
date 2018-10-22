<?php

use Pdir\ThemeOddBundle\Element\SliderElement;

// Insert the mate theme category
array_insert($GLOBALS['TL_CTE'], 1, array('themeOdd' => array()));

/**
 * Add content element
 */
$GLOBALS['TL_CTE']['themeOdd']['sliderElement'] = SliderElement::class;

/**
 * If Contao Slick is used
 */
$GLOBALS['TL_JAVASCRIPT']['google_charts_loader'] = '';
$GLOBALS['TL_JAVASCRIPT']['google_charts'] = '';

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