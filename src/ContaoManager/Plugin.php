<?php
/**
 * pdir theme odd bundle for Contao Open Source CMS
 *
 * Copyright (C) 2018 pdir / digital agentur <develop@pdir.de>
 *
 * @package    theme odd bundle
 * @link       https://pdir.de
 * @license    pdir license - All-rights-reserved - commercial extension
 * @author     pdir GmbH <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ContaoThemesNet\ThemeOddBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use ContaoThemesNet\ThemeOddBundle\PdirThemeOddBundle;

class Plugin implements BundlePluginInterface
{
	/**
	 * {@inheritdoc}
	 */
	public function getBundles(ParserInterface $parser)
	{
		return [
			BundleConfig::create(PdirThemeOddBundle::class)
				->setLoadAfter([
                    ContaoCoreBundle::class
                ]),
		];
	}
}
