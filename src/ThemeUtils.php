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
use Contao\Input;
use Contao\StringUtil;
use Contao\System;

class ThemeUtils
{
    public static string $themeFolder = 'bundles/contaothemesnetoddtheme/';
    public static string $scssFolder = 'scss/';

    /**
     * @var array<string>
     */
    public static array $colors = [
        'blue_colors',
        'blue_colors_contrast',
        'grey_colors',
        'grey_colors_contrast',
        'green_colors',
        'green_colors_contrast',
        'yellow_colors_contrast',
        'red_colors_contrast',
    ];

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

        // Get session for theme switcher
        $session = System::getContainer()->get('request_stack')->getSession();

        // add stylesheets
        $combiner = new Combiner();
        $combiner->add(self::$themeFolder.'bootstrap/dist/css/bootstrap.min.css');

        // Check for v2 or use old stylesheets
        if ($isV2 = file_exists(self::getRootDir().'/files/odd/.v2') && null === $theme) {
            if ('WIN' === strtoupper(substr(PHP_OS, 0, 3))) {
                $combiner->add(self::$scssFolder.'v2/odd_win.scss');
            } else {
                $combiner->add(self::$scssFolder.'v2/odd.scss');
            }
        } else {
            if ('WIN' === strtoupper(substr(PHP_OS, 0, 3))) {
                $combiner->add(self::$scssFolder.'odd_win.scss');
            } else {
                $combiner->add(self::$scssFolder.'odd.scss');
            }
        }

        $request = System::getContainer()->get('request_stack')->getCurrentRequest();

        // Execute code only in preview mode
        if ($request->attributes->get('_preview')) {
            if ('reset' === Input::get('theme-color')) {
                $session->set('odd_color', null);
            }

            if (Input::get('theme-color') && \in_array(Input::get('theme-color'), self::$colors, true)) {
                $session->set('odd_color', Input::get('theme-color'));
            }

            if ($isV2 && $session->get('odd_color') && null !== $session->get('odd_color')) {
                $combiner->add(self::$scssFolder.'v2/_odd_variables.scss');
                $combiner->add(self::$scssFolder.'v2/color_schemes/odd_'.$session->get('odd_color').'.scss');
            }
        }

        return $combiner->getCombinedFile();
    }
}
