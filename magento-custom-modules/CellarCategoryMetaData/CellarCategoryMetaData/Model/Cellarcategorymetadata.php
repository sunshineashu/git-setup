<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Northstar\CellarCategoryMetaData\Model;

use Magento\Framework\Model\AbstractModel;
use Northstar\CellarCategoryMetaData\Api\Data\CellarcategorymetadataInterface;

class Cellarcategorymetadata extends AbstractModel implements CellarcategorymetadataInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Northstar\CellarCategoryMetaData\Model\ResourceModel\Cellarcategorymetadata::class);
    }

    /**
     * @inheritDoc
     */
    public function getCellarcategorymetadataId()
    {
        return $this->getData(self::CELLARCATEGORYMETADATA_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCellarcategorymetadataId($cellarcategorymetadataId)
    {
        return $this->setData(self::CELLARCATEGORYMETADATA_ID, $cellarcategorymetadataId);
    }

    /**
     * @inheritDoc
     */
    public function getCustomwinecellaridId()
    {
        return $this->getData(self::CUSTOMWINECELLARID_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCustomwinecellaridId($customwinecellaridId)
    {
        return $this->setData(self::CUSTOMWINECELLARID_ID, $customwinecellaridId);
    }

    /**
     * @inheritDoc
     */
    public function getCategoryId()
    {
        return $this->getData(self::CATEGORY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCategoryId($categoryId)
    {
        return $this->setData(self::CATEGORY_ID, $categoryId);
    }

    /**
     * @inheritDoc
     */
    public function getCellarTitle()
    {
        return $this->getData(self::CELLAR_TITLE);
    }

    /**
     * @inheritDoc
     */
    public function setCellarTitle($cellarTitle)
    {
        return $this->setData(self::CELLAR_TITLE, $cellarTitle);
    }

    /**
     * @inheritDoc
     */
    public function getCellarDescription()
    {
        return $this->getData(self::CELLAR_DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function setCellarDescription($cellarDescription)
    {
        return $this->setData(self::CELLAR_DESCRIPTION, $cellarDescription);
    }

    /**
     * @inheritDoc
     */
    public function getCellarMainImage()
    {
        return $this->getData(self::CELLAR_MAIN_IMAGE);
    }

    /**
     * @inheritDoc
     */
    public function setCellarMainImage($cellarMainImage)
    {
        return $this->setData(self::CELLAR_MAIN_IMAGE, $cellarMainImage);
    }
}

