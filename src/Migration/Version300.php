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

namespace ContaoThemesNet\OddThemeBundle\Migration;

use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;

class Version300 extends AbstractMigration
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getName(): string
    {
        return 'Version 300 - ODD Theme';
    }

    /**
     * @throws Exception|\Doctrine\DBAL\Driver\Exception
     */
    public function shouldRun(): bool
    {
        $schemaManager = $this->connection->createSchemaManager();

        if (!$schemaManager->tablesExist(['tl_content'])) {
            return false;
        }

        if (!isset($schemaManager->listTableColumns('tl_content')['customtpl']) && !isset($schemaManager->listTableColumns('tl_content')['galleryTpl'])) {
            return false;
        }

        $test = $this->connection->fetchOne("SELECT id FROM tl_content WHERE customTpl = 'ce_image_headerimage_odd' OR galleryTpl = 'gallery_default_references' LIMIT 1");

        return false !== $test;
    }

    /**
     * @throws Exception|\Doctrine\DBAL\Driver\Exception
     */
    public function run(): MigrationResult
    {
        $this->connection->executeStatement("UPDATE tl_content SET customTpl = 'content_element/image/header_image_odd' WHERE customTpl = 'ce_image_headerimage_odd'");

        $this->connection->executeStatement("UPDATE tl_content SET customTpl = 'content_element/gallery/gallery_references', galleryTpl = '' WHERE galleryTpl = 'gallery_default_references'");

        return $this->createResult(true);
    }
}
