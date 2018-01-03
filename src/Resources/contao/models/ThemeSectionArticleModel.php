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

/**
 * Reads and writes news
 *
 * @property integer $id
 * @property integer $pid
 * @property integer $tstamp
 * @property string  $headline
 * @property string  $alias
 * @property integer $author
 * @property integer $date
 * @property integer $time
 * @property string  $subheadline
 * @property string  $teaser
 * @property boolean $addImage
 * @property string  $singleSRC
 * @property string  $alt
 * @property string  $size
 * @property string  $imagemargin
 * @property string  $imageUrl
 * @property boolean $fullsize
 * @property string  $caption
 * @property string  $floating
 * @property boolean $addEnclosure
 * @property string  $enclosure
 * @property string  $source
 * @property integer $jumpTo
 * @property integer $articleId
 * @property string  $url
 * @property boolean $target
 * @property string  $cssClass
 * @property boolean $noComments
 * @property boolean $featured
 * @property boolean $published
 * @property string  $start
 * @property string  $stop
 *
 * @method static ThemeSectionArticleModel|null findById($id, array $opt=array())
 * @method static ThemeSectionArticleModel|null findByPk($id, array $opt=array())
 * @method static ThemeSectionArticleModel|null findByIdOrAlias($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneBy($col, $val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByPid($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByTstamp($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByHeadline($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByAlias($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByAuthor($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByDate($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByTime($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneBySubheadline($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByTeaser($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByAddImage($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneBySingleSRC($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByAlt($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneBySize($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByImagemargin($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByImageUrl($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByFullsize($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByCaption($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByFloating($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByAddEnclosure($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByEnclosure($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneBySource($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByJumpTo($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByArticleId($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByUrl($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByTarget($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByCssClass($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByNoComments($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByFeatured($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByPublished($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByStart($val, array $opt=array())
 * @method static ThemeSectionArticleModel|null findOneByStop($val, array $opt=array())
 *
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByPid($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByTstamp($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByHeadline($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByAlias($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByAuthor($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByDate($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByTime($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findBySubheadline($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByTeaser($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByAddImage($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findBySingleSRC($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByAlt($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findBySize($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByImagemargin($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByImageUrl($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByFullsize($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByCaption($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByFloating($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByAddEnclosure($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByEnclosure($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findBySource($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByJumpTo($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByArticleId($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByUrl($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByTarget($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByCssClass($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByNoComments($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByFeatured($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByPublished($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByStart($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findByStop($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findMultipleByIds($val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findBy($col, $val, array $opt=array())
 * @method static \Model\Collection|ThemeSectionArticleModel[]|ThemeSectionArticleModel|null findAll(array $opt=array())
 *
 * @method static integer countById($id, array $opt=array())
 * @method static integer countByPid($val, array $opt=array())
 * @method static integer countByTstamp($val, array $opt=array())
 * @method static integer countByHeadline($val, array $opt=array())
 * @method static integer countByAlias($val, array $opt=array())
 * @method static integer countByAuthor($val, array $opt=array())
 * @method static integer countByDate($val, array $opt=array())
 * @method static integer countByTime($val, array $opt=array())
 * @method static integer countBySubheadline($val, array $opt=array())
 * @method static integer countByTeaser($val, array $opt=array())
 * @method static integer countByAddImage($val, array $opt=array())
 * @method static integer countBySingleSRC($val, array $opt=array())
 * @method static integer countByAlt($val, array $opt=array())
 * @method static integer countBySize($val, array $opt=array())
 * @method static integer countByImagemargin($val, array $opt=array())
 * @method static integer countByImageUrl($val, array $opt=array())
 * @method static integer countByFullsize($val, array $opt=array())
 * @method static integer countByCaption($val, array $opt=array())
 * @method static integer countByFloating($val, array $opt=array())
 * @method static integer countByAddEnclosure($val, array $opt=array())
 * @method static integer countByEnclosure($val, array $opt=array())
 * @method static integer countBySource($val, array $opt=array())
 * @method static integer countByJumpTo($val, array $opt=array())
 * @method static integer countByArticleId($val, array $opt=array())
 * @method static integer countByUrl($val, array $opt=array())
 * @method static integer countByTarget($val, array $opt=array())
 * @method static integer countByCssClass($val, array $opt=array())
 * @method static integer countByNoComments($val, array $opt=array())
 * @method static integer countByFeatured($val, array $opt=array())
 * @method static integer countByPublished($val, array $opt=array())
 * @method static integer countByStart($val, array $opt=array())
 * @method static integer countByStop($val, array $opt=array())
 *
 * @author Leo Feyer <https://github.com/leofeyer>
 */
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
//        $t = static::$strTable;

        return static::findByIdOrAlias($varId, $arrOptions);
    }

    /**
     * Find categories for pagination-list
     * @param int $intLimit
     * @param int $intOffset
     * @param array $filter
     * @param array $arrOptions
     * @return \\Model\Collection|null|static
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
     * @return \\Model\Collection|null A collection of models or null if there are no categories
     */
    public static function countEntries(array $filter=array(), array $arrOptions=array())
    {
        $t = static::$strTable;
        $arrColumns = (count($filter) > 0)? $filter : null;

        return static::countBy($arrColumns, null, $arrOptions);
    }
}
