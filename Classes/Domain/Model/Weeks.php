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
class Tx_Vegamatic_Domain_Model_Weeks extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Timestamp for the week to plan starting monday
	 *
	 * @var DateTime
	 * @validate NotEmpty
	 */
	protected $weekstamp;

	/**
	 * Further goods or amounts to buy for the week (or override of amounts for dishes)
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Amounts>
	 */
	protected $amounts;

	/**
	 * The seven main dishes for the week
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Dishes>
	 */
	protected $maindish;

	/**
	 * The seven side dishes for the week
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Dishes>
	 */
	protected $sidedish;
	
	/** 
	 * Shopping list generated from main and sidedishes, ordered by shops
	 * 
	 * @var array
	 */
	protected $generatedShoppingList;
	
	/**
	 * Persisted shopping list
	 * 
	 * @var array
	 */
	// VEGAMATIC TODO: Insert new Domain Object "Lists" that consist of amounts and goods drawn from $generatedShoppingList
	protected $shoppingList;

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
	 * Returns the weekstamp
	 *
	 * @return DateTime $weekstamp
	 */
	public function getWeekstamp() {
		return $this->weekstamp;
	}

	/**
	 * Sets the weekstamp
	 *
	 * @param DateTime $weekstamp
	 * @return void
	 */
	public function setWeekstamp($weekstamp) {
		$this->weekstamp = $weekstamp;
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
		$this->maindish = new Tx_Extbase_Persistence_ObjectStorage();
		$this->sidedish = new Tx_Extbase_Persistence_ObjectStorage();		
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

	/**
	 * Adds a Dishes
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $maindish
	 * @return void
	 */
	public function addMaindish(Tx_Vegamatic_Domain_Model_Dishes $maindish) {
		$this->maindish->attach($maindish);
	}

	/**
	 * Removes a Dishes
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $maindishToRemove The Dishes to be removed
	 * @return void
	 */
	public function removeMaindish(Tx_Vegamatic_Domain_Model_Dishes $maindishToRemove) {
		$this->maindish->detach($maindishToRemove);
	}

	/**
	 * Returns the maindish
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Dishes> $maindish
	 */
	public function getMaindish() {
		return $this->maindish;
	}

	/**
	 * Sets the maindish
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Dishes> $maindish
	 * @return void
	 */
	public function setMaindish(Tx_Extbase_Persistence_ObjectStorage $maindish) {
		$this->maindish = $maindish;
	}

	/**
	 * Adds a Dishes
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $sidedish
	 * @return void
	 */
	public function addSidedish(Tx_Vegamatic_Domain_Model_Dishes $sidedish) {
		$this->sidedish->attach($sidedish);
	}

	/**
	 * Removes a Dishes
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $sidedishToRemove The Dishes to be removed
	 * @return void
	 */
	public function removeSidedish(Tx_Vegamatic_Domain_Model_Dishes $sidedishToRemove) {
		$this->sidedish->detach($sidedishToRemove);
	}

	/**
	 * Returns the sidedish
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Dishes> $sidedish
	 */
	public function getSidedish() {
		return $this->sidedish;
	}

	/**
	 * Sets the sidedish
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Dishes> $sidedish
	 * @return void
	 */
	public function setSidedish(Tx_Extbase_Persistence_ObjectStorage $sidedish) {
		$this->sidedish = $sidedish;
	}

	/**
	 * Returns the shopping list
	 *
	 * @return string $shoppingList
	 */
	public function getShoppingList() {
		
		if (is_object($this->getAmounts())) {
debug($this->getAmounts());

		

		}
		
debug($this->shoppingList, '$this->shoppingList');
die();
		
		return $this->shoppingList;
	}
	

	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Amounts>
	 */
	private function getDishAmounts() {
		
		// collect all ingredients for the maindishes
		if (is_object($this->getMaindish())) {
			
			foreach ($this->getMaindish() as $maindish) {
				
				// if the dish has ingredients that need to be bought
				if (is_object($maindish->getAmounts())) {
					
					foreach ($maindish->getAmounts() as $amounts) {
						
						$ingredients[] = array(
							'uid' => $amounts->getGoods()->getUid(),						
							'quantity' => $amounts->getQuantity(),
							'unit' => $amounts->getUnit(),
							'goods' => $amounts->getGoods()->getName(),
							'shop' => $amounts->getGoods()->getShop()->getName(),
						);

					}
				}
			}
		}
		
		// collect all ingredients for the sidedishes
		if (is_object($this->getSidedish())) {
			
			foreach ($this->getSidedish() as $sidedish) {
				
				// if the dish has ingredients that need to be bought
				if (is_object($sidedish->getAmounts())) {
					
					foreach ($sidedish->getAmounts() as $amounts) {
						
						$ingredients[] = array(
							'uid' => $amounts->getGoods()->getUid(),						
							'quantity' => $amounts->getQuantity(),
							'unit' => $amounts->getUnit(),
							'goods' => $amounts->getGoods()->getName(),
							'shop' => $amounts->getGoods()->getShop()->getName(),
						);

					}
				}
			}			
		}
		
		// fuse ingredients
		$generatedList = array();
		foreach ($ingredients as $key => $ingredient) {
			
			$uid = $ingredient['uid'];
			
			if ($uid == $generatedList[$uid]['uid']) {
				$generatedList[$uid]['quantity'] = $generatedList[$uid]['quantity'] + $ingredient['quantity'];
			} else {
				$generatedList[$uid] = $ingredients[$key];
			}
			
		}
		
		$this->generatedShoppingList = array_values($generatedList);
	
		return $this->generatedShoppingList;
		
	}
	
}
?>