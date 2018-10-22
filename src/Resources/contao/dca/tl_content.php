<?php

/**
 * Add palette to tl_content
 */


$GLOBALS['TL_DCA']['tl_content']['palettes']['sliderElement'] = '{type_legend},type,headline;{text_legend},text,odd_page,odd_linkText;{image_legend},addImage;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

/**
 * Add fields to tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['fields']['odd_page'] = array
(
    'label' => & $GLOBALS['TL_LANG']['tl_content']['odd_page'],
    'exclude' => true,
    'inputType' => 'pageTree',
    'eval' => array (
        'fieldType' => 'radio',
        'tl_class'=>'w50 clr'
    ),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['odd_linkText'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['odd_linkText'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'sql' => "varchar(255) NOT NULL default ''"
);