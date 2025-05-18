<?php

namespace Northstar\CellarCategoryMetaData\Controller\Adminhtml\Cellarcategorymetadata;

use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    protected $dataPersistor;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        
        if ($data) {
            $id = $this->getRequest()->getParam('cellarcategorymetadata_id');
            
            $model = $this->_objectManager->create(\Northstar\CellarCategoryMetaData\Model\Cellarcategorymetadata::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Custom Cellars Mutli-Categorization no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            // Process the main image field (`cellar_main_image`)
            if (isset($data['cellar_main_image'][0]['name']) && isset($data['cellar_main_image'][0]['tmp_name'])) {
                // If image is uploaded, save the image URL in the field
                $data['cellar_main_image'] = $data['cellar_main_image'][0]['url'];
            } elseif (isset($data['cellar_main_image'][0]['name']) && !isset($data['cellar_main_image'][0]['tmp_name'])) {
                // If the image URL exists but there is no tmp_name, use the existing URL
                $data['cellar_main_image'] = $data['cellar_main_image'][0]['url'];
            } else {
                // If no image uploaded, leave the field empty
                $data['cellar_main_image'] = '';
            }

            // Set the model data
            $model->setData($data);

            try {
                // Ensure the model is saved correctly
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Custom Cellars Mutli-Categorization.'));
                $this->dataPersistor->clear('northstar_cellarcategorymetadata_cellarcategorymetadata');

                // Redirect to the edit page if the 'back' parameter is set, else to the listing page
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['cellarcategorymetadata_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');

            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Custom Cellars Mutli-Categorization.'));
            }

            // Save the data back if there's an error and need to persist
            $this->dataPersistor->set('northstar_cellarcategorymetadata_cellarcategorymetadata', $data);
            return $resultRedirect->setPath('*/*/edit', ['cellarcategorymetadata_id' => $this->getRequest()->getParam('cellarcategorymetadata_id')]);
        }

        return $resultRedirect->setPath('*/*/');
    }
}
