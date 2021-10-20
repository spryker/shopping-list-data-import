<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Zed\ShoppingListDataImport\Business\DataSet;

interface ShoppingListDataSetInterface
{
    /**
     * @var string
     */
    public const COLUMN_KEY = 'shopping_list_key';

    /**
     * @var string
     */
    public const COLUMN_NAME = 'name';

    /**
     * @var string
     */
    public const COLUMN_OWNER_CUSTOMER_REFERENCE = 'owner_customer_reference';
}
