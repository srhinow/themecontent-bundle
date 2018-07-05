<?php

/*
 * This file is part of themecontent-bundle.
 *
 * Copyright (c) 2005-2017 Leo Feyer (copy from Contao-News-Modul)
 *
 * @license LGPL-3.0+
 */

namespace Srhinow\ThemecontentBundle\EventListener;

use Contao\CoreBundle\Framework\ContaoFrameworkInterface;
use Contao\DataContainer;
use Contao\Image;
use Contao\StringUtil;
use Contao\System;
use Doctrine\DBAL\Connection;
use Srhinow\ModuleThemeArticle;
use Srhinow\ThemeSectionArticleModel;

/**
 * Handles DCA callbacks/events.
 *
 * @author Fritz Michael Gschwantner <https://github.com/fritzmg>
 */
class DcaListener
{
    /**
     * @var ContaoFrameworkInterface
     */
    protected $framework;

    /**
     * @var Connection
     */
    protected $db;


    /**
     * Constructor.
     *
     * @param ContaoFrameworkInterface $framework
     */
    public function __construct(ContaoFrameworkInterface $framework, Connection $db)
    {
        $this->framework = $framework;
        $this->db = $db;
    }


    public function onOptionsThemeArticle(DataContainer $dc)
    {
        $this->framework->initialize();

        $arrPids = array();
        $arrAlias = array();

        $query = $this->db->executeQuery("SELECT a.id, a.pid, a.title, a.inColumn, p.title AS parent FROM tl_theme_section_article a LEFT JOIN tl_theme_section p ON p.id=a.pid WHERE a.id!=(SELECT pid FROM tl_content WHERE id=?) ORDER BY parent, a.sorting", [$dc->id]);

        if ($query->rowCount())
        {
            System::loadLanguageFile('tl_article');

            foreach ($query->fetchAll() as $result)
            {
                $key = $result['parent'];
                $arrAlias[$key][$result['id']] = $result['title'] . ' (ID ' . $result['id'] . ')';
            }
        }

        return $arrAlias;
    }

    public function onEditThemeArticle(DataContainer $dc)
    {
        $this->framework->initialize();

        return ($dc->value < 1) ? '' : ' <a href="contao/main.php?do=theme_content&amp;table=tl_content&amp;id=' . $dc->value . '&amp;popup=1&amp;nb=1&amp;rt=' . REQUEST_TOKEN . '" title="' . sprintf(StringUtil::specialchars($GLOBALS['TL_LANG']['tl_content']['editalias'][1]), $dc->value) . '" onclick="Backend.openModalIframe({\'title\':\'' . StringUtil::specialchars(str_replace("'", "\\'", sprintf($GLOBALS['TL_LANG']['tl_content']['editalias'][1], $dc->value))) . '\',\'url\':this.href});return false">' . Image::getHtml('alias.svg', $GLOBALS['TL_LANG']['tl_content']['editalias'][0]) . '</a>';
    }
}
