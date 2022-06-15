<?php

namespace BelVG\CustomVendor\Api;

use BelVG\CustomVendor\Api\Data\CustomVendorInterface;
use Magento\Framework\Api\SearchResultsInterface;

interface CustomVendorSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return CustomVendorInterface[]
     */
    public function getItems();

    /**
     * @param CustomVendorInterface[]
     * @return void
     */
    public function setItems(array $items);
}
