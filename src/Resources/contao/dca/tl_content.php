<?php

/**
 * Add palette to tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['wrapperStart'] = '{type_legend},type;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['wrapperStop'] = '{type_legend},type;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['featureElement'] = '{type_legend},type,headline;{text_legend},text,odd_featureIcon;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

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