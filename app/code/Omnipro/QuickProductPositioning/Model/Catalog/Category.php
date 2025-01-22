<?php

namespace Omnipro\QuickProductPositioning\Model\Catalog;

use Magento\Catalog\Api\Data\CategoryLinkExtensionInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Omnipro\QuickProductPositioning\Api\CategoryProductLinkDataInterface as DataInterface;
use Omnipro\QuickProductPositioning\Model\Catalog\ResourceModel\Category as ResourceModel;

class Category extends AbstractModel implements IdentityInterface, DataInterface
{
    /**
     * Model cache tag for clear cache in after save and after delete
     */
    const CACHE_TAG = 'omnipro_product_positioning';

    /**
     * Model cache tag for clear cache in after save and after delete
     * When you use true - all cache will be clean
     *
     * @var string|array|bool
     */
    protected $_cacheTag = 'omnipro_product_positioning';

    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_eventPrefix = 'omnipro_product_positioning';

    /**
     * @inheritdoc
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * Function to generate ids.
     * @inheritdoc
     */
    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getEntityId()];
    }

    /**
     * @return array
     */
    public function getDefaultValues(): array
    {
        $values = [];
        return $values;
    }


    /**
     * Getter of entity id.
     * @return int
     */
    public function getEntityId(): int
    {
        return $this->getData('entity_id');
    }

    /**
     * Setter of entity id.
     * @param $entityId
     * @return $this
     */
    public function setEntityId($entityId): static
    {
        return $this->setData('entity_id', $entityId);
    }

    /**
     * Getter of category id.
     * @return string
     */
    public function getCategoryId(): string
    {
        return $this->getData('category_id');
    }

    /**
     * Setter of category id.
     * @param $categoryId
     * @return $this
     */
    public function setCategoryId($categoryId): static
    {
        return $this->setData('category_id', $categoryId);
    }

    /**
     * Getter of position.
     * @return int|null
     * */
    public function getPosition(): ?int
    {
        return $this->getData('position');
    }

    /**
     * Setter of position.
     * @param int $position
     * @return $this
     */
    public function setPosition($position): static
    {
        return $this->setData('position', $position);
    }
}
