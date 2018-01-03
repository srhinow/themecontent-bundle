<?php
/**
 * Created by themecontent-bundle.
 * Developer: Sven Rhinow (sven@sr-tag.de)
 * Date: 22.12.17
 */



/**
 * -------------------------------------------------------------------------
 * BACK END MODULES
 * -------------------------------------------------------------------------
 */
array_insert($GLOBALS['BE_MOD']['design'], 1, array
(
    'theme_content' => array
    (
        'tables'      => array('tl_theme_section', 'tl_theme_section_article', 'tl_content'),
        'table'       => array('TableWizard', 'importTable'),
        'list'        => array('ListWizard', 'importList')
    )
));

/**
 * Add permissions
 */
$GLOBALS['TL_PERMISSIONS'][] = 'themecontents';
$GLOBALS['TL_PERMISSIONS'][] = 'themecontentp';

/** Hooks */
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('srhinow_themecontent.listener.insert_tags', 'onReplaceInsertTags');
