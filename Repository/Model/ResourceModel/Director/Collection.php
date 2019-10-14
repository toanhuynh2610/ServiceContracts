<?php

namespace Magenest\Repository\Model\ResourceModel\Director;

/**
 * Class Collection
 *
 * @package Magenest\Repository\Model\ResourceModel\Director
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Initialize resource collection
	 *
	 * @return void
	 */
	public function _construct()
	{
		$this->_init('Magenest\Repository\Model\Director',
			'Magenest\Repository\Model\ResourceModel\Director');
	}
}