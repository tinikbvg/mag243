<?php

namespace BelVG\CustomVendor\Model;

use BelVG\CustomVendor\Api\CustomVendorSearchResultInterface;
use BelVG\CustomVendor\Api\Data\CustomVendorInterface;
use BelVG\CustomVendor\Model\CustomVendorFactory;
use BelVG\CustomVendor\Model\ResourceModel\CustomVendor as CustomerVendorResource;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use BelVG\CustomVendor\Model\ResourceModel\CustomVendor\CollectionFactory;
use BelVG\CustomVendor\Api\CustomVendorSearchResultInterfaceFactory;
use Magento\Framework\Exception\StateException;

class CustomVendorRepository
{
    private CustomVendorFactory $customVendorFactory;
    private CustomerVendorResource $customVendorResource;
    private ColectionFactory $collectionFactory;
    private CustomVendorSearchResultInterfaceFactory $searchResultFactory;

    public function __construct(
        CustomVendorFactory                      $customVendorFactory,
        CustomerVendorResource                   $customVendorResource,
        CollectionFactory                        $collectionFactory,
        CustomVendorSearchResultInterfaceFactory $searchResultInterfaceFactory
    )
    {
        $this->customVendorFactory = $customVendorFactory;
        $this->customVendorResource = $customVendorResource;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultFactory = $searchResultInterfaceFactory;
    }

    /**
     * @param int $id
     * @return CustomVendorInterface
     * @throws NoSuchEntityException
     */
    public function get(int $id): CustomVendorInterface
    {
        $object = $this->customVendorFactory->create();
        $this->customVendorResource->load($object, $id);
        if (!$object->getId) {
            throw new NoSuchEntityException(__('Unable to find with ID "%1"', $id));
        }
        return $object;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return CustomVendorSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): CustomVendorSearchResultInterface
    {
        $collection = $this->collectionFactory->create();
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }

        $searchResult = $this->searchResultFactory->create();
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);
        return $searchResult;

    }

    /**
     * @param CustomVendorInterface $customVendor
     * @return CustomVendorInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save(CustomVendorInterface $customVendor): CustomVendorInterface
    {
        $this->customVendorResource->save($customVendor);
        return $customVendor;
    }

    /**
     * @param CustomVendorInterface $customVendor
     * @return bool
     */
    public function delete(CustomVendorInterface $customVendor): bool
    {
        try {
            $this->customVendorResource->delete($customVendor);
        } catch (\Exception $e) {
            throw new StateException(__('Unable to remove entity #%1', $customVendor->getId()));
        }
        return true;
    }


}
