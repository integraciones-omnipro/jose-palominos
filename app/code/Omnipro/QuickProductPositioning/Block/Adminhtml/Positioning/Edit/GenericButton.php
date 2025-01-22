<?php

namespace Omnipro\QuickProductPositioning\Block\Adminhtml\Positioning\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Catalog\Api\Data\CategoryLinkInterface as DataInterface;
use Magento\Framework\UrlInterface;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * Url Builder
     *
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var DataInterface
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Context $context
     * @param DataInterface $model
     */
    public function __construct(
        Context $context,
        DataInterface $model
    ) {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->model = $model;
    }

    /**
     * Return the model Id.
     *
     * @return int|null
     */
    public function getModelId(): ?int
    {
        return $this->model ? $this->model->getId() : null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = []): string
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}
