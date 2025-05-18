<?php

namespace Northstar\CustomWineCellarCellarCategoryMetaData\Model\Source;

use Northstar\CustomCategory\Api\CustomCategoryRepositoryInterface;

class Categories implements \Magento\Framework\Option\ArrayInterface
{

    protected $customcategoryRepository;

    public function __construct(
        CustomCategoryRepositoryInterface $customcategoryRepository
    ) {
        $this->customcategoryRepository = $customcategoryRepository;
    }

    public function toOptionArray()
    {
        $categories = [];
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $searchCriteriaBuilder = $objectManager->create('Magento\Framework\Api\SearchCriteriaBuilder');
        $searchCriteria = $searchCriteriaBuilder->addFilter('is_display', 1, 'eq')->create();
        $items = $this->customcategoryRepository->getList($searchCriteria);

        foreach ($items->getItems() as $item) {
            $categories[] = ['value' => $item->getCustomcategoryId(), 'label' => $item->getTitle()];
        }
        return $categories;
    }
}