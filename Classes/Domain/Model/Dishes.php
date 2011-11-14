<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 tesselation 
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


/**
 *
 *
 * @package vegamatic
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class Tx_Vegamatic_Domain_Model_Dishes extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Name of the dish
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name;

	/**
	 * The amounts of ingredients that are needed for this dish
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Amounts>
	 */
	protected $amounts;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->amounts = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Adds a Amounts
	 *
	 * @param Tx_Vegamatic_Domain_Model_Amounts $amount
	 * @return void
	 */
	public function addAmount(Tx_Vegamatic_Domain_Model_Amounts $amount) {
		$this->amounts->attach($amount);
	}

	/**
	 * Removes a Amounts
	 *
	 * @param Tx_Vegamatic_Domain_Model_Amounts $amountToRemove The Amounts to be removed
	 * @return void
	 */
	public function removeAmount(Tx_Vegamatic_Domain_Model_Amounts $amountToRemove) {
		$this->amounts->detach($amountToRemove);
	}

	/**
	 * Returns the amounts
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Amounts> $amounts
	 */
	public function getAmounts() {
		return $this->amounts;
	}

	/**
	 * Sets the amounts
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Amounts> $amounts
	 * @return void
	 */
	public function setAmounts(Tx_Extbase_Persistence_ObjectStorage $amounts) {
		$this->amounts = $amounts;
	}

}
?>