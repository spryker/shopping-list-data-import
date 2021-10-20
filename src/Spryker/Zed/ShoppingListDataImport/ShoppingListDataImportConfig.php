<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\ShoppingListDataImport;

use Generated\Shared\Transfer\DataImporterConfigurationTransfer;
use Spryker\Zed\DataImport\DataImportConfig;

class ShoppingListDataImportConfig extends DataImportConfig
{
    /**
     * @var string
     */
    public const IMPORT_TYPE_SHOPPING_LIST = 'shopping-list';

    /**
     * @var string
     */
    public const IMPORT_TYPE_SHOPPING_LIST_ITEM = 'shopping-list-item';

    /**
     * @var string
     */
    public const IMPORT_TYPE_SHOPPING_LIST_COMPANY_USER = 'shopping-list-company-user';

    /**
     * @var string
     */
    public const IMPORT_TYPE_SHOPPING_LIST_COMPANY_BUSINESS_UNIT = 'shopping-list-company-business-unit';

    /**
     * @api
     *
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getShoppingListDataImporterConfiguration(): DataImporterConfigurationTransfer
    {
        $moduleDataImportDirectory = $this->getModuleRoot() . 'data' . DIRECTORY_SEPARATOR . 'import' . DIRECTORY_SEPARATOR;

        return $this->buildImporterConfiguration(
            $moduleDataImportDirectory . 'shopping_list.csv',
            static::IMPORT_TYPE_SHOPPING_LIST,
        );
    }

    /**
     * @api
     *
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getShoppingListItemDataImporterConfiguration(): DataImporterConfigurationTransfer
    {
        $moduleDataImportDirectory = $this->getModuleRoot() . 'data' . DIRECTORY_SEPARATOR . 'import' . DIRECTORY_SEPARATOR;

        return $this->buildImporterConfiguration(
            $moduleDataImportDirectory . 'shopping_list_item.csv',
            static::IMPORT_TYPE_SHOPPING_LIST_ITEM,
        );
    }

    /**
     * @api
     *
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getShoppingListCompanyUserDataImporterConfiguration(): DataImporterConfigurationTransfer
    {
        $moduleDataImportDirectory = $this->getModuleRoot() . 'data' . DIRECTORY_SEPARATOR . 'import' . DIRECTORY_SEPARATOR;

        return $this->buildImporterConfiguration(
            $moduleDataImportDirectory . 'shopping_list_company_user.csv',
            static::IMPORT_TYPE_SHOPPING_LIST_COMPANY_USER,
        );
    }

    /**
     * @api
     *
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getShoppingListCompanyBusinessUnitDataImporterConfiguration(): DataImporterConfigurationTransfer
    {
        $moduleDataImportDirectory = $this->getModuleRoot() . 'data' . DIRECTORY_SEPARATOR . 'import' . DIRECTORY_SEPARATOR;

        return $this->buildImporterConfiguration(
            $moduleDataImportDirectory . 'shopping_list_company_business_unit.csv',
            static::IMPORT_TYPE_SHOPPING_LIST_COMPANY_BUSINESS_UNIT,
        );
    }

    /**
     * @return string
     */
    protected function getModuleRoot(): string
    {
        $moduleRoot = realpath(
            __DIR__
            . DIRECTORY_SEPARATOR . '..'
            . DIRECTORY_SEPARATOR . '..'
            . DIRECTORY_SEPARATOR . '..'
            . DIRECTORY_SEPARATOR . '..',
        );

        return $moduleRoot . DIRECTORY_SEPARATOR;
    }
}
