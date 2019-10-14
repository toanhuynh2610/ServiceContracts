<?php

namespace Magenest\Repository\Model;

use Magenest\Repository\Api\Data\DirectorExtensionInterface;
use Magenest\Repository\Api\Data\DirectorInterface;
use Magento\Framework\Model\AbstractExtensibleModel;
/**
 * Class Director
 *
 * @package Magenest\Repository\Model
 */
class Director extends AbstractExtensibleModel implements DirectorInterface
{
	/**
	 *
	 */
	protected function _construct()
	{
		$this->_init('Magenest\Repository\Model\ResourceModel\Director');
	}

	/**
	 * @return int|mixed
	 */
	public function getDirectorId()
	{
		return $this->_getData(DirectorInterface::ID);
	}

	/**
	 * @param int $id
	 */
	public function setDirectorId($id)
	{
		$this->setData(DirectorInterface::ID, $id);
	}

	/**
	 * @return mixed|string
	 */
	public function getName()
	{
		return $this->_getData(DirectorInterface::NAME);
	}

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->setData(DirectorInterface::NAME, $name);
	}

	/**
	 * @return int|mixed
	 */
	public function getAge()
	{
		return $this->_getData(DirectorInterface::AGE);
	}

	/**
	 * @param int $age
	 */
	public function setAge($age)
	{
		$this->setData(DirectorInterface::AGE, $age);
	}

	/**
	 * @return mixed|string
	 */
	public function getMobile()
	{
		return $this->_getData(DirectorInterface::MOBILE);
	}

	/**
	 * @inheritDoc
	 */
	public function setMobile($mobile)
	{
		$this->setData(DirectorInterface::MOBILE, $mobile);
	}

	/**
	 * @return \Magento\Framework\Api\ExtensionAttributesInterface|mixed
	 */
	public function getExtensionAttributes()
	{
		return $this->_getExtensionAttributes();
	}

	/**
	 * @param DirectorExtensionInterface $extensionAttributes
	 * @return Director|void
	 */
	public function setExtensionAttributes(DirectorExtensionInterface $extensionAttributes)
	{
		return $this->_setExtensionAttributes($extensionAttributes);
	}
}