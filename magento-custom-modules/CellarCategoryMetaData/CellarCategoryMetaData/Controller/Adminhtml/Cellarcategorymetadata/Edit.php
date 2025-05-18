<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Northstar\CellarCategoryMetaData\Controller\Adminhtml\Cellarcategorymetadata;

class Edit extends \Northstar\CellarCategoryMetaData\Controller\Adminhtml\Cellarcategorymetadata
{

    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('cellarcategorymetadata_id');
        $model = $this->_objectManager->create(\Northstar\CellarCategoryMetaData\Model\Cellarcategorymetadata::class);
        
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Custom Cellars Mutli-Categorization no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('northstar_cellarcategorymetadata_cellarcategorymetadata', $model);
        
        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Custom Cellars Mutli-Categorization') : __('Custom Cellars Mutli-Categorization'),
            $id ? __('Edit Custom Cellars Mutli-Categorization') : __('Custom Cellars Mutli-Categorization')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Custom Cellars Mutli-Categorization'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Custom Cellars Mutli-Categorization %1', $model->getId()) : __('New Custom Cellars Mutli-Categorization'));
        return $resultPage;
    }
}

