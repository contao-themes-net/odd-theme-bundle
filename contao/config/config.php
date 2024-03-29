<?php

use Contao\ArrayUtil;
use ContaoThemesNet\OddThemeBundle\Element\SliderElement;

// Insert the mate theme category
ArrayUtil::arrayInsert($GLOBALS['TL_CTE'], 1, array('themeOdd' => array()));

/**
 * Add content element
 */
$GLOBALS['TL_CTE']['themeOdd']['sliderElement'] = SliderElement::class;

/**
 * If Contao Slick is used
 */
unset($GLOBALS['TL_JAVASCRIPT']['google_charts_loader']);
unset($GLOBALS['TL_JAVASCRIPT']['google_charts']);

/**
 * Available tags for MATE theme
 */
if (empty($GLOBALS['tl_config']['theme_tags'])) {
    $GLOBALS['tl_config']['theme_tags'] = [];
    $GLOBALS['tl_config']['theme_tags'][] = '-';
}

if (!empty($GLOBALS['tl_config']['theme_tags']) && \is_array($GLOBALS['tl_config']['theme_tags'])) {
    $GLOBALS['tl_config']['theme_tags'] = array_merge($GLOBALS['tl_config']['theme_tags'], [
        'ODD01/01',
        'ODD01/02',
        'ODD02/01',
        'ODD02/02',
        'ODD02/03',
        'ODD02/04',
        'ODD02/05',
    ]);
}

/**
 * Backend Modules
 */
ArrayUtil::arrayInsert($GLOBALS['BE_MOD']['contaoThemesNet'], 1, array
(
    'oddThemeSetup' => array
    (
        'callback'          => 'ContaoThemesNet\\OddThemeBundle\\Module\\OddThemeSetup',
        'tables'            => array(),
        'stylesheet'		=> 'bundles/contaothemesnetoddtheme/scss/backend.css'
    ),
));
