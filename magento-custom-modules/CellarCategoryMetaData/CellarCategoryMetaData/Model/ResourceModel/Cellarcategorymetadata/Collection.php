<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Northstar\CellarCategoryMetaData\Model\ResourceModel\Cellarcategorymetadata;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'cellarcategorymetadata_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Northstar\CellarCategoryMetaData\Model\Cellarcategorymetadata::class,
            \Northstar\CellarCategoryMetaData\Model\ResourceModel\Cellarcategorymetadata::class
        );
    }
}

