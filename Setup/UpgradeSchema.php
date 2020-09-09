<?php

namespace LizardMedia\ProductAttachment\Setup;

use LizardMedia\ProductAttachment\Model\Attachment;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $connection = $installer->getConnection();
        if (version_compare($context->getVersion(), '1.4.1', '<')) {
            $connection->addColumn(
                $installer->getTable(Attachment::MAIN_TABLE),
                Attachment::ATTACHMENT_CATEGORY,
                [
                    'type' => Table::TYPE_INTEGER,
                    'length' => 1000,
                    'nullable' => true,
                    'default' => NULL,
                    'comment' => 'Attachment Category'
                ]);
        }
        $installer->endSetup();
    }

}