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

namespace ContaoThemesNet\OddThemeBundle\Tests;

use ContaoThemesNet\OddThemeBundle\DependencyInjection\ContaoThemesNetOddThemeExtension;
use PHPUnit\Framework\TestCase;

class ContaoThemesNetOddThemeExtensionTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new ContaoThemesNetOddThemeExtension();

        $this->assertInstanceOf('ContaoThemesNet\OddThemeBundle\DependencyInjection\ContaoThemesNetOddThemeExtension', $bundle);
    }
}
