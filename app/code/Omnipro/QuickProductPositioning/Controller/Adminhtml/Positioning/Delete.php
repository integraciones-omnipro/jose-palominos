<?php

namespace Omnipro\QuickProductPositioning\Controller\Adminhtml\Positioning;

use Magento\Backend\Model\View\Result\Redirect;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * Delete action
     *
     * @return Redirect
     */
    public function execute(): Redirect
    {
        $logger = \Magento\Framework\App\ObjectManager::getInstance()->get('\Psr\Log\LoggerInterface');
        $logger->debug('++++  Delete Action  ++++');

        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('entity_id');
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        $logger->debug(print_r($this->getRequest()->getParams(), true));
        $logger->debug($id);

        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create('Magento\Catalog\Api\Data\CategoryLinkInterface');
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('The item has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['entity_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a item to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
