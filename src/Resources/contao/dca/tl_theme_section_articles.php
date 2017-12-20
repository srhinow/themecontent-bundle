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
 * Table tl_led_serie_articles
 */
$GLOBALS['TL_DCA']['tl_led_serie_articles'] = array
(

    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'ptable'                      => 'tl_led_series',
        'enableVersioning'            => true,
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary',
                'pid' => 'index',
            )
        )
    ),
    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'                    => 2,
            'fields'                  => array('pid'),
            'flag'					  => 1,
            'panelLayout'             => 'filter;sort,search,limit'
        ),
        'label' => array
        (
            'fields'                  => array('name'),
            'format'                  => '%s',
            'label_callback'		  => array('tl_led_serie_articles', 'listEntries')
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'onclick="Backend.getScrollOffset();"',
            )
        ),
        'operations' => array
        (
            'edit' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.gif',
            ),
            'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['copy'],
                'href'                => 'act=copy',
                'icon'                => 'copy.gif',
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"',
            ),
            'toggle' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['toggle'],
                'icon'                => 'visible.gif',
                'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
                'button_callback'     => array('tl_led_serie_articles', 'toggleIcon')
            ),
//            'show' => array
//            (
//                'label'               => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['show'],
//                'href'                => 'act=show',
//                'icon'                => 'show.gif',
//            )
        )
    ),
    // Palettes
    'palettes' => array
    (
        '__selector__'                => array('addImage'),
        'default' => '{data_legend},name,alias,category,size,viewing_angle,circuit_substrate,forward_current_typ,forward_current_max,forward_current_pulsed,thermal_resistance,color,wavelength_from,wavelength_to,fwhm,chip_material,radiant_intensity,output_power;{download_legend},datasheet,rayfile,reach_rohs;{image_legend:hide},addImage;{seo_legend},seo_title,seo_keywords,seo_description;{extend_legend:hide},published'
    ),
    // Subpalettes
    'subpalettes' => array
    (
        'addImage'                    => 'image,alt',
//        'published'                   => 'start,stop'
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
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['category'],
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'tstamp' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'modify' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'sorting' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'",
        ),
        'name' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['name'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'alias' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['alias'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'alnum', 'doNotCopy'=>true, 'spaceToUnderscore'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
            'save_callback' => array
            (
                array('tl_led_serie_articles', 'generateAlias')
            ),
            'sql'                     => "varchar(128) NOT NULL default ''"
        ),
        'category' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['category'],
            'foreignKey'              => 'tl_led_serie_categories.name',
            'exclude'                 => false,
            'filter'                  => false,
            'sorting'                  => true,
            'inputType'               => 'select',
            'options_callback'        => array('tl_led_serie_articles', 'getCategoryOptions'),
//            'foreignKey'              => 'tl_led_serie_categories.name',
            'eval'                    => array('mandatory'=>true, 'chosen'=>true, 'tl_class'=>'clr'),
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'size' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['size'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'viewing_angle' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['viewing_angle'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'circuit_substrate' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['circuit_substrate'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'forward_current_typ' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['forward_current_typ'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
       'forward_current_max' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['forward_current_max'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'forward_current_pulsed' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['forward_current_pulsed'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'thermal_resistance' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['thermal_resistance'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'color' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['color'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'wavelength_from' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['wavelength_from'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'wavelength_to' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['wavelength_to'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'fwhm' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['fwhm'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'chip_material' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['chip_material'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'radiant_intensity' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['radiant_intensity'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'output_power' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['output_power'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'decodeEntities'=>true, 'tl_class'=>'w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'datasheet' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['datasheet'],
            'exclude'                 => true,
            'inputType'               => 'fileTree',
            'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'mandatory'=>false, 'tl_class'=>'clr','extensions'=> Config::get('allowedDownload'), 'isDownloads'=>true),
            'sql'                     => "binary(16) NULL"
        ),
        'rayfile' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['rayfile'],
            'exclude'                 => true,
            'inputType'               => 'fileTree',
            'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'mandatory'=>false, 'tl_class'=>'clr','extensions'=> Config::get('allowedDownload'), 'isDownloads'=>true),
            'sql'                     => "binary(16) NULL"
        ),
        'reach_rohs' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['reach_rohs'],
            'exclude'                 => true,
            'inputType'               => 'fileTree',
            'eval'                    => array('multiple'=>true, 'fieldType'=>'checkbox', 'orderField'=>'orderSRC', 'files'=>true, 'mandatory'=>false, 'tl_class'=>'clr','extensions'=> Config::get('allowedDownload'), 'isDownloads'=>true ),
            'sql'                     => "blob NULL",
        ),
        'orderSRC' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['orderSRC'],
            'sql'                     => "blob NULL"
        ),
        'addImage' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['addImage'],
            'exclude'                 => true,
            'filter'                  => true,
            'sorting'                 => true,
            'inputType'               => 'checkbox',
            'eval'                    => array('submitOnChange'=>true),
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'image' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['image'],
            'exclude'                 => true,
            'inputType'               => 'fileTree',
            'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'mandatory'=>true, 'tl_class'=>'clr'),
            'sql'                     => "binary(16) NULL"
        ),
        'alt' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['alt'],
            'exclude'                 => true,
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('maxlength'=>255, 'tl_class'=>'long'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'published' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['published'],
            'filter'                  => true,
            'sorting'                 => true,
            'inputType'               => 'checkbox',
            'flag'                    => 11,
            'sql'                     => "char(1) NOT NULL default ''"
        ),
        'seo_title' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['seo_title'],
            'exclude'                 => true,
            'inputType'               => 'text',
            'search'                  => true,
            'eval'                    => array('decodeEntities'=>true, 'maxlength'=>255,'tl_class'=>'long clr'),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'seo_keywords' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['seo_keywords'],
            'exclude'                 => true,
            'inputType'               => 'textarea',
            'search'                  => true,
            'eval'                    => array('style'=>'height:60px', 'decodeEntities'=>true),
            'sql'                     => "text NULL"
        ),
        'seo_description' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_led_serie_articles']['seo_description'],
            'exclude'                 => true,
            'inputType'               => 'textarea',
            'search'                  => true,
            'eval'                    => array('style'=>'height:60px', 'decodeEntities'=>true, 'maxlength'=>180,'tl_class'=>'clr'),
            'sql'                     => "varchar(180) NOT NULL default ''"
        )
    )
);


/**
 * Class tl_led_serie_articles
 */
class tl_led_serie_articles extends Backend
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
     * @param $varValue
     * @param DataContainer $dc
     * @return string
     * @throws Exception
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

        $objAlias = $this->Database->prepare("SELECT id FROM tl_led_serie_articles WHERE id=? OR alias=?")
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
     * get all categories to current series
     * @param object
     * @return array
     */
    public function getCategoryOptions(\DataContainer $dc)
    {
        //fallback
        $varValue= array();

        $objCategories = LedSerieCategoriesModel::findPublishedByPid($dc->activeRecord->pid);
        if(is_object($objCategories)) while($objCategories->next())
        {
            $varValue[$objCategories->id] =  $objCategories->name;
        }
        return $varValue;
    }

    /**
     * Return the link picker wizard
     *
     * @param DataContainer $dc
     *
     * @return string
     */
    public function pagePicker(DataContainer $dc)
    {
        return ' <a href="' . (($dc->value == '' || strpos($dc->value, '{{link_url::') !== false) ? 'contao/page.php' : 'contao/file.php') . '?do=' . Input::get('do') . '&amp;table=' . $dc->table . '&amp;field=' . $dc->field . '&amp;value=' . rawurlencode(str_replace(array('{{link_url::', '}}'), '', $dc->value)) . '&amp;switch=1' . '" title="' . specialchars($GLOBALS['TL_LANG']['MSC']['pagepicker']) . '" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':768,\'title\':\'' . specialchars(str_replace("'", "\\'", $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['label'][0])) . '\',\'url\':this.href,\'id\':\'' . $dc->field . '\',\'tag\':\'ctrl_'. $dc->field . ((Input::get('act') == 'editAll') ? '_' . $dc->id : '') . '\',\'self\':this});return false">' . Image::getHtml('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top;cursor:pointer"') . '</a>';
    }

    public function convertImagePath()
    {
        $dwlObj = $this->Database->prepare('SELECT * FROM `tl_led_serie_articles`')->execute();

        if($dwlObj->numRows > 0)
        {
            while($dwlObj->next())
            {
                if($dwlObj->file !== NULL) continue;
                $strFile = $dwlObj->dl_url;
                $objFile = \FilesModel::findByPath($strFile);

                // Existing file is being replaced (see #4818)
                if ($objFile !== null)
                {

                    $objFile->tstamp = time();
                    $objFile->path   = $strFile;
                    $objFile->hash   = md5_file(TL_ROOT . '/' . $strFile);
                    $objFile->save();

                    $strUuid = $objFile->uuid;
                }
                else
                {
                    $strUuid = \Dbafs::addResource($strFile)->uuid;
                }

                $set = array('file' => $strUuid);
                $this->Database->prepare('UPDATE `tl_led_serie_articles` %s WHERE `id`=?')->set($set)->execute($dwlObj->id);
            }
        }
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
        if (!$this->User->hasAccess('tl_led_serie_articles::published', 'alexf'))
        {
            return '';
        }

        $href .= '&amp;tid='.$row['id'].'&amp;state='.($row['published'] ? '' : 1);

        if (!$row['published'])
        {
            $icon = 'invisible.gif';
        }

        return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.Image::getHtml($icon, $label, 'data-state="' . ($row['published'] ? 1 : 0) . '"').'</a> ';
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
        Input::setGet('id', $intId);
        Input::setGet('act', 'toggle');

        if ($dc)
        {
            $dc->id = $intId; // see #8043
        }

        $objVersions = new Versions('tl_led_serie_articles', $intId);
        $objVersions->initialize();

        // Trigger the save_callback
        if (is_array($GLOBALS['TL_DCA']['tl_led_serie_articles']['fields']['published']['save_callback']))
        {
            foreach ($GLOBALS['TL_DCA']['tl_led_serie_articles']['fields']['published']['save_callback'] as $callback)
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
        $this->Database->prepare("UPDATE tl_led_serie_articles SET tstamp=". time() .", published='" . ($blnVisible ? '1' : '') . "' WHERE id=?")
            ->execute($intId);

        $objVersions->create();

    }
}
