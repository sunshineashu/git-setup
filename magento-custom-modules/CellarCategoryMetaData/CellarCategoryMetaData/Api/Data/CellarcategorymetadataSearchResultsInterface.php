<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Northstar\CellarCategoryMetaData\Api\Data;

interface CellarcategorymetadataSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get cellarcategorymetadata list.
     * @return \Northstar\CellarCategoryMetaData\Api\Data\CellarcategorymetadataInterface[]
     */
    public function getItems();

    /**
     * Set customwinecellarid_id list.
     * @param \Northstar\CellarCategoryMetaData\Api\Data\CellarcategorymetadataInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

