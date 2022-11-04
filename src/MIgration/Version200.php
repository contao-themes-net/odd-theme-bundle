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
        return 'Version 200 - ODD Theme';
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

        $test = $this->connection->fetchOne("
            SELECT 
                id 
            FROM 
                tl_layout
            WHERE 
                template = 'fe_bootstrap_odd' 
            LIMIT 1
        ");

        return false !== $test;
    }

    /**
     * @throws Exception|\Doctrine\DBAL\Driver\Exception
     */
    public function run(): MigrationResult
    {
        $this->connection->executeStatement("
            UPDATE 
                tl_layout
            SET 
                template = 'fe_page_odd' 
            WHERE 
                template = 'fe_bootstrap_odd'
                OR cssClass LIKE ''
        ");

        $this->connection->executeStatement("
            UPDATE 
                tl_layout
            SET 
                template = 'fe_page_odd_left' 
            WHERE 
                template = 'fe_bootstrap_odd'
                OR cssClass LIKE '%left-col-layout%'
        ");

        $this->connection->executeStatement("
            UPDATE 
                tl_layout
            SET 
                template = 'fe_page_odd_right' 
            WHERE 
                template = 'fe_bootstrap_odd'
                OR cssClass LIKE '%right-col-layout%'
        ");

        $this->connection->executeStatement("
            UPDATE 
                tl_layout
            SET 
                template = 'fe_page_odd_three_columns' 
            WHERE 
                template = 'fe_bootstrap_odd'
                OR cssClass LIKE '%left-right-col-layout%'
        ");

        return $this->createResult(true);
    }
}
