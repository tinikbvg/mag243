<?php

namespace BelVG\CustomVendor\Model\ResourceModel\CustomVendor;

use BelVG\CustomVendor\Model\CustomVendor;
use BelVG\CustomVendor\Model\ResourceModel\CustomVendor as CustomVendorResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(CustomVendor::class, CustomVendorResource::class);
    }
}
