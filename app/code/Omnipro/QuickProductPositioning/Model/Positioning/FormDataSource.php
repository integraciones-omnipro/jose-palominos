<?php

namespace Omnipro\QuickProductPositioning\Model\Positioning;

use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\Session;
use Magento\Framework\View\Element\UiComponent\DataProvider\FilterPool;
use Magento\Search\Model\ResourceModel\SynonymGroup\Collection;
use Omnipro\QuickProductPositioning\Model\ResourceModel\Positioning\Collection\InterceptorFactory as CollectionFactory;

class FormDataSource extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var Session
     */
    protected $session;

    /**
     * @var Collection
     */
    protected $collection;

    /**
     * @var FilterPool
     */
    protected $filterPool;

    /**
     * @var array
     */
    protected $loadedData;


    /**
     * Constructor
     *
     * @param string            $name
     * @param string            $primaryFieldName
     * @param string            $requestFieldName
     * @param CollectionFactory $blockCollectionFactory
     * @param FilterPool        $filterPool
     * @param Context           $context
     * @param array             $meta
     * @param array             $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $blockCollectionFactory,
        FilterPool $filterPool,
        Context $context,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $blockCollectionFactory->create();
        $this->filterPool = $filterPool;
        $this->session    = $context->getSession();
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData(): array
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();

        $logger = \Magento\Framework\App\ObjectManager::getInstance()->get('\Psr\Log\LoggerInterface');
        $logger->debug('----  getData  ----');
        $logger->debug(print_r($this->collection->getMainTable(), true));
        $logger->debug(print_r($items, true));

        foreach ($items as $item) {
            $data = $item->getData();
            $this->loadedData[$item->getId()] = $data;
        }

        if(empty($this->loadedData) && !empty(($data = $this->session->getData('omnipro_product_positioning_form_data')))){
            $this->loadedData[null] = $data;
        }

        return $this->loadedData;
    }
}
