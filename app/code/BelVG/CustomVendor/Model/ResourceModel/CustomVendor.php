<?php

namespace BelVG\CustomVendor\Model\ResourceModel;

use BelVG\CustomVendor\Api\Data\CustomVendorInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class CustomVendor extends AbstractDb
{
    const TABLE_NAME = 'vendor';

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, CustomVendorInterface::ID);
    }
}
