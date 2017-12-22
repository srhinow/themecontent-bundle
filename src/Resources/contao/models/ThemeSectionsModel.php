<?php

/**
 * for Contao Open Source CMS
 *
 * Copyright (c) 2017 Sven Rhinow
 *
 * @package agape
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


class ThemeSectionsModel extends \Contao\Model
{
    /**
     * Table name
     * @var string
     */
    protected static $strTable = 'tl_led_serie_categories';

    /**
     * Find published news items by their parent ID and ID or alias
     *
     * @param mixed $varId      The numeric ID or alias name
     * @param array $arrOptions An optional options array
     *
     * @return \Model|null The AgapeCategoriesModel or null if there are no category
     */
    public static function findSeriesByIdOrAlias($varId, array $arrOptions=array())
    {
        $t = static::$strTable;

        return static::findOneBy('id', $varId, $arrOptions);
    }

    /**
     * Find published products items by their parent ID
     *
     * @param integer $intId      The agape product category ID
     * @param integer $intLimit   An optional limit
     * @param array   $arrOptions An optional options array
     *
     * @return \Model\Collection|\NewsModel[]|\NewsModel|null A collection of models or null if there are no news
     */
    public static function findPublishedByPid($intId, $intLimit=0, array $arrOptions=array())
    {
        $t = static::$strTable;
        $arrColumns = array("$t.pid=?");

        if (!isset($arrOptions['order']))
        {
            $arrOptions['order'] = "$t.sorting DESC";
        }

        if (!BE_USER_LOGGED_IN)
        {
            $arrColumns[] = "$t.published='1'";
        }

        if ($intLimit > 0)
        {
            $arrOptions['limit'] = $intLimit;
        }

        return static::findBy($arrColumns, $intId, $arrOptions);
    }

    /**
     * Count all published products be there category id
     *
     * @param integer $intId      The agape product category ID
     * @param array $filter
     * @param array $arrOptions
     * @return \Model\Collection|null A collection of models or null if there are no categories
     */
    public static function countPublishedByPid($intId, array $filter=array(), array $arrOptions=array())
    {
        $t = static::$strTable;
        $arrColumns = (count($filter) > 0)? $filter : null;

        if (!BE_USER_LOGGED_IN)
        {
            $arrColumns[] = "$t.published='1'";
        }

        return static::countBy($arrColumns, null, $arrOptions);
    }
}
