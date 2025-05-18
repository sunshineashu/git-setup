<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Northstar\CellarCategoryMetaData\Model\Cellarcategorymetadata;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Northstar\CellarCategoryMetaData\Model\ResourceModel\Cellarcategorymetadata\CollectionFactory;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @inheritDoc
     */
    protected $collection;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        // Fetch items from collection
        $items = $this->collection->getItems();

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $mediaUrl = $objectManager->create(\Magento\Store\Model\StoreManagerInterface::class)->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);

        // Loop through each item and handle the image
        foreach ($items as $model) {
            // Check if there's an image (cellar_main_image)
            if ($model->getCellarMainImage()) { 
                $image = [];
                $image[0]['name'] = $model->getCellarMainImage(); // Image name stored in the model
                $fileSystem = $objectManager->create('\Magento\Framework\Filesystem');
                $mediaPath = $fileSystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA)->getAbsolutePath();

                // Check if the image exists in the media directory
                if (file_exists($mediaPath . 'cellarcategorymetadata/images/' . $model->getCellarMainImage())) {
                    $image[0]['url'] = $mediaUrl . 'cellarcategorymetadata/images/' . $model->getCellarMainImage();
                } else {
                    $image[0]['url'] = $model->getCellarMainImage(); // If the image doesn't exist, use the fallback URL
                }

                $model['cellar_main_image'] = $image;
            }

            // Add the model data to loadedData
            $this->loadedData[$model->getId()] = $model->getData();
        }

        // Persist data for form repopulation if necessary
        $data = $this->dataPersistor->get('northstar_cellarcategorymetadata_cellarcategorymetadata');
        
        if (!empty($data)) {
            $model = $this->collection->getNewEmptyItem();
            $model->setData($data);
            $this->loadedData[$model->getId()] = $model->getData();
            $this->dataPersistor->clear('northstar_cellarcategorymetadata_cellarcategorymetadata');
        }
        
        return $this->loadedData;
    }
}
