<?php

declare(strict_types=1);

/*
 * pdir theme odd bundle for Contao Open Source CMS
 *
 * Copyright (C) 2022 pdir / digital agentur <develop@pdir.de>
 *
 * @package    theme odd bundle
 * @link       https://github.com/contao-themes-net/odd-theme-bundle
 * @license    pdir contao theme licence
 * @author     pdir GmbH <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ContaoThemesNet\ThemeOddBundle\Module;

use Contao\BackendModule;
use Contao\File;
use Contao\Folder;
use Contao\Input;
use ContaoThemesNet\ThemeOddBundle\ThemeUtils;

class OddThemeSetup extends BackendModule
{
    public const VERSION = '2.0.3';

    protected $strTemplate = 'be_oddtheme_setup';

    /**
     * Generate the module.
     */
    protected function compile(): void
    {
        switch (Input::get('act')) {
            case 'syncFolder':
                $path = sprintf(
                    '%s/%s/bundles/pdirthemeodd',
                    ThemeUtils::getRootDir(),
                    ThemeUtils::getWebDir()
                );

                if (!file_exists('files/odd')) {
                    new Folder('files/odd');
                }
                $this->getFiles($path);
                $this->getSqlFiles(ThemeUtils::getRootDir().'/vendor/contao-themes-net/odd-theme-bundle/src/templates');
                $this->Template->message = true;
                $this->Template->version = self::VERSION;
                $this->import('Automator');
                $this->Automator->purgeInternalCache();
                $this->Automator->generateInternalCache();
                break;

            case 'truncateTlFiles':
                $this->import('Database');
                $this->Database->prepare('TRUNCATE tl_files')->execute();
                $this->Template->messageTruncate = true;
                $this->Template->version = self::VERSION;
                break;

            default:
                $this->Template->version = self::VERSION;
        }
    }

    protected function getFiles($path): void
    {
        foreach (scan($path) as $dir) {
            if (!is_dir($path.'/'.$dir)) {
                $pos = strpos($path, 'pdirthemeodd');
                $filesFolder = 'files/odd'.str_replace('pdirthemeodd', '', substr($path, $pos)).'/'.$dir;

                if ('_odd_variables.scss' !== $dir && '_odd_colors.scss' !== $dir && 'backend.css' !== $dir && 'odd.scss' !== $dir && 'responsive.scss' !== $dir && 'maklermodul.scss' !== $dir && 'odd_win.scss' !== $dir && 'style.scss' !== $dir) {
                    if (!file_exists(ThemeUtils::getRootDir().'/'.$filesFolder)) {
                        $objFile = new File(ThemeUtils::getWebDir().'/bundles/'.substr($path, $pos).'/'.$dir, true);
                        $objFile->copyTo($filesFolder);
                    }
                }
            } else {
                $folder = $path.'/'.$dir;
                $pos = strpos($path, 'pdirthemeodd');
                $filesFolder = 'files/odd'.str_replace('pdirthemeodd', '', substr($path, $pos)).'/'.$dir;

                if ('fonts' !== $dir && 'js' !== $dir && 'bootstrap' !== $dir && 'fontawesome' !== $dir && 'color_schemes' !== $dir && 'parts' !== $dir) {
                    if (!file_exists($filesFolder)) {
                        new \Folder($filesFolder);
                    }
                    $this->getFiles($folder);
                }
            }
        }
    }

    protected function getSqlFiles($path): void
    {
        foreach (scan($path) as $dir) {
            if (!is_dir($path.'/'.$dir)) {
                $pos = strpos($path, '/vendor');
                $filesFolder = 'templates/'.$dir;
                $objFile = new \File(substr($path, $pos).'/'.$dir, true);
                $objFile->copyTo($filesFolder);
            }
        }
    }
}
