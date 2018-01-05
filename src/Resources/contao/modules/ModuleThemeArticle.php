<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace Srhinow;


/**
 * Provides methodes to handle articles.
 *
 * @property integer $tstamp
 * @property string  $title
 * @property string  $alias
 * @property string  $inColumn
 * @property boolean $showTeaser
 * @property boolean $multiMode
 * @property string  $teaser
 * @property string  $teaserCssID
 * @property string  $classes
 * @property string  $keywords
 * @property boolean $printable
 * @property boolean $published
 * @property integer $start
 * @property integer $stop
 *
 * @author Leo Feyer <https://github.com/leofeyer>
 */
class ModuleThemeArticle extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_article';

	/**
	 * No markup
	 * @var boolean
	 */
	protected $blnNoMarkup = false;


	/**
	 * Check whether the article is published
	 *
	 * @param boolean $blnNoMarkup
	 *
	 * @return string
	 */
	public function generate($blnNoMarkup=false)
	{
		if (TL_MODE == 'FE' && !BE_USER_LOGGED_IN && (!$this->published || ($this->start != '' && $this->start > time()) || ($this->stop != '' && $this->stop < time())))
		{
			return '';
		}

		$this->type = 'article';
		$this->blnNoMarkup = $blnNoMarkup;

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		$id = 'article-' . $this->id;

		// Generate the CSS ID if it is not set
		if (empty($this->cssID[0]))
		{
			$this->cssID = array($id, $this->cssID[1]);
		}

		$this->Template->column = $this->inColumn;
		$this->Template->noMarkup = $this->blnNoMarkup;

		// Add the modification date
		$this->Template->timestamp = $this->tstamp;


		// Get section and article alias
		list($strSection, $strArticle) = explode(':', \Input::get('articles'));

		if ($strArticle === null)
		{
			$strArticle = $strSection;
		}

		$this->Template->printable = false;
		$this->Template->backlink = false;

		// Back link
		if (!$this->multiMode && $strArticle != '' && ($strArticle == $this->id || $strArticle == $this->alias))
		{
			$this->Template->backlink = 'javascript:history.go(-1)'; // see #6955
			$this->Template->back = \StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['goBack']);
		}

		$arrElements = array();
		$objCte = \ContentModel::findPublishedByPidAndTable($this->id, 'tl_theme_section_article');

		if ($objCte !== null)
		{
			$intCount = 0;
			$intLast = $objCte->count() - 1;

			while ($objCte->next())
			{
				$arrCss = array();

				/** @var ContentModel $objRow */
				$objRow = $objCte->current();

				// Add the "first" and "last" classes (see #2583)
				if ($intCount == 0 || $intCount == $intLast)
				{
					if ($intCount == 0)
					{
						$arrCss[] = 'first';
					}

					if ($intCount == $intLast)
					{
						$arrCss[] = 'last';
					}
				}

				$objRow->classes = $arrCss;
				$arrElements[] = $this->getContentElement($objRow, $this->strColumn);
				++$intCount;
			}
		}

		$this->Template->teaser = $this->teaser;
		$this->Template->elements = $arrElements;

		if ($this->keywords != '')
		{
			$GLOBALS['TL_KEYWORDS'] .= (($GLOBALS['TL_KEYWORDS'] != '') ? ', ' : '') . $this->keywords;
		}

		// Deprecated since Contao 4.0, to be removed in Contao 5.0
		if ($this->printable == 1)
		{
			@trigger_error('Setting tl_article.printable to "1" has been deprecated and will no longer work in Contao 5.0.', E_USER_DEPRECATED);

			$this->Template->printable = true;
			$this->Template->pdfButton = true;
		}

		// New structure
		elseif ($this->printable != '')
		{
			$options = \StringUtil::deserialize($this->printable);

			if (!empty($options) && \is_array($options))
			{
				$this->Template->printable = true;
				$this->Template->printButton = \in_array('print', $options);
				$this->Template->pdfButton = \in_array('pdf', $options);
				$this->Template->facebookButton = \in_array('facebook', $options);
				$this->Template->twitterButton = \in_array('twitter', $options);
				$this->Template->gplusButton = \in_array('gplus', $options);
			}
		}

		// HOOK: add custom logic
		if (isset($GLOBALS['TL_HOOKS']['compileThemeArticle']) && \is_array($GLOBALS['TL_HOOKS']['compileThemeArticle']))
		{
			foreach ($GLOBALS['TL_HOOKS']['compileThemeArticle'] as $callback)
			{
				$this->import($callback[0]);
				$this->{$callback[0]}->{$callback[1]}($this->Template, $this->arrData, $this);
			}
		}
	}

}
