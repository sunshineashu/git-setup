<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Northstar\CellarCategoryMetaData\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Northstar\CellarCategoryMetaData\Api\CellarcategorymetadataRepositoryInterface;
use Northstar\CellarCategoryMetaData\Api\Data\CellarcategorymetadataInterface;
use Northstar\CellarCategoryMetaData\Api\Data\CellarcategorymetadataInterfaceFactory;
use Northstar\CellarCategoryMetaData\Api\Data\CellarcategorymetadataSearchResultsInterfaceFactory;
use Northstar\CellarCategoryMetaData\Model\ResourceModel\Cellarcategorymetadata as ResourceCellarcategorymetadata;
use Northstar\CellarCategoryMetaData\Model\ResourceModel\Cellarcategorymetadata\CollectionFactory as CellarcategorymetadataCollectionFactory;

class CellarcategorymetadataRepository implements CellarcategorymetadataRepositoryInterface
{

    /**
     * @var CellarcategorymetadataCollectionFactory
     */
    protected $cellarcategorymetadataCollectionFactory;

    /**
     * @var ResourceCellarcategorymetadata
     */
    protected $resource;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var Cellarcategorymetadata
     */
    protected $searchResultsFactory;

    /**
     * @var CellarcategorymetadataInterfaceFactory
     */
    protected $cellarcategorymetadataFactory;


    /**
     * @param ResourceCellarcategorymetadata $resource
     * @param CellarcategorymetadataInterfaceFactory $cellarcategorymetadataFactory
     * @param CellarcategorymetadataCollectionFactory $cellarcategorymetadataCollectionFactory
     * @param CellarcategorymetadataSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceCellarcategorymetadata $resource,
        CellarcategorymetadataInterfaceFactory $cellarcategorymetadataFactory,
        CellarcategorymetadataCollectionFactory $cellarcategorymetadataCollectionFactory,
        CellarcategorymetadataSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->cellarcategorymetadataFactory = $cellarcategorymetadataFactory;
        $this->cellarcategorymetadataCollectionFactory = $cellarcategorymetadataCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(
        CellarcategorymetadataInterface $cellarcategorymetadata
    ) {
        try {
            $this->resource->save($cellarcategorymetadata);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the cellarcategorymetadata: %1',
                $exception->getMessage()
            ));
        }
        return $cellarcategorymetadata;
    }

    /**
     * @inheritDoc
     */
    public function get($cellarcategorymetadataId)
    {
        $cellarcategorymetadata = $this->cellarcategorymetadataFactory->create();
        $this->resource->load($cellarcategorymetadata, $cellarcategorymetadataId);
        if (!$cellarcategorymetadata->getId()) {
            throw new NoSuchEntityException(__('cellarcategorymetadata with id "%1" does not exist.', $cellarcategorymetadataId));
        }
        return $cellarcategorymetadata;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->cellarcategorymetadataCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(
        CellarcategorymetadataInterface $cellarcategorymetadata
    ) {
        try {
            $cellarcategorymetadataModel = $this->cellarcategorymetadataFactory->create();
            $this->resource->load($cellarcategorymetadataModel, $cellarcategorymetadata->getCellarcategorymetadataId());
            $this->resource->delete($cellarcategorymetadataModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the cellarcategorymetadata: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($cellarcategorymetadataId)
    {
        return $this->delete($this->get($cellarcategorymetadataId));
    }
}

