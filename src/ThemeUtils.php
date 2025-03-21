<?php

declare(strict_types=1);

/*
 * pdir theme odd bundle for Contao Open Source CMS
 *
 * Copyright (C) 2025 pdir / digital agentur <develop@pdir.de>
 *
 * @package    theme odd bundle
 * @link       https://github.com/contao-themes-net/odd-theme-bundle
 * @license    pdir contao theme licence
 * @author     pdir GmbH <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ContaoThemesNet\OddThemeBundle;

use Contao\Combiner;
use Contao\StringUtil;
use Contao\System;

class ThemeUtils
{
    public static string $themeFolder = 'bundles/contaothemesnetoddtheme/';
    public static string $scssFolder = 'scss/';

    public static function getRootDir(): string
    {
        return System::getContainer()->getParameter('kernel.project_dir');
    }

    public static function getWebDir(): string
    {
        return StringUtil::stripRootDir(System::getContainer()->getParameter('contao.web_dir'));
    }

    public static function getCombinedStylesheet(null|bool|string $theme = null): string
    {
        self::$scssFolder = self::$themeFolder.self::$scssFolder;

        // for multi domain setup
        if (null !== $theme) {
            self::$scssFolder .= 'files/odd/scss/'.$theme.'/';
        }

        // add stylesheets
        $combiner = new Combiner();
        $combiner->add(self::$themeFolder.'bootstrap/dist/css/bootstrap.min.css');

        if ('WIN' === strtoupper(substr(PHP_OS, 0, 3))) {
            $combiner->add(self::$scssFolder.'odd_win.scss');
        } else {
            $combiner->add(self::$scssFolder.'odd.scss');
        }

        return $combiner->getCombinedFile();
    }
}
