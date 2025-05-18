<?php

namespace Northstar\CellarCategoryMetaData\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;
use Northstar\CustomWineCellar\Model\Source\Categories;

class CategoryLabel extends Column
{
    protected $categorySource;

    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        Categories $categorySource,
        array $components = [],
        array $data = []
    ) {
        $this->categorySource = $categorySource;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            // Get the ID => Label mapping from source model
            $options = [];
            foreach ($this->categorySource->toOptionArray() as $option) {
                $options[$option['value']] = $option['label'];
            }

            // Replace ID with label for each row
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['category_id']) && isset($options[$item['category_id']])) {
                    $item['category_id'] = $options[$item['category_id']];
                }
            }
        }

        return $dataSource;
    }
}
