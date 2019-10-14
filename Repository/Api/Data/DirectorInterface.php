<?php

namespace Magenest\Repository\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;
/**
 * Interface DirectorInterface
 *
 * @package Magenest\Repository\Api\Data
 */
interface DirectorInterface extends ExtensibleDataInterface
{
	/**
	 *
	 */
	const ID     = "director_id";
	/**
	 *
	 */
	const NAME   = "name";
	/**
	 *
	 */
	const AGE    = "age";
	/**
	 *
	 */
	const MOBILE = "mobile";

	/**
	 * @return int
	 */
	public function getDirectorId();

	/**
	 * @param  int $id
	 * @return void
	 */
	public function setDirectorId($id);

	/**
	 * @return string
	 */
	public function getName();

	/**
	 * @param string $name
	 * @return void
	 */
	public function setName($name);

	/**
	 * @return int
	 */
	public function getAge();

	/**
	 * @param int $age
	 * @return void
	 */
	public function setAge($age);

	/**
	 * @return string
	 */
	public function getMobile();

	/**
	 * @param string $mobile
	 * @return void
	 */
	public function setMobile($mobile);

	/**
	 * @return \Magenest\Repository\Api\Data\DirectorExtensionInterface|null
	 */
	public function getExtensionAttributes();

	/**
	 * @param \Magenest\Repository\Api\Data\DirectorExtensionInterface $extensionAttributes
	 * @return void
	 */
	public function setExtensionAttributes(DirectorExtensionInterface $extensionAttributes);

}