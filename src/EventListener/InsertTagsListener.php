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
//        'insert_theme_content',
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
            return $this->replaceThemeArticleInsertTags($key, $elements[1]);
        }

        return false;
    }


    /**
     * Replaces a THEME-ARTICLE-related insert tag.
     *
     * @param string $insertTag
     * @param string $idOrAlias
     *
     * @return string
     */
    private function replaceThemeArticleInsertTags($insertTag, $idOrAlias)
    {
        $this->framework->initialize();

        /** @var ThemeSectionArticleModel $adapter */
        $adapter = $this->framework->getAdapter(ThemeSectionArticleModel::class);

        if (null === ($objRow = $adapter->findByIdOrAlias($idOrAlias))) {
            return '';
        }

        switch($insertTag) {
            case 'insert_theme_article':
                $objThemeArticle = new ModuleThemeArticle($objRow);
                return $objThemeArticle->generate(true);
                break;
        }

        return '';
    }

}
