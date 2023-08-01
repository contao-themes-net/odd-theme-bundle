<?php

declare(strict_types=1);

namespace ContaoThemesNet\ThemeOddBundle;

use Contao\Combiner;
use Contao\File;
use Contao\System;
use Contao\StringUtil;

class ThemeUtils
{
    static $scssFolder = 'bundles/pdirthemeodd/scss/';

    public static function getRootDir()
    {
        return System::getContainer()->getParameter('kernel.project_dir');
    }

    public static function getWebDir()
    {
        return StringUtil::stripRootDir(System::getContainer()->getParameter('contao.web_dir'));
    }

    public static function getCombinedStylesheet($theme = null): string
    {
        // for multi domain setup
        if (null !== $theme) {
            self::$scssFolder = 'files/odd/scss/'.$theme.'/';
        }

        // add stylesheets
        $combiner = new Combiner();
        $combiner->add('bundles/pdirthemeodd/bootstrap/dist/css/bootstrap.min.css');
        $combiner->add(self::$scssFolder.'odd.scss');

        return $combiner->getCombinedFile();
    }
}
