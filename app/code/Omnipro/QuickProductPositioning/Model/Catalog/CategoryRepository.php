<?php

namespace Omnipro\QuickProductPositioning\Model\Catalog;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Omnipro\QuickProductPositioning\Api\CategoryProductLinkDataInterface;
use Omnipro\QuickProductPositioning\Api\CategoryProductLinkRepositoryInterface;
use Omnipro\QuickProductPositioning\Model\Catalog\ResourceModel\Category as ResourceModel;
use Omnipro\QuickProductPositioning\Model\ResourceModel\Positioning\CollectionFactory as CollectionFactory;

class CategoryRepository implements CategoryProductLinkRepositoryInterface
{
    private $resource;
    private $categoryProductLinkFactory;
    private $searchResultsFactory;
    private $collectionFactory;
    private $collectionProcessor;

    public function __construct(
        ResourceModel $resource,
        CategoryFactory $categoryProductLinkFactory,
        \Magento\Framework\Api\SearchCriteriaInterface $searchResultsFactory,
        CollectionFactory $collectionFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->categoryProductLinkFactory = $categoryProductLinkFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionFactory = $collectionFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function getById($id)
    {
        $categoryProductLink = $this->categoryProductLinkFactory->create();
        $this->resource->load($categoryProductLink, $id);
        if (!$categoryProductLink->getId()) {
            throw new \Magento\Framework\Exception\NoSuchEntityException(
                __('The entity with ID "%1" doesn\'t exist.', $id)
            );
        }
        return $categoryProductLink;
    }


    public function save(CategoryProductLinkDataInterface $categoryProductLink)
    {
        $this->resource->save($categoryProductLink);
        return $categoryProductLink;
    }

    /**
     * @throws \Exception
     */
    public function delete(CategoryProductLinkDataInterface $categoryProductLink)
    {
        $this->resource->delete($categoryProductLink);
        return true;
    }

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria = null)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setSearchCriteria($searchCriteria);
        return $searchResults;
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     *
     * @return array
     */
    public function toOptionArray(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria = null)
    {
        $options = [];
        foreach($this->getList($searchCriteria)->getItems() as $model) {
            $options[] = [
                'value' => $model->getId(),
                'label' => $model->getId(),
            ];
        }

        return $options;
    }
}
