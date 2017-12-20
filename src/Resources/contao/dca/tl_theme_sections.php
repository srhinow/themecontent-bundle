<?php

/**
 * PHP version > 7.1
 * @copyright  Sven Rhinow Webentwicklung 2017 <http://www.sr-tag.de>
 * @author     Sven Rhinow
 * @package    ledproducts-bundle
 * @license    LGPL
 * @filesource
 */


/**
 * Table tl_led_categories
 */

$GLOBALS['TL_DCA']['tl_led_categories'] = array
(

    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'enableVersioning'            => true,
        'label'                       => &$GLOBALS['TL_LANG']['tl_led_categories']['title'],
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary',
                'pid' => 'index',
            )
        ),
        'backlink'                    => 'do=led_products'
    ),
    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'                    => 2,
            'fields'                  => array('name'),
            'flag'                    => 1,
            'panelLayout'             => 'filter;sort,search,limit',
            'disableGrouping' => false
        ),
        'label' => array
        (
            'fields'                  => array('name'),
            'format'                  => '%s',
            'label_callback'		  => array('tl_led_categories', 'listEntries')
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'onclick="Backend.getScrollOffset();"'
            )
        ),
        'operations' => array
        (
            'edit' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_led_categories']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.gif',
            ),
            'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_led_categories']['copy'],
                'href'                => 'act=copy',
                'icon'                => 'copy.gif',
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_led_categories']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"',
            ),
            'toggle' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_led_categories']['toggle'],
                'icon'                => 'visible.gif',
                'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
                'button_callback'     => array('tl_led_categories', 'toggleIcon')
            ),
        )
    ),

    // Palettes
    'palettes' => array
    (
        '__selector__'                => array('addImage'),
        'default'                     => '{data_legend},name,alias,description;{image_legend:hide},addImage;{seriecategories_legend},seriecatitems;{seo_legend:hide},seo_title,seo_keywords,seo_description;{extend_legend},published'
    ),
    // Subpalettes
    'subpalettes' => array
    (
        'addImage'                    => 'image,alt',
        'published'                   => 'start,stop'
    ),
    // Fields
    'fields' => array
    (
        'id' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL auto_increment"
        ),
        'pid' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'",
        ),
        'sorting' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_categories']['sorting'],
            'sql'                     => "int(10) unsigned NOT NULL default '0'",
            'sorting'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>10, 'tl_class'=>'w50'),
        ),
        'tstamp' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'modify' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'name' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_categories']['name'],
            'exclude'                 => true,
            'sorting'                 => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'alias' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_categories']['alias'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'alnum', 'doNotCopy'=>true, 'spaceToUnderscore'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
            'save_callback'           => array
            (
                array('tl_led_categories', 'generateAlias')
            ),
            'sql'                     => "varchar(128) NOT NULL default ''"
        ),
        'description' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_categories']['description'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'textarea',
            'eval'                    => array('rte'=>'tinyMCE', 'tl_class'=>'clr'),
            'sql'                     => "text NULL"
        ),
        'addImage' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_categories']['addImage'],
            'exclude'                 => true,
            'sorting'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('submitOnChange'=>true),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'image' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_categories']['image'],
            'exclude'                 => true,
            'inputType'               => 'fileTree',
            'eval'                    => array('filesOnly'=>true, 'extensions'=>Config::get('validImageTypes'), 'fieldType'=>'radio', 'mandatory'=>true),
            'sql'                     => "binary(16) NULL"
        ),
        'alt' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_categories']['alt'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class'=>'long'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'seriecatitems' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_categories']['seriecatitems'],
            'exclude'                 => true,
            'inputType'               => 'listWizard',
            'eval'                    => array('allowHtml'=>true, 'tl_class'=>'clr'),
            'sql'                     => "blob NULL"
        ),
        'published' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_categories']['published'],
            'filter'                  => true,
            'sorting'                 => true,
            'inputType'               => 'checkbox',
            'flag'                    => 11,
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'seo_title' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_categories']['seo_title'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'search'                  => true,
            'eval'                    => array('decodeEntities'=>true, 'maxlength'=>255,'tl_class'=>'long clr'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'seo_keywords' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_categories']['seo_keywords'],
            'exclude'                 => true,
            'inputType'               => 'textarea',
            'search'                  => true,
            'eval'                    => array('style'=>'height:60px', 'decodeEntities'=>true),
            'sql'                     => "text NULL"
        ),
        'seo_description' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_categories']['seo_description'],
            'exclude'                 => true,
            'inputType'               => 'textarea',
            'search'                  => true,
            'eval'                    => array('style'=>'height:60px', 'decodeEntities'=>true, 'maxlength'=>180,'tl_class'=>'clr'),
            'sql'                     => "varchar(180) NOT NULL default ''"
        )
    )
);

class tl_led_categories extends \Backend
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
            $varValue = standardize(\StringUtil::restoreBasicEntities($dc->activeRecord->name));
        }

        $objAlias = $this->Database->prepare("SELECT id FROM tl_led_categories WHERE id=? OR alias=?")
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
     * modify list-view
     * @param array
     * @param string
     * @return string
     */
    public function listEntries($row, $label)
    {
        // exit();
        if ($row['image'] != '')
        {
            $objModel = \FilesModel::findByUuid($row['image']);
            $thumbUrl = \Image::get($objModel->path,100,100);

            if ($objModel === null)
            {
                // print_r($label);
                $label = $row['name'];
            }
            else
            {
                $label =  sprintf('<img src="%s" alt="" title="%s" style="float:left;"> <div style="vertical-align:middle; display:inline-block; margin-left:30px; margin-top: 40px; font-size: 14px;">%s</div>',$thumbUrl, $row['name'],$row['name']);
            }
        }

        return sprintf('<div style="float:left">%s</div>',$label) . "\n";
    }

    /**
     * Return the "toggle visibility" button
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
    public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
    {
        if (strlen(Input::get('tid')))
        {
            $this->toggleVisibility(Input::get('tid'), (Input::get('state') == 1), (@func_get_arg(12) ?: null));
            $this->redirect($this->getReferer());
        }

        // Check permissions AFTER checking the tid, so hacking attempts are logged
        if (!$this->User->hasAccess('tl_led_categories::published', 'alexf'))
        {
            return '';
        }

        $href .= '&amp;tid='.$row['id'].'&amp;state='.($row['published'] ? '' : 1);

        if (!$row['published'])
        {
            $icon = 'invisible.gif';
        }

        return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.\Image::getHtml($icon, $label, 'data-state="' . ($row['published'] ? 1 : 0) . '"').'</a> ';
    }


    /**
     * Disable/enable a user group
     *
     * @param integer       $intId
     * @param boolean       $blnVisible
     * @param DataContainer $dc
     */
    public function toggleVisibility($intId, $blnVisible, DataContainer $dc=null)
    {
        // Set the ID and action
        \Input::setGet('id', $intId);
        \Input::setGet('act', 'toggle');

        if ($dc)
        {
            $dc->id = $intId; // see #8043
        }

        $objVersions = new Versions('tl_led_categories', $intId);
        $objVersions->initialize();

        // Trigger the save_callback
        if (is_array($GLOBALS['TL_DCA']['tl_led_categories']['fields']['published']['save_callback']))
        {
            foreach ($GLOBALS['TL_DCA']['tl_led_categories']['fields']['published']['save_callback'] as $callback)
            {
                if (is_array($callback))
                {
                    $this->import($callback[0]);
                    $blnVisible = $this->{$callback[0]}->{$callback[1]}($blnVisible, ($dc ?: $this));
                }
                elseif (is_callable($callback))
                {
                    $blnVisible = $callback($blnVisible, ($dc ?: $this));
                }
            }
        }

        // Update the database
        $this->Database->prepare("UPDATE tl_led_categories SET tstamp=". time() .", published='" . ($blnVisible ? '1' : '') . "' WHERE id=?")
            ->execute($intId);

        $objVersions->create();

    }
}
