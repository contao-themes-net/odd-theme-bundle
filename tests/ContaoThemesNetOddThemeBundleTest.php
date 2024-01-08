<?php

declare(strict_types=1);

/*
 * pdir theme odd bundle for Contao Open Source CMS
 *
 * Copyright (C) 2024 pdir / digital agentur <develop@pdir.de>
 *
 * @package    theme odd bundle
 * @link       https://github.com/contao-themes-net/odd-theme-bundle
 * @license    pdir contao theme licence
 * @author     pdir GmbH <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ContaoThemesNet\OddThemeBundle\Tests;

use ContaoThemesNet\OddThemeBundle\ContaoThemesNetOddThemeBundle;
use PHPUnit\Framework\TestCase;

class ContaoThemesNetOddThemeBundleTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new ContaoThemesNetOddThemeBundle();

        $this->assertInstanceOf('ContaoThemesNet\OddThemeBundle\ContaoThemesNetOddThemeBundle', $bundle);
    }
}
