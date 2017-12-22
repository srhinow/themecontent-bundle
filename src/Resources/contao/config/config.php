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
$GLOBALS['TL_PERMISSIONS'][] = 'teasermanagers';
$GLOBALS['TL_PERMISSIONS'][] = 'teasermanagerp';

/** Hooks */
//$GLOBALS['TL_HOOKS']['generateBreadcrumb'][] = array('LedHooks', 'ledGenerateBreadcrumb');