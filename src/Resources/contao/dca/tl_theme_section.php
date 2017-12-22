<?php

/**
 *
 * @copyright  Sven Rhinow 2015
 * @author     Sven Rhinow <sven@sr-tag.de>
 * @package    teaser-manager
 * @license    LGPL
 */


/**
 * Table tl_teaser
 */
$GLOBALS['TL_DCA']['tl_theme_section'] = array
(

    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'ctable'                      => array('tl_theme_section_article'),
        'switchToEdit'                => true,
        'enableVersioning'            => true,
        'onload_callback' => array
        (
            array('tl_theme_section', 'checkPermission')
        ),
        'onsubmit_callback' => array
        (
            array('tl_theme_section', 'storeDateAdded')
        ),

        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary',
                'alias' => 'index',
                'pid,published' => 'index'
            )
        )
    ),

    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'                    => 1,
            'fields'                  => array('title'),
            'flag'                    => 1,
            'panelLayout'             => 'filter;search,limit'
        ),
        'label' => array
        (
            'fields'                  => array('title'),
            'format'                  => '%s'
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations' => array
        (
            'theme_section_article' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_theme_section']['theme_section_article'],
                'href'                => 'table=tl_theme_section_article',
                'icon'                => 'bundles/srhinowthemecontent/icons/combo_boxes.png',
//                'button_callback'     => array('tl_theme', 'editCss')
            ),
            'editheader' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_theme_section']['editheader'],
                'href'                => 'act=edit',
                'icon'                => 'header.svg',
                'button_callback'     => array('tl_theme_section', 'editHeader')
            ),
            'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_theme_section']['copy'],
                'href'                => 'act=copy',
                'icon'                => 'copy.gif'
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_theme_section']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
        )
    ),

    // Palettes
    'palettes' => array
    (
        '__selector__'                => array('protected'),
        'default'                     => '{title_legend},title,alias,description,published',
    ),
    // Subpalettes
    'subpalettes' => array
    (
        'protected'                   => 'groups',
    ),
    // Fields
    'fields' => array
    (
        'id' => array
        (
            'label'                   => array('ID'),
            'search'                  => true,
            'sql'                     => "int(10) unsigned NOT NULL auto_increment"
        ),
        'pid' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'sorting' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'tstamp' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'title' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['title'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'alias' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['alias'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('doNotCopy'=>true, 'maxlength'=>128, 'tl_class'=>'w50 clr'),
            'save_callback' => array
            (
                array('tl_theme_section', 'generateAlias')
            ),
            'sql'                     => "varchar(128) COLLATE utf8_bin NOT NULL default ''"
        ),
        'type' => array
        (
            'sql'                     => "varchar(32) NOT NULL default ''"
        ),
        'pageTitle' => array
        (
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'language' => array
        (
            'sql'                     => "varchar(5) NOT NULL default ''"
        ),
        'robots' => array
        (
            'sql'                     => "varchar(32) NOT NULL default ''"
        ),
        'description' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['description'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'textarea',
            'eval'                    => array('style'=>'height:60px', 'decodeEntities'=>true, 'tl_class'=>'clr'),
            'sql'                     => "text NULL"
        ),
        'redirect' => array
        (
            'sql'                     => "varchar(32) NOT NULL default ''"
        ),
        'jumpTo' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'redirectBack' => array
        (
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'url' => array
        (
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'target' => array
        (
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'dns' => array
        (
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'staticFiles' => array
        (
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'staticPlugins' => array
        (
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'fallback' => array
        (
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'adminEmail' => array
        (
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'dateFormat' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['dateFormat'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('helpwizard'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'explanation'             => 'dateFormat',
            'sql'                     => "varchar(32) NOT NULL default ''"
        ),
        'timeFormat' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['timeFormat'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(32) NOT NULL default ''"
        ),
        'datimFormat' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['datimFormat'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(32) NOT NULL default ''"
        ),
        'createSitemap' => array
        (
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'sitemapName' => array
        (
            'sql'                     => "varchar(32) NOT NULL default ''"
        ),
        'useSSL' => array
        (
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'autoforward' => array
        (
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'protected' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['protected'],
            'exclude'                 => true,
            'filter'                  => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('submitOnChange'=>true),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'groups' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['groups'],
            'exclude'                 => true,
            'filter'                  => true,
            'inputType'               => 'checkbox',
            'foreignKey'              => 'tl_member_group.name',
            'eval'                    => array('mandatory'=>true, 'multiple'=>true),
            'sql'                     => "blob NULL",
            'relation'                => array('type'=>'hasMany', 'load'=>'lazy')
        ),
        'includeLayout' => array
        (
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'layout' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'",
        ),
        'mobileLayout' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'",
        ),
        'includeCache' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['includeCache'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('submitOnChange'=>true),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'cache' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['cache'],
            'default'                 => 0,
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'select',
            'options'                 => array(0, 5, 15, 30, 60, 300, 900, 1800, 3600, 10800, 21600, 43200, 86400, 259200, 604800, 2592000),
            'reference'               => &$GLOBALS['TL_LANG']['CACHE'],
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'clientCache' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['clientCache'],
            'default'                 => 0,
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'select',
            'options'                 => array(0, 5, 15, 30, 60, 300, 900, 1800, 3600, 10800, 21600, 43200, 86400, 259200, 604800, 2592000),
            'reference'               => &$GLOBALS['TL_LANG']['CACHE'],
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'includeChmod' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['includeChmod'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('submitOnChange'=>true),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'cuser' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['cuser'],
            'default'                 => \intval(Config::get('defaultUser')),
            'search'                  => true,
            'exclude'                 => true,
            'inputType'               => 'select',
            'foreignKey'              => 'tl_user.name',
            'eval'                    => array('mandatory'=>true, 'chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
            'sql'                     => "int(10) unsigned NOT NULL default '0'",
            'relation'                => array('type'=>'hasOne', 'load'=>'lazy')
        ),
        'cgroup' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['cgroup'],
            'default'                 => \intval(Config::get('defaultGroup')),
            'search'                  => true,
            'exclude'                 => true,
            'inputType'               => 'select',
            'foreignKey'              => 'tl_user_group.name',
            'eval'                    => array('mandatory'=>true, 'chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
            'sql'                     => "int(10) unsigned NOT NULL default '0'",
            'relation'                => array('type'=>'hasOne', 'load'=>'lazy')
        ),
        'chmod' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['chmod'],
            'default'                 => Config::get('defaultChmod'),
            'exclude'                 => true,
            'inputType'               => 'chmod',
            'eval'                    => array('tl_class'=>'clr'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'noSearch' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['noSearch'],
            'exclude'                 => true,
            'filter'                  => true,
            'inputType'               => 'checkbox',
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'cssClass' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['cssClass'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>64, 'tl_class'=>'w50'),
            'sql'                     => "varchar(64) NOT NULL default ''"
        ),
        'sitemap' => array
        (
            'sql'                     => "varchar(32) NOT NULL default ''"
        ),
        'hide' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['hide'],
            'exclude'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'guests' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['guests'],
            'exclude'                 => true,
            'filter'                  => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'tabindex' => array
        (
            'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
        ),
        'accesskey' => array
        (
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'published' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['published'],
            'exclude'                 => true,
            'filter'                  => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('doNotCopy'=>true),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'start' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['start'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
            'sql'                     => "varchar(10) NOT NULL default ''"
        ),
        'stop' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_theme_section']['stop'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
            'sql'                     => "varchar(10) NOT NULL default ''"
        )
    )
);

class tl_theme_section extends \Backend
{
    /**
     * Import the back end user object
     */
    public function __construct()
    {
        parent::__construct();
        $this->import('BackendUser', 'User');
    }

    /**
     * Check permissions to edit table tl_theme_section
     *
     * @throws Contao\CoreBundle\Exception\AccessDeniedException
     */
    public function checkPermission()
    {
        if ($this->User->isAdmin)
        {
            return;
        }

        // Set root IDs
        if (!is_array($this->User->themecontents) || empty($this->User->themecontents))
        {
            $root = array(0);
        }
        else
        {
            $root = $this->User->themecontents;
        }

        $GLOBALS['TL_DCA']['tl_theme_section']['list']['sorting']['root'] = $root;

        // Check permissions to add archives
        if (!$this->User->hasAccess('create', 'themecontentp'))
        {
            $GLOBALS['TL_DCA']['tl_theme_section']['config']['closed'] = true;
        }

        /** @var Symfony\Component\HttpFoundation\Session\SessionInterface $objSession */
        $objSession = System::getContainer()->get('session');

        // Check current action
        switch (Input::get('act') && Input::get('act') != 'paste')
        {
            case 'create':
            case 'select':
                // Allow
                break;

            case 'edit':
                // Dynamically add the record to the user profile
                if (!in_array(Input::get('id'), $root))
                {
                    /** @var Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface $objSessionBag */
                    $objSessionBag = $objSession->getBag('contao_backend');

                    $arrNew = $objSessionBag->get('new_records');

                    if (is_array($arrNew['tl_theme_section']) && in_array(Input::get('id'), $arrNew['tl_theme_section']))
                    {
                        // Add the permissions on group level
                        if ($this->User->inherit != 'custom')
                        {
                            $objGroup = $this->Database->execute("SELECT id, themecontents, themecontentp FROM tl_user_group WHERE id IN(" . implode(',', array_map('intval', $this->User->groups)) . ")");

                            while ($objGroup->next())
                            {
                                $arrTeasermanagerp = StringUtil::deserialize($objGroup->newp);

                                if (is_array($arrTeasermanagerp) && in_array('create', $arrTeasermanagerp))
                                {
                                    $arrTeasermanagers = StringUtil::deserialize($objGroup->news, true);
                                    $arrTeasermanagers[] = Input::get('id');

                                    $this->Database->prepare("UPDATE tl_user_group SET themecontents=? WHERE id=?")
                                        ->execute(serialize($arrTeasermanagers), $objGroup->id);
                                }
                            }
                        }

                        // Add the permissions on user level
                        if ($this->User->inherit != 'group')
                        {
                            $objUser = $this->Database->prepare("SELECT themecontents, themecontentp FROM tl_user WHERE id=?")
                                ->limit(1)
                                ->execute($this->User->id);

                            $arrTeasermanagerp = StringUtil::deserialize($objUser->themecontentp);

                            if (is_array($arrTeasermanagerp) && in_array('create', $arrTeasermanagerp))
                            {
                                $arrTeasermanagers = StringUtil::deserialize($objUser->themecontents, true);
                                $arrTeasermanagers[] = Input::get('id');

                                $this->Database->prepare("UPDATE tl_user SET themecontents=? WHERE id=?")
                                    ->execute(serialize($arrTeasermanagers), $this->User->id);
                            }
                        }

                        // Add the new element to the user object
                        $root[] = Input::get('id');
                        $this->User->themecontents = $root;
                    }
                }
            // No break;

            case 'copy':
            case 'delete':
            case 'show':
                if (!in_array(Input::get('id'), $root) || (Input::get('act') == 'delete' && !$this->User->hasAccess('delete', 'newp')))
                {
                    throw new Contao\CoreBundle\Exception\AccessDeniedException('Not enough permissions to ' . Input::get('act') . ' teaser manager section ID ' . Input::get('id') . '.');
                }
                break;

            case 'editAll':
            case 'deleteAll':
            case 'overrideAll':
                $session = $objSession->all();
                if (Input::get('act') == 'deleteAll' && !$this->User->hasAccess('delete', 'themecontentp'))
                {
                    $session['CURRENT']['IDS'] = array();
                }
                else
                {
                    $session['CURRENT']['IDS'] = array_intersect($session['CURRENT']['IDS'], $root);
                }
                $objSession->replace($session);
                break;

            default:
                if (strlen(Input::get('act')))
                {
                    throw new Contao\CoreBundle\Exception\AccessDeniedException('Not enough permissions to ' . Input::get('act') . ' teaser manager section.');
                }
                break;
        }
    }
    /**
     * Return the edit header button
     *
     * @param array  $row
     * @param string $href
     * @param string $label
     * @param string $title
     * @param string $icon
     * @param string $attributes
     *
     * @return string
     */

    public function editHeader($row, $href, $label, $title, $icon, $attributes)
    {
        return $this->User->canEditFieldsOf('tl_theme_section') ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.StringUtil::specialchars($title).'"'.$attributes.'>'.Image::getHtml($icon, $label).'</a> ' : Image::getHtml(preg_replace('/\.svg$/i', '_.svg', $icon)).' ';
    }


    /**
     * Return the copy archive button
     *
     * @param array  $row
     * @param string $href
     * @param string $label
     * @param string $title
     * @param string $icon
     * @param string $attributes
     *
     * @return string
     */
    public function copyArchive($row, $href, $label, $title, $icon, $attributes)
    {
        return $this->User->hasAccess('create', 'themecontentp') ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.StringUtil::specialchars($title).'"'.$attributes.'>'.Image::getHtml($icon, $label).'</a> ' : Image::getHtml(preg_replace('/\.svg$/i', '_.svg', $icon)).' ';
    }


    /**
     * Return the delete archive button
     *
     * @param array  $row
     * @param string $href
     * @param string $label
     * @param string $title
     * @param string $icon
     * @param string $attributes
     *
     * @return string
     */
    public function deleteArchive($row, $href, $label, $title, $icon, $attributes)
    {
        return $this->User->hasAccess('delete', 'themecontentp') ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.StringUtil::specialchars($title).'"'.$attributes.'>'.Image::getHtml($icon, $label).'</a> ' : Image::getHtml(preg_replace('/\.svg$/i', '_.svg', $icon)).' ';
    }

    /**
     * Auto-generate an alias if it has not been set yet
     * @param mixed
     * @param DataContainer
     * @return string
     */
    public function generateAlias($varValue, DataContainer $dc)
    {
        $autoAlias = false;

        // Generate an alias if there is none
        if ($varValue == '')
        {
            $autoAlias = true;
            $varValue = standardize(\StringUtil::restoreBasicEntities($dc->activeRecord->title));
        }

        $objAlias = $this->Database->prepare("SELECT id FROM tl_theme_section WHERE id=? OR alias=?")
            ->execute($dc->id, $varValue);

        // Check whether the page alias exists
        if ($objAlias->numRows > 1)
        {
            if (!$autoAlias)
            {
                throw new Exception(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
            }

            $varValue .= '-' . $dc->id;
        }

        return $varValue;
    }

    /**
     * Store the date when the account has been added
     *
     * @param DataContainer $dc
     */
    public function storeDateAdded($dc)
    {
        // Front end call
        if (!$dc instanceof DataContainer)
        {
            return;
        }

        // Return if there is no active record (override all)
        if (!$dc->activeRecord || $dc->activeRecord->dateAdded > 0)
        {
            return;
        }

        $time = time();

        $this->Database->prepare("UPDATE tl_teaser SET dateAdded=? WHERE id=?")
            ->execute($time, $dc->id);
    }
}
