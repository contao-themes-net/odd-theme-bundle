<?php

use Pdir\ThemeOddBundle\Element\WrapperStartElement;
use Pdir\ThemeOddBundle\Element\WrapperStopElement;
use Pdir\ThemeOddBundle\Element\FeatureElement;

// Insert the mate theme category
array_insert($GLOBALS['TL_CTE'], 1, array('themeOdd' => array()));

/**
 * Add content element
 */
$GLOBALS['TL_CTE']['themeOdd']['wrapperStart'] = WrapperStartElement::class;
$GLOBALS['TL_CTE']['themeOdd']['wrapperStop'] = WrapperStopElement::class;
$GLOBALS['TL_CTE']['themeOdd']['featureElement'] = FeatureElement::class;

/**
 * Wrapper elements
 */
$GLOBALS['TL_WRAPPERS']['start'][] = 'wrapperStart';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'wrapperStop';