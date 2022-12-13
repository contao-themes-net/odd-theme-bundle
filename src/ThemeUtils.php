<?php

namespace ContaoThemesNet\ThemeOddBundle;

use Contao\Combiner;
use Contao\File;
use Contao\System;
use Contao\StringUtil;

class ThemeUtils
{
    public static function getRootDir() {
        return System::getContainer()->getParameter('kernel.project_dir');
    }

    public static function getWebDir() {
        return StringUtil::stripRootDir(System::getContainer()->getParameter('contao.web_dir'));
    }

    public static function getCombinedStylesheet() {

        // add stylesheets
        $combiner = new Combiner();
        $combiner->add('bundles/pdirthemeodd/bootstrap/dist/css/bootstrap.min.css');
        $combiner->add('bundles/pdirthemeodd/scss/odd.scss');

        return $combiner->getCombinedFile();
    }
}
