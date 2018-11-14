<?php

/**
 * @copyright  Sven Rhinow 2017 <https://www.sr-tag.de>
 * @author     Sven Rhinow
 * @package    ThemecontentBundle
 * @license    LGPL-3.0-or-later
 * @see	       https://github.com/srhinow/themecontent-bundle
 *
 */

namespace Srhinow\ThemecontentBundle\ContentElement;

use Contao\ContentElement;
use Contao\ContentModel;
use Contao\ModuleArticle;
use Srhinow\ThemeSectionArticleModel;

/**
 * Front end content element "theme article alias".
 *
 * @author Fritz Michael Gschwantner <https://github.com/fritzmg>
 */
class ContentThemeArticle extends ContentElement
{
	/**
	 * Parse the template
	 *
	 * @return string
	 */
	public function generate()
	{
		$objRow = ThemeSectionArticleModel::findById($this->themeArticle);

		if (null === $objRow || !static::isVisibleElement($objRow))
		{
			return '';
		}

		$objCte = ContentModel::findPublishedByPidAndTable($this->themeArticle, 'tl_theme_section_article');

		if (null === $objCte)
		{
			return '';
		}

		$strBuffer = '';

		while ($objCte->next())
		{
			$strBuffer.= $this->getContentElement($objCte->current());
		}

		return $strBuffer;
	}

	/**
	 * Generate the content element
	 */
	protected function compile()
	{
		return;
	}
}
