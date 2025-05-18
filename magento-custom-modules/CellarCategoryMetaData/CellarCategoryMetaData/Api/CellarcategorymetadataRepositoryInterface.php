<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Northstar\CellarCategoryMetaData\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CellarcategorymetadataRepositoryInterface
{

    /**
     * Save cellarcategorymetadata
     * @param \Northstar\CellarCategoryMetaData\Api\Data\CellarcategorymetadataInterface $cellarcategorymetadata
     * @return \Northstar\CellarCategoryMetaData\Api\Data\CellarcategorymetadataInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Northstar\CellarCategoryMetaData\Api\Data\CellarcategorymetadataInterface $cellarcategorymetadata
    );

    /**
     * Retrieve cellarcategorymetadata
     * @param string $cellarcategorymetadataId
     * @return \Northstar\CellarCategoryMetaData\Api\Data\CellarcategorymetadataInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($cellarcategorymetadataId);

    /**
     * Retrieve cellarcategorymetadata matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Northstar\CellarCategoryMetaData\Api\Data\CellarcategorymetadataSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete cellarcategorymetadata
     * @param \Northstar\CellarCategoryMetaData\Api\Data\CellarcategorymetadataInterface $cellarcategorymetadata
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Northstar\CellarCategoryMetaData\Api\Data\CellarcategorymetadataInterface $cellarcategorymetadata
    );

    /**
     * Delete cellarcategorymetadata by ID
     * @param string $cellarcategorymetadataId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($cellarcategorymetadataId);
}

