<?php
/**
 *
 * @copyright  Sven Rhinow 2015
 * @author     Sven Rhinow <sven@sr-tag.de>
 * @package    teaser-manager
 * @license    LGPL
 */

/**
 * Dynamically add the permission check and parent table
 */
if (Input::get('do') == 'theme_content')
{
    $GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_theme_section_article';
}
