<?php

/*
 * This file is part of themecontent-bundle.
 *
 * Copyright (c) 2005-2017 Leo Feyer (copy from Contao-News-Modul)
 *
 * @license LGPL-3.0+
 */

namespace Srhinow\ThemecontentBundle\EventListener;

use Contao\ContentModel;
use Contao\Controller;
use Contao\CoreBundle\Framework\ContaoFrameworkInterface;
use Srhinow\ThemeSectionArticleModel;
use Srhinow\ModuleThemeArticle;

/**
 * Handles insert tags for news.
 *
 * @author Andreas Schempp <https://github.com/aschempp>
 */
class InsertTagsListener
{
    /**
     * @var ContaoFrameworkInterface
     */
    private $framework;

    /**
     * @var array
     */
    private $supportedTags = [
        'insert_theme_article',
        'insert_theme_content',
    ];

    /**
     * Constructor.
     *
     * @param ContaoFrameworkInterface $framework
     */
    public function __construct(ContaoFrameworkInterface $framework)
    {
        $this->framework = $framework;
    }

    /**
     * Replaces news insert tags.
     *
     * @param string $tag
     *
     * @return string|false
     */
    public function onReplaceInsertTags($tag)
    {
        $elements = explode('::', $tag);
        $key = strtolower($elements[0]);

        if (\in_array($key, $this->supportedTags, true)) {
            switch($key) {
                case 'insert_theme_article':
                    return $this->replaceThemeArticleInsertTags($elements[1]);
                    break;
                case 'insert_theme_content':
                    return $this->replaceThemeContentInsertTags($elements[1]);
                    break;
            }

        }

        return false;
    }


    /**
     * Replaces a THEME-ARTICLE-related insert tag.
     *
     * @param string $idOrAlias
     *
     * @return string
     */
    private function replaceThemeArticleInsertTags($idOrAlias)
    {
        $this->framework->initialize();

        /** @var ThemeSectionArticleModel $adapter */
        $adapter = $this->framework->getAdapter(ThemeSectionArticleModel::class);

        if (null === ($objRow = $adapter->findByIdOrAlias($idOrAlias))) {
            return '';
        }

        $objThemeArticle = new ModuleThemeArticle($objRow);
        return $objThemeArticle->generate(true);
    }

    /**
     * Replaces a THEME-CONTENT-related insert tag.
     *
     * @param string $idOrAlias
     *
     * @return string
     */
    private function replaceThemeContentInsertTags($idOrAlias)
    {
        $this->framework->initialize();

        /** @var ThemeSectionArticleModel $adapter */
        $adapter = $this->framework->getAdapter(ContentModel::class);

        if (null === ($objRow = $adapter->findByIdOrAlias($idOrAlias))) {
            return '';
        }

        return Controller::getContentElement($objRow->id);
    }

}
