<?php
/**
 * PHP version >= 7.1
 * @copyright  Sven Rhinow 2018
 * @author     Sven Rhinow <sven@sr-tag.de>
 * @package    themecontent-bundle
 * @license    LGPL
 * @filesource
 */

/**
 * Dynamically add the parent table
 */
if (Input::get('do') == 'theme_content')
{
    $GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_theme_section_article';
}

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['themeArticle'] =
[
	'label'            => &$GLOBALS['TL_LANG']['tl_content']['themeArticle'],
	'exclude'          => true,
	'inputType'        => 'select',
	'options_callback' => ['srhinow_themecontent.listener.dca', 'onOptionsThemeArticle'],
	'eval'             => ['mandatory'=>true, 'chosen'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50 wizard'],
	'wizard'           => [['srhinow_themecontent.listener.dca', 'onEditThemeArticle']],
	'sql'              => "int(10) unsigned NOT NULL default '0'"
];

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['themeArticle'] = str_replace('articleAlias', 'themeArticle', $GLOBALS['TL_DCA']['tl_content']['palettes']['article']);
