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

namespace ContaoThemesNet\OddThemeBundle\Migration;

use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Contao\Folder;
use Contao\System;

class InitialFilesFolderMigration extends AbstractMigration
{
    private ContaoFramework $contaoFramework;

    private string $filesFolder = 'files'.\DIRECTORY_SEPARATOR.'odd';
    private string $contaoFolder = 'vendor'.\DIRECTORY_SEPARATOR.'contao-themes-net'.\DIRECTORY_SEPARATOR.'odd-theme-bundle'.\DIRECTORY_SEPARATOR.'contao';

    public function __construct(ContaoFramework $contaoFramework)
    {
        $this->contaoFramework = $contaoFramework;
    }

    public function getName(): string
    {
        return 'Initial files folder migration - ODD Theme';
    }

    public function shouldRun(): bool
    {
        $this->contaoFramework->initialize();

        $rootDir = System::getContainer()->getParameter('kernel.project_dir');

        // If the folder exists we should do nothing
        if (file_exists($rootDir.\DIRECTORY_SEPARATOR.$this->filesFolder)) {
            return false;
        }

        return true;
    }

    public function run(): MigrationResult
    {
        // copy files and folders to files
        $folder = new Folder($this->contaoFolder.\DIRECTORY_SEPARATOR.$this->filesFolder);
        $folder->copyTo($this->filesFolder);

        return $this->createResult(true, 'Initial theme files where copied.');
    }
}
