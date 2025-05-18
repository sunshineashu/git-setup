<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Northstar\CellarCategoryMetaData\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Cellarcategorymetadata extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('northstar_cellarcategorymetadata_cellarcategorymetadata', 'cellarcategorymetadata_id');
    }
}

