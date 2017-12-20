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
array_insert($GLOBALS['BE_MOD'], 1, array(
        'led' => array
        (
            'led_products' => array (
                'tables' => array('tl_led_series','tl_led_categories','tl_led_serie_categories','tl_led_serie_articles'),
            ),
//            'agape_properties' => array (
//                'tables' => array('tl_agape_properties'),
//                'callback' => 'ModuleApageProperties',
//            )
        )
    )
);

/**
 * Frontend modules
 */
$GLOBALS['FE_MOD']['led_products_fe'] = array
(
    'fe_led_series' => 'ModuleLedSeriesList',
    'fe_led_serie_articles' => 'ModuleLedSerieArticleList',
    'fe_led_serie_article_details' => 'ModuleLedSerieArticleDetails',
);

/** Hooks */
//$GLOBALS['TL_HOOKS']['generateBreadcrumb'][] = array('LedHooks', 'ledGenerateBreadcrumb');