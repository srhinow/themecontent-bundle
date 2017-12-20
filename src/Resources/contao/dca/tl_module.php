<?php

/**
 * PHP version 5
 * @copyright  sr-tag.de 2011-2017
 * @author     Sven Rhinow
 * @package    invoice_and_offer
 * @license    LGPL
 * @filesource
 */

/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['led_series_list']  = '{title_legend},name,headline,type,jumpTo,fe_led_numberOfItems,perPage;{template_legend},fe_led_template;{expert_legend:hide},cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['led_serie_articles']  = '{title_legend},name,headline,type,jumpTo,fe_led_numberOfItems,perPage;{template_legend},fe_led_template;{expert_legend:hide},cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['led_serie_article_details']  = '{title_legend},name,headline,type;{template_legend},fe_led_template;{expert_legend:hide},cssID,space';

$GLOBALS['TL_DCA']['tl_module']['fields']['fe_led_template'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['fe_led_template'],
    'default'                 => 'bbk_default',
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => array('tl_module_led', 'getTemplates'),
    'eval'                    => array('tl_class'=>'w50'),
    'sql'					  => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['fe_led_numberOfItems'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['fe_led_numberOfItems'],
    'default'                 => 3,
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'w50'),
    'sql'					  => "smallint(5) unsigned NOT NULL default '0'"
);

/**
 * Class tl_module_led
 */
class tl_module_led extends Backend
{
    /**
     * Return all info templates as array
     * @param DataContainer
     * @return array
     */
    public function getTemplates(DataContainer $dc)
    {
        $intPid = $dc->activeRecord->pid;

        if ($this->Input->get('act') == 'overrideAll')
        {
            $intPid = $this->Input->get('id');
        }

        return $this->getTemplateGroup('agape_', $intPid);
    }
}

