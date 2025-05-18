<?php

namespace Northstar\CellarCategoryMetaData\Model\Source;

use Magento\Framework\Option\ArrayInterface;
use Northstar\CustomWineCellar\Api\CustomWineCellarRepositoryInterface;

class Cellars implements ArrayInterface
{
    protected $customWineCellarRepository;

    public function __construct(
        CustomWineCellarRepositoryInterface $customWineCellarRepository
    ) {
        $this->customWineCellarRepository = $customWineCellarRepository;
    }

    /**
     * Fetch the list of wine cellars and return them as options for the dropdown
     * 
     * @return array
     */
    public function toOptionArray()
    {
        $cellars = [];
        $searchCriteria = $this->createSearchCriteria();
        $cellarList = $this->customWineCellarRepository->getList($searchCriteria);
        
        // Populate the options array with cellar IDs as value and titles as label
        foreach ($cellarList->getItems() as $cellar) {
             $title = trim($cellar->getTitle());
            if (!empty($title)) {
                $cellars[] = [
                    'value' => $cellar->getCustomwinecellarId(),
                    'label' => $cellar->getCustomwinecellarId() . ' - ' . $cellar->getTitle() 
                ];
            }
        }

        return $cellars;
    }

    /**
     * Create the search criteria to fetch the list of wine cellars
     * 
     * @return \Magento\Framework\Api\SearchCriteriaInterface
     */
    private function createSearchCriteria()
    {
        $searchCriteriaBuilder = \Magento\Framework\App\ObjectManager::getInstance()->create('Magento\Framework\Api\SearchCriteriaBuilder');
        return $searchCriteriaBuilder->create();
    }
}
