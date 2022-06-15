<?php

namespace BelVG\CustomVendor\Controller\Adminhtml\Listing;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;


class Index extends Action
{
    const ADMIN_RESOURCE = 'Magento_Backend::system';

    public function execute(): ResultInterface
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend((__('Vendors')));
        $resultPage->setActiveMenu('BelVG_CustomVendor::module');

        return $resultPage;
    }
}
