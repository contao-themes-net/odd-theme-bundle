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

namespace ContaoThemesNet\ThemeOddBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Configures the bundle.
 *
 * @author Philipp Seibt <seibt@pdir.de>
 */
class PdirThemeOddBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
