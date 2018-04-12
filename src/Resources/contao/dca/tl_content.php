<?php

/**
 * Add palette to tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['wrapperStart'] = '{type_legend},type;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['wrapperStop'] = '{type_legend},type;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['featureElement'] = '{type_legend},type,headline;{text_legend},text,odd_featureIcon;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['sliderElement'] = '{type_legend},type,headline;{text_legend},text,odd_page,odd_linkText;{image_legend},addImage;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['odd_featureIcon'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['odd_featureIcon'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50 clr'),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['odd_featureIcon'],
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['odd_page'] = array
(
    'label' => & $GLOBALS['TL_LANG']['tl_content']['odd_page'],
    'exclude' => true,
    'inputType' => 'pageTree',
    'eval' => array (
        'fieldType' => 'radio',
        'tl_class'=>'w50 clr'
    ),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['odd_page'],
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['odd_linkText'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['odd_linkText'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['odd_linkText'],
    'sql' => "varchar(255) NOT NULL default ''"
);