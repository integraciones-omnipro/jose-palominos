<?php

namespace Omnipro\QuickProductPositioning\Api;

interface CategoryProductLinkDataInterface
{
    /**
     * Function to return array.
     * @param array $fields []
     * @return array
     */
    public function toArray(array $fields = []);

    /**
     * Getter of entity id.
     * @return int
     */
    public function getEntityId(): int;

    /**
     * Setter of entity id.
     * @param $entityId
     * @return $this
     */
    public function setEntityId($entityId): static;

    /**
     * Getter of category id.
     * @return string
     */
    public function getCategoryId(): string;
    /**
     * Setter of category id.
     * @param $categoryId
     * @return $this
     */
    public function setCategoryId($categoryId): static;

    /**
     * Getter of position.
     * @return int|null
     * */
    public function getPosition(): ?int;

    /**
     * Setter of position.
     * @param int $position
     * @return $this
     */
    public function setPosition($position): static;
}
