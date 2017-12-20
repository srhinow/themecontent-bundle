<?php

/**
 * @copyright  Sven Rhinow 2017 <https://www.sr-tag.de>
 * @author     Sven Rhinow
 * @package    ThemecontentBundle
 * @license    LGPL-3.0+
 * @see	       https://github.com/srhinow/themecontent-bundle
 *
 */

namespace Srhinow\ThemecontentBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

use Srhinow\ThemecontentBundle\SrhinowThemecontentBundle;

/**
 * Plugin for the Contao Manager.
 *
 * @author Sven Rhinow
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(SrhinowThemecontentBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class])
        ];
    }
}
