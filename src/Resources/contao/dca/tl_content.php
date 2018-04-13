<?php

/**
 * Add palette to tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['wrapperStart'] = '{type_legend},type,odd_name;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['wrapperStop'] = '{type_legend},type;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['featureElement'] = '{type_legend},type,headline;{text_legend},text,odd_featureIcon;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['sliderElement'] = '{type_legend},type,headline;{text_legend},text,odd_page,odd_linkText;{image_legend},addImage;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['priceBox'] = '{type_legend},type,headline;{text_legend},text,odd_price,odd_priceLabel,odd_priceBox_link1,odd_priceBox_linkText1,odd_priceBox_link2,odd_priceBox_linkText2,odd_popularPriceBox;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

/**
 * Add fields to tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['fields']['odd_featureIcon'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['odd_featureIcon'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50 clr'),
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

$GLOBALS['TL_DCA']['tl_content']['fields']['odd_name'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['odd_name'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['odd_price'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['odd_price'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50 clr'),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['odd_priceLabel'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['odd_priceLabel'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['odd_priceBox_link1'] = array
(
    'label' => & $GLOBALS['TL_LANG']['tl_content']['odd_priceBox_link1'],
    'exclude' => true,
    'inputType' => 'pageTree',
    'eval' => array (
        'fieldType' => 'radio',
        'tl_class'=>'w50 clr'
    ),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['odd_priceBox_linkText1'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['odd_priceBox_linkText1'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['odd_priceBox_link2'] = array
(
    'label' => & $GLOBALS['TL_LANG']['tl_content']['odd_priceBox_link2'],
    'exclude' => true,
    'inputType' => 'pageTree',
    'eval' => array (
        'fieldType' => 'radio',
        'tl_class'=>'w50 clr'
    ),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['odd_priceBox_linkText2'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['odd_priceBox_linkText2'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50'),
    'sql' => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['odd_popularPriceBox'] = array
(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['odd_popularPriceBox'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class'=>'w50 clr'),
    'sql' => "varchar(255) NOT NULL default ''"
);