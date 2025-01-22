<?php

namespace Omnipro\QuickProductPositioning\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\Exception\NoSuchEntityException;

interface CategoryProductLinkRepositoryInterface extends OptionSourceInterface
{
    /**
     * @return CategoryProductLinkDataInterface
     */
//    public function create();

    /**
     * @param SearchCriteriaInterface|null $searchCriteria
     * @return CategoryProductLinkSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null);

    /**
     * @return \Omnipro\QuickProductPositioning\Model\ResourceModel\Positioning\Collection
     */
//    public function getCollection();

    /**
     * @param mixed $value
     * @param string $field
     * @return CategoryProductLinkDataInterface
     * @throws NoSuchEntityException
     */
//    public function load($value, $field = null);

    /**
     * @param CategoryProductLinkDataInterface $model
     * @param mixed $value
     * @param string $field
     * @return CategoryProductLinkDataInterface
     * @throws NoSuchEntityException
     */
//    public function loadModel(CategoryProductLinkDataInterface $model, $value, $field = null);

    /**
     * @param CategoryProductLinkDataInterface $model
     * @return CategoryProductLinkDataInterface
     */
    public function save(CategoryProductLinkDataInterface $model);

    /**
     * @param CategoryProductLinkDataInterface $model
     * @return CategoryProductLinkDataInterface
     */
    public function delete(CategoryProductLinkDataInterface $model);

    /**
     * @param int $id
     * @return CategoryProductLinkDataInterface
     * @throws NoSuchEntityException
     */
//    public function deleteById($id);

    /**
     * @param SearchCriteriaInterface|null $searchCriteria
     * @return array
     */
    public function toOptionArray(SearchCriteriaInterface $searchCriteria = null);
}
