<?php

/**
 * TL_ROOT/vendor/srhinow/themecontent-bundle/src/Recources/contao/modules/languages/de/tl_theme_section.php
 *
 * Contao extension: themecontent-bundle
 * English translation file
 *
 * Copyright  Sven Rhinow Webentwicklung 2017 <http://www.sr-tag.de>
 * Author     Sven Rhinow
 * @license    LGPL-3.0-or-later
 * Translator: Fritz Michael Gschwantner <https://github.com/fritzmg>
 */

\System::loadLanguageFile('tl_page');

/** Legends */
$GLOBALS['TL_LANG']['tl_theme_section']['extend_legend'] = "Settings";
$GLOBALS['TL_LANG']['tl_theme_section']['title_legend'] = "Section details";

/** Fields */
$GLOBALS['TL_LANG']['tl_theme_section']['title']['0'] = "Title";
$GLOBALS['TL_LANG']['tl_theme_section']['title']['1'] = "The section title.";
$GLOBALS['TL_LANG']['tl_theme_section']['alias']['0'] = "Alias";
$GLOBALS['TL_LANG']['tl_theme_section']['alias']['1'] = "Alias of the section.";
$GLOBALS['TL_LANG']['tl_theme_section']['description']['0'] = "Description";
$GLOBALS['TL_LANG']['tl_theme_section']['description']['1'] = "Description of the section.";
$GLOBALS['TL_LANG']['tl_theme_section']['published'] = array_map(function($v) { return str_replace('page', 'section', $v); }, $GLOBALS['TL_LANG']['tl_page']['published']);

/** Actions */
$GLOBALS['TL_LANG']['tl_theme_section']['new']['0'] = "New section";
$GLOBALS['TL_LANG']['tl_theme_section']['new']['1'] = "Create a new section.";
$GLOBALS['TL_LANG']['tl_theme_section']['show']['0'] = "Section details";
$GLOBALS['TL_LANG']['tl_theme_section']['show']['1'] = "Show the details of the section with ID %s.";
$GLOBALS['TL_LANG']['tl_theme_section']['editheader']['0'] = "Edit section";
$GLOBALS['TL_LANG']['tl_theme_section']['editheader']['1'] = "Edit section ID %s.";
$GLOBALS['TL_LANG']['tl_theme_section']['copy']['0'] = "Copy section";
$GLOBALS['TL_LANG']['tl_theme_section']['copy']['1'] = "Copy section ID %s.";
$GLOBALS['TL_LANG']['tl_theme_section']['cut']['0'] = "Move section";
$GLOBALS['TL_LANG']['tl_theme_section']['cut']['1'] = "Move section ID %s.";
$GLOBALS['TL_LANG']['tl_theme_section']['delete']['0'] = "Delete section";
$GLOBALS['TL_LANG']['tl_theme_section']['delete']['1'] = "Delete seciton ID %s.";
$GLOBALS['TL_LANG']['tl_theme_section']['copyChildren']['0'] = "Copy section with children.";
$GLOBALS['TL_LANG']['tl_theme_section']['copyChildren']['1'] = "Copy section ID %s with children.";
$GLOBALS['TL_LANG']['tl_theme_section']['theme_section_article']['0'] = "Section articles";
$GLOBALS['TL_LANG']['tl_theme_section']['theme_section_article']['1'] = "Edit section articles.";
