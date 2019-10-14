<?php

namespace Magenest\Repository\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magenest\Repository\Api\Data\DirectorInterface;
use Magenest\Repository\Model\DirectorFactory;
use Magenest\Repository\Model\ResourceModel\Director as ResourceDirector;
use Magenest\Repository\Model\ResourceModel\Director\CollectionFactory;
use Magenest\Repository\Api\Data\DirectorSearchResultsInterfaceFactory;

/**
 * Class DirectorRepository
 *
 * @package Magenest\Repository\Model
 */
class DirectorRepository implements \Magenest\Repository\Api\DirectorRepositoryInterface
{
	/**
	 * @var \Magenest\Repository\Model\DirectorFactory
	 */
	protected $directorFactory;
	/**
	 * @var ResourceDirector
	 */
	protected $resourceDirector;

	/**
	 * @var CollectionFactory
	 */
	protected $collection;

	/**
	 * @var DirectorSearchResultsInterface
	 */
	protected $searchResults;

	/**
	 * DirectorRepository constructor.
	 *
	 * @param \Magenest\Repository\Model\DirectorFactory $director
	 * @param ResourceDirector $resourceDirector
	 * @param CollectionFactory $collection
	 * @param DirectorSearchResultsInterface $searchResults
	 */
	public function __construct(
		ResourceDirector $resourceDirector,
		CollectionFactory $collection,
		DirectorSearchResultsInterfaceFactory $searchResults,
		DirectorFactory $directorFactory

	) {
		$this->collection       = $collection;
		$this->resourceDirector = $resourceDirector;
		$this->searchResults    = $searchResults;
		$this->directorFactory  = $directorFactory;
	}

	/**
	 * @param DirectorInterface $director
	 * @return \Magenest\Repository\Api\Data\DirectorInterface|void
	 */
	public function save(DirectorInterface $director)
	{
		$this->resourceDirector->save($director);
		return $director;
	}

	/**
	 * @param DirectorInterface $director
	 */
	public function delete(DirectorInterface $director)
	{
		$this->resourceDirector->delete($director);
	}

	/**
	 * @param int $id
	 * @return DirectorInterface|void
	 */
	public function getById($id)
	{
		$director = $this->directorFactory->create();
		$this->resourceDirector->load($director,$id);

		if (!$director->getId()) {
			throw new \Magento\Framework\Exception\NoSuchEntityException();
		}
		return $director;
	}

	/**
	 * @param SearchCriteriaInterface $searchCriteria
	 * @return DirectorSearchResultsInterface|void
	 */
	public function getList(SearchCriteriaInterface $searchCriteria)
	{
		$collection = $this->collection->create();
		foreach ($searchCriteria->getFilterGroups() as $group) {
			$this->addFilterGroupToCollection($group, $collection);
		}
		/** @var \Magento\Framework\Api\SortOrder $sortOrder */
		foreach ((array)$searchCriteria->getSortOrders() as $sortOrder) {
			$direction = $sortOrder->getDirection() == \Magento\Framework\Api\SortOrder::SORT_ASC ? 'asc' : 'desc';
			$collection->addOrder($sortOrder->getField(), $direction);
		}

		/** addPagingToCollection **/
		$collection->setPageSize($searchCriteria->getPageSize());
		$collection->setCurPage($searchCriteria->getCurrentPage());

		/** buildSearchResult **/
		$searchResults = $this->searchResults->create();

		$searchResults->setSearchCriteria($searchCriteria);
		$searchResults->setItems($collection->getItems());
		$searchResults->setTotalCount($collection->getSize());

		return $searchResults;
	}

	/**
	 * @param $group
	 * @param $collection
	 */
	private function addFilterGroupToCollection($group, $collection)
	{
		$fields     = [];
		$conditions = [];

		foreach ($group->getFilters() as $filter) {
			$condition    = $filter->getConditionType() ?: 'eq';
			$field        = $filter->getField();
			$value        = $filter->getValue();
			$fields[]     = $field;
			$conditions[] = [$condition => $value];

		}
		$collection->addFieldToFilter($fields, $conditions);
	}
}