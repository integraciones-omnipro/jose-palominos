<?php

namespace Omnipro\QuickProductPositioning\Model\ResourceModel\Positioning;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Identifier field name for collection items
     *
     * Can be used by collections with items without defined
     *
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * Name prefix of events that are dispatched by model
     *
     * @var string
     */
    protected $_eventPrefix = 'omnipro_product_positioning_collection';

    /**
     * Name of event parameter
     *
     * @var string
     */
    protected $_eventObject = 'omnipro_product_positioning_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Omnipro\QuickProductPositioning\Model\Catalog\Category::class,
            \Omnipro\QuickProductPositioning\Model\Catalog\ResourceModel\Category::class
        );
    }

}
