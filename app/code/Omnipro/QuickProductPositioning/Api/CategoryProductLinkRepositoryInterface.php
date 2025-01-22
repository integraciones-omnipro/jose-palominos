<?php

namespace Omnipro\QuickProductPositioning\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\Exception\NoSuchEntityException;

interface CategoryProductLinkRepositoryInterface extends OptionSourceInterface
{
    /**
     * @param SearchCriteriaInterface|null $searchCriteria
     * @return CategoryProductLinkSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null);

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
     * @param SearchCriteriaInterface|null $searchCriteria
     * @return array
     */
    public function toOptionArray(SearchCriteriaInterface $searchCriteria = null);
}
