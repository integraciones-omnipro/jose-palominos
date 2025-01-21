<?php

namespace Omnipro\QuickProductPositioning\Model\Catalog\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Context;

class Category extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Construct function.
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    /**
     * Connection construct function.
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init('catalog_category_product', 'entity_id');
    }
}
