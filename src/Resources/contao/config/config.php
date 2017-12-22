<?php
/**
 * Created by ledproducts-bundle.
 * Developer: Sven Rhinow (sven@sr-tag.de)
 * Date: 07.12.17
 */

$GLOBALS['LED']['MODULE_RELPATH'] = "system/modules/ledproducts-bundle";
$GLOBALS['LED']['PROPERTIES']['ID'] = 1;


/**
 * -------------------------------------------------------------------------
 * BACK END MODULES
 * -------------------------------------------------------------------------
 */
array_insert($GLOBALS['BE_MOD']['design'], 1, array
(
    'teaser_manager' => array
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