<?php

namespace Omnipro\QuickProductPositioning\Controller\Adminhtml\Positioning;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Forward;

class NewAction extends Action
{
    /** @var Forward */
    protected $resultForwardFactory;

    /**
     * Construction function.
     *
     * @param Context $context
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     */
    public function __construct(
        Context $context,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    /**
     * Forward after create to edit.
     *
     * @return Forward
     */
    public function execute(): Forward
    {
        /** @var Forward $resultForward */
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }

    /**
     * @inheritdoc
     */
    protected function _isAllowed(): bool
    {
        return true;
    }
}
