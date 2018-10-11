<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\ShoppingListDataImport\Business\Model;

use Orm\Zed\Product\Persistence\SpyProductQuery;
use Orm\Zed\ShoppingList\Persistence\SpyShoppingListItemQuery;
use Spryker\Zed\DataImport\Business\Exception\EntityNotFoundException;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\ShoppingListDataImport\Business\Model\DataSet\ShoppingListItemDataSetInterface;

class ShoppingListItemWriterStep extends AbstractShoppingListDataImportStep implements DataImportStepInterface
{
    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet): void
    {
        $idShoppingList = $this->getIdShoppingListByKey(
            $dataSet[ShoppingListItemDataSetInterface::COLUMN_SHOPPING_LIST_KEY]
        );

        $sku = $dataSet[ShoppingListItemDataSetInterface::COLUMN_PRODUCT_SKU];
        $this->assureProductConcreteExists($sku);

        $shoppingListItemEntity = SpyShoppingListItemQuery::create()
            ->filterByFkShoppingList($idShoppingList)
            ->filterBySku($sku)
            ->findOneOrCreate();

        $shoppingListItemEntity
            ->setQuantity($dataSet[ShoppingListItemDataSetInterface::COLUMN_QUANTITY])
            ->save();
    }

    /**
     * @param string $sku
     *
     * @throws \Spryker\Zed\DataImport\Business\Exception\EntityNotFoundException
     *
     * @return void
     */
    protected function assureProductConcreteExists(string $sku): void
    {
        $isProductExists = SpyProductQuery::create()
            ->filterBySku($sku)
            ->exists();

        if (!$isProductExists) {
            throw new EntityNotFoundException(
                sprintf('Product with SKU "%s" was not found during data import.', $sku)
            );
        }
    }
}
