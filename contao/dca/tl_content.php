<?php

/**
 * Add palette to tl_content
 */


$GLOBALS['TL_DCA']['tl_content']['palettes']['sliderElement'] = '{type_legend},type,headline,odd_subHeadline;{text_legend},text,odd_page,target,odd_linkText;{image_legend},addImage;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

/**
 * Add fields to tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['fields']['odd_page'] = [
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => [
        'mandatory' => false,
        'rgxp' => 'url',
        'decodeEntities' => true,
        'maxlength' => 255,
        'dcaPicker' => true,
        'addWizardClass' => false,
        'tl_class' => 'w50'],
    'sql' => "TEXT NULL"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['odd_linkText'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "TEXT NULL"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['target'] = [
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50 m12'],
    'sql' => "char(1) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['odd_subHeadline'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "TEXT NULL"
];
