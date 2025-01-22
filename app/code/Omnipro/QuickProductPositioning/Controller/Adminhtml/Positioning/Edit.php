<?php

namespace Omnipro\QuickProductPositioning\Controller\Adminhtml\Positioning;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Controller\AbstractResult;
use Magento\Framework\View\Result\PageFactory;
use Omnipro\QuickProductPositioning\Api\CategoryProductLinkRepositoryInterface as RepositoryInterface;
use Omnipro\QuickProductPositioning\Api\CategoryProductLinkDataInterface as DataInterface;
use Psr\Log\LoggerInterface as Logger;

class Edit extends \Magento\Backend\App\Action
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var RepositoryInterface
     */
    protected $repository;

    /**
     * @var DataInterface
     */
    protected $model;

    /**
     * @var Logger $logger
     */
    protected $logger;

    /**
     * @param Action\Context      $context
     * @param PageFactory         $resultPageFactory
     * @param RepositoryInterface $repository
     * @param DataInterface       $model,
     * @param Logger $logger
     */
    public function __construct(
        Action\Context $context,
        PageFactory $resultPageFactory,
        RepositoryInterface $repository,
        DataInterface $model,
        Logger $logger
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->repository = $repository;
        $this->model = $model;
        $this->logger = $logger;
        parent::__construct($context);
    }

    /**
     * @return true
     */
    protected function _isAllowed()
    {
        return true;
    }

    /**
     * Init actions
     *
     * @return Page
     */
    protected function _initAction()
    {
        // load layout and set active menu.
        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }

    /**
     * Edit Item
     *
     * @return AbstractResult|Page
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute(): AbstractResult|Page
    {
        /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        try {
            $id = $this->getRequest()->getParam('entity_id');
            if ($id) {
                $this->repository->loadModel($this->model, $id);
                if (!$this->model->getId()) {
                    $this->messageManager->addErrorMessage(__('This item no longer exists.'));
                    return $resultRedirect->setPath('*/*/');
                }
            }

            if (!empty($data = $this->_session->getFormData())) {
                $this->model
                ->setCategoryId($data['category_id'] ?? null)
                ->setProductId($data['product_id'] ?? null)
                ->setPosition($data['position'] ?? null);
            }

            $resultPage = $this->_initAction();
            $resultPage->addBreadcrumb(__('Product Positioning'), __('Product Positioning'));

            $name   = $this->model->getId();
            $label  =  __($id ? 'Edit %1 - %2' : 'New %1' , 'Product Positioning', $name);
            $prefix = $title = $label;

            $resultPage->addBreadcrumb($label, $title);
            $resultPage->getConfig()->getTitle()->prepend($prefix);

            return $resultPage;

        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->logger->error($e->getMessage());
            $this->logger->error($e->getTraceAsString());
            $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving %1.', 'Product Positioning'));
        } catch (\RuntimeException $e) {
            $this->logger->error($e->getMessage());
            $this->logger->error($e->getTraceAsString());
            $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving %1.', 'Product Positioning'));
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            $this->logger->error($e->getTraceAsString());
            $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving %1.', 'Product Positioning'));
        }

        return $resultRedirect->setPath('*/*/');
    }
}
