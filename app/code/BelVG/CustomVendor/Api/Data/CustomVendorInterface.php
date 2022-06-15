<?php

namespace BelVG\CustomVendor\Api\Data;

interface CustomVendorInterface
{
    const ID = 'vendor_id';
    const NAME = 'name';

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void;
}
