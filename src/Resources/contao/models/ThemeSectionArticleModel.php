<?php

/**
 * for Contao Open Source CMS
 *
 * Copyright (c) 2017 Sven Rhinow
 *
 * @package themecontent-bundle
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */
namespace Srhinow;

class ThemeSectionArticleModel extends \Model
{
    /**
     * Table name
     * @var string
     */
    protected static $strTable = 'tl_theme_section_article';

    /**
     * Find published news items by their parent ID and ID or alias
     *
     * @param mixed $varId      The numeric ID or alias name
     * @param array $arrOptions An optional options array
     *
     * @return \Model|null The AgapeCategoriesModel or null if there are no category
     */
    public static function findThemeArticleByIdOrAlias($varId, array $arrOptions=array())
    {
        $t = static::$strTable;

        return static::findOneBy('id', $varId, $arrOptions);
    }

    /**
     * Find categories for pagination-list
     * @param int $intLimit
     * @param int $intOffset
     * @param array $filter
     * @param array $arrOptions
     * @return \Model\Collection|null|static
     */
    public static function findThemeArticle($intLimit=0, $intOffset=0, array $filter=array(), array $arrOptions=array())
    {
        $t = static::$strTable;
        $arrColumns = (count($filter) > 0)? $filter : null;

        if (!isset($arrOptions['order']))
        {
            $arrOptions['order'] = "$t.id DESC";
        }

        $arrOptions['limit']  = $intLimit;
        $arrOptions['offset'] = $intOffset;


        return static::findBy($arrColumns, null, $arrOptions);
    }

    /**
     * Count all category items
     *
     * @param array $filter
     * @param array $arrOptions
     * @return \Model\Collection|null A collection of models or null if there are no categories
     */
    public static function countEntries(array $filter=array(), array $arrOptions=array())
    {
        $t = static::$strTable;
        $arrColumns = (count($filter) > 0)? $filter : null;

        return static::countBy($arrColumns, null, $arrOptions);
    }
}
