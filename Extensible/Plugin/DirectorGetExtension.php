<?php

namespace Magenest\Extensible\Plugin;

use Magenest\Repository\Api\Data\DirectorInterface;
use Magenest\Repository\Api\DirectorRepositoryInterface;

/**
 * Class DirectorGetExtension
 *
 * @package Magenest\Extensible\Plugin
 */
class DirectorGetExtension
{
	/**
	 * @var \Magenest\Repository\Api\Data\DirectorExtensionFactory
	 */
	protected $extensionFactory;

	/**
	 * DirectorGetExtension constructor.
	 *
	 * @param \Magenest\Repository\Api\Data\DirectorExtensionFactory $extensionFactory
	 */
	public function __construct(\Magenest\Repository\Api\Data\DirectorExtensionFactory $extensionFactory)
	{
		$this->extensionFactory = $extensionFactory;
	}

	/**
	 * @param DirectorRepositoryInterface $subject
	 * @param DirectorInterface $result
	 * @return DirectorInterface
	 */
	public function afterGetById(
		DirectorRepositoryInterface $subject,
		DirectorInterface $result
	) {
		$attributes = $this->extensionFactory->create();
		$attributes->setAwardType($result->getAwardType());
		$result->setExtensionAttributes($attributes);
		return $result;
	}

	/**
	 * @param DirectorRepositoryInterface $subject
	 * @param DirectorInterface $director
	 * @return array
	 */
	public function beforeSave(
		DirectorRepositoryInterface $subject,
		DirectorInterface $director
	) {
		$awardType = $director->getExtensionAttributes()->getAwardType();
		$director->setAwardType($awardType);
		return [$director];
	}
}
