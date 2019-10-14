<?php

namespace Magenest\Repository\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface DirectorSearchResultsInterface
 *
 * @package Magenest\Repository\Api\Data
 */
interface DirectorSearchResultsInterface extends SearchResultsInterface
{
	/**
	 * @return \Magenest\Repository\Api\Data\DirectorInterface[]
	 */
	public function getItems();

	/**
	 * @param \Magenest\Repository\Api\Data\DirectorInterface[] $items
	 * @return void
	 */
	public function setItems(array $items);
}