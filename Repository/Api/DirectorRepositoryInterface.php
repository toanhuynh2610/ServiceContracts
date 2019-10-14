<?php

namespace Magenest\Repository\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface DirectorRepositoryInterface
 *
 * @package Magenest\Repository\Api
 */
interface DirectorRepositoryInterface
{
	/**
	 * @param int $id
	 * @return \Magenest\Repository\Api\Data\DirectorInterface
	 * @throws \Magento\Framework\Exception\NoSuchEntityException
	 */
	public function getById($id);

	/**
	 * @param \Magenest\Repository\Api\Data\DirectorInterface $director
	 * @return \Magenest\Repository\Api\Data\DirectorInterface
	 */
	public function save(\Magenest\Repository\Api\Data\DirectorInterface $director);

	/**
	 * @param \Magenest\Repository\Api\Data\DirectorInterface $director
	 * @return void
	 */
	public function delete(\Magenest\Repository\Api\Data\DirectorInterface $director);

	/**
	 * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
	 * @return \Magenest\Repository\Api\Data\DirectorSearchResultsInterface
	 */
	public function getList(SearchCriteriaInterface $searchCriteria);


}