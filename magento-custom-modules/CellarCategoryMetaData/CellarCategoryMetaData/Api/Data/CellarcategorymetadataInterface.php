<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Northstar\CellarCategoryMetaData\Api\Data;

interface CellarcategorymetadataInterface
{

    const CATEGORY_ID = 'category_id';
    const CELLAR_TITLE = 'cellar_title';
    const CELLAR_DESCRIPTION = 'cellar_description';
    const CUSTOMWINECELLARID_ID = 'customwinecellarid_id';
    const CELLARCATEGORYMETADATA_ID = 'cellarcategorymetadata_id';
    const CELLAR_MAIN_IMAGE = 'cellar_main_image';

    /**
     * Get cellarcategorymetadata_id
     * @return string|null
     */
    public function getCellarcategorymetadataId();

    /**
     * Set cellarcategorymetadata_id
     * @param string $cellarcategorymetadataId
     * @return \Northstar\CellarCategoryMetaData\Cellarcategorymetadata\Api\Data\CellarcategorymetadataInterface
     */
    public function setCellarcategorymetadataId($cellarcategorymetadataId);

    /**
     * Get customwinecellarid_id
     * @return string|null
     */
    public function getCustomwinecellaridId();

    /**
     * Set customwinecellarid_id
     * @param string $customwinecellaridId
     * @return \Northstar\CellarCategoryMetaData\Cellarcategorymetadata\Api\Data\CellarcategorymetadataInterface
     */
    public function setCustomwinecellaridId($customwinecellaridId);

    /**
     * Get category_id
     * @return string|null
     */
    public function getCategoryId();

    /**
     * Set category_id
     * @param string $categoryId
     * @return \Northstar\CellarCategoryMetaData\Cellarcategorymetadata\Api\Data\CellarcategorymetadataInterface
     */
    public function setCategoryId($categoryId);

    /**
     * Get cellar_title
     * @return string|null
     */
    public function getCellarTitle();

    /**
     * Set cellar_title
     * @param string $cellarTitle
     * @return \Northstar\CellarCategoryMetaData\Cellarcategorymetadata\Api\Data\CellarcategorymetadataInterface
     */
    public function setCellarTitle($cellarTitle);

    /**
     * Get cellar_description
     * @return string|null
     */
    public function getCellarDescription();

    /**
     * Set cellar_description
     * @param string $cellarDescription
     * @return \Northstar\CellarCategoryMetaData\Cellarcategorymetadata\Api\Data\CellarcategorymetadataInterface
     */
    public function setCellarDescription($cellarDescription);

    /**
     * Get cellar_main_image
     * @return string|null
     */
    public function getCellarMainImage();

    /**
     * Set cellar_main_image
     * @param string $cellarMainImage
     * @return \Northstar\CellarCategoryMetaData\Cellarcategorymetadata\Api\Data\CellarcategorymetadataInterface
     */
    public function setCellarMainImage($cellarMainImage);
}

