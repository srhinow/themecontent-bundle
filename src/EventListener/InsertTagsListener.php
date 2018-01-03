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
use Contao\StringUtil;

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
            return $this->replaceThemeArticleInsertTags($key, $elements[1]);
        }

        return false;
    }


    /**
     * Replaces a news-related insert tag.
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

        if (null === ($article = $adapter->findByIdOrAlias($idOrAlias))) {
            return '';
        }

//        return $this->generateReplacement($article, $insertTag);
    }

    /**
     * Generates the replacement string.
     *
     * @param NewsModel $news
     * @param string    $insertTag
     *
     * @return string
     */
//    private function generateReplacement(NewsModel $news, $insertTag)
//    {
//        /** @var News $adapter */
//        $adapter = $this->framework->getAdapter(News::class);
//
//        switch ($insertTag) {
//            case 'news':
//                return sprintf(
//                    '<a href="%s" title="%s">%s</a>',
//                    $adapter->generateNewsUrl($news),
//                    StringUtil::specialchars($news->headline),
//                    $news->headline
//                );
//
//            case 'news_open':
//                return sprintf(
//                    '<a href="%s" title="%s">',
//                    $adapter->generateNewsUrl($news),
//                    StringUtil::specialchars($news->headline)
//                );
//
//            case 'news_url':
//                return $adapter->generateNewsUrl($news);
//
//            case 'news_title':
//                return StringUtil::specialchars($news->headline);
//
//            case 'news_teaser':
//                return StringUtil::toHtml5($news->teaser);
//        }
//
//        return '';
//    }
//   private function generateReplacement(NewsModel $news, $insertTag)
//    {
//        /** @var News $adapter */
//        $adapter = $this->framework->getAdapter(News::class);
//
//        switch ($insertTag) {
//            case 'news':
//                return sprintf(
//                    '<a href="%s" title="%s">%s</a>',
//                    $adapter->generateNewsUrl($news),
//                    StringUtil::specialchars($news->headline),
//                    $news->headline
//                );
//
//            case 'news_open':
//                return sprintf(
//                    '<a href="%s" title="%s">',
//                    $adapter->generateNewsUrl($news),
//                    StringUtil::specialchars($news->headline)
//                );
//
//            case 'news_url':
//                return $adapter->generateNewsUrl($news);
//
//            case 'news_title':
//                return StringUtil::specialchars($news->headline);
//
//            case 'news_teaser':
//                return StringUtil::toHtml5($news->teaser);
//        }
//
//        return '';
//    }
}
