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
