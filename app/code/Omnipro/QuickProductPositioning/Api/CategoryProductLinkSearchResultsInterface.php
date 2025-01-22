<?php

namespace Omnipro\QuickProductPositioning\Api;

use Magento\Framework\Api\SearchResultsInterface;

interface CategoryProductLinkSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get customer groups list.
     *
     * @return CategoryProductLinkDataInterface[]
     */
    public function getItems();

    /**
     * Set customer groups list.
     *
     * @param CategoryProductLinkDataInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
