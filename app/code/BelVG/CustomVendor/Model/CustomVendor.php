<?php

namespace BelVG\CustomVendor\Model;

use BelVG\CustomVendor\Api\Data\CustomVendorInterface;
use Magento\Framework\Model\AbstractModel;

class CustomVendor extends AbstractModel implements CustomVendorInterface
{

    public function getName(): string
    {
        return $this->getData(CustomVendorInterface::NAME);
    }

    public function setName(string $name): void
    {
        $this->setData(CustomVendorInterface::NAME, $name);
    }
}
