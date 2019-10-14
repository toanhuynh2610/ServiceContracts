<?php

namespace Magenest\Repository\Model\ResourceModel;

/**
 * Class Director
 *
 * @package Magenest\Repository\Model\ResourceModel
 */
class Director extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	/**
	 * @var string
	 */
	protected $_idFieldName = 'director_id';

	/**
	 *
	 */
	protected function _construct()
	{
		$this->_init('magenest_director', $this->_idFieldName);
	}
}