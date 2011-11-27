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
	 * Further goods to buy that are not bound to dishes
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Amounts>
	 */
	protected $additionalAmounts;

	/**
	 * Amounts that override existing amounts with unit/quantity/exclude
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Amounts>
	 */
	protected $overlayAmounts;	
	
	/**
	 * Maindish1
	 *
	 * @var Tx_Vegamatic_Domain_Model_Dishes
	 */
	protected $maindish1;
	
	/**
	 * Maindish2
	 *
	 * @var Tx_Vegamatic_Domain_Model_Dishes
	 */
	protected $maindish2;

	/**
	 * Maindish3
	 *
	 * @var Tx_Vegamatic_Domain_Model_Dishes
	 */
	protected $maindish3;	
	
	/**
	 * Maindish4
	 *
	 * @var Tx_Vegamatic_Domain_Model_Dishes
	 */
	protected $maindish4;

	/**
	 * Maindish5
	 *
	 * @var Tx_Vegamatic_Domain_Model_Dishes
	 */
	protected $maindish5;

	/**
	 * Maindish6
	 *
	 * @var Tx_Vegamatic_Domain_Model_Dishes
	 */
	protected $maindish6;
	
	/**
	 * Maindish7
	 *
	 * @var Tx_Vegamatic_Domain_Model_Dishes
	 */
	protected $maindish7;	

	/**
	 * Sidedish1
	 *
	 * @var Tx_Vegamatic_Domain_Model_Dishes
	 */
	protected $sidedish1;
	
	/**
	 * Sidedish2
	 *
	 * @var Tx_Vegamatic_Domain_Model_Dishes
	 */
	protected $sidedish2;
	
	/**
	 * Sidedish3
	 *
	 * @var Tx_Vegamatic_Domain_Model_Dishes
	 */
	protected $sidedish3;
	
	/**
	 * Sidedish4
	 *
	 * @var Tx_Vegamatic_Domain_Model_Dishes
	 */
	protected $sidedish4;

	/**
	 * Sidedish5
	 *
	 * @var Tx_Vegamatic_Domain_Model_Dishes
	 */
	protected $sidedish5;
	
	/**
	 * Sidedish6
	 *
	 * @var Tx_Vegamatic_Domain_Model_Dishes
	 */
	protected $sidedish6;
	
	/**
	 * Sidedish7
	 *
	 * @var Tx_Vegamatic_Domain_Model_Dishes
	 */
	protected $sidedish7;	

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
		$this->additionalAmounts = new Tx_Extbase_Persistence_ObjectStorage();
		$this->overlayAmounts = new Tx_Extbase_Persistence_ObjectStorage();		
	}

	/**
	 * Adds an additionalAmount
	 *
	 * @param Tx_Vegamatic_Domain_Model_Amounts $additionalAmount
	 * @return void
	 */
	public function addAdditionalAmount(Tx_Vegamatic_Domain_Model_Amounts $additionalAmount) {
		$this->additionalAmounts->attach($additionalAmount);
	}

	/**
	 * Removes an additionalAmount
	 *
	 * @param Tx_Vegamatic_Domain_Model_Amounts $additionalAmountToRemove The Amounts to be removed
	 * @return void
	 */
	public function removeAdditionalAmount(Tx_Vegamatic_Domain_Model_Amounts $additionalAmountToRemove) {
		$this->additionalAmounts->detach($additionalAmountToRemove);
	}

	/**
	 * Returns the additionalAmounts
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Amounts> $additionalAmounts
	 */
	public function getAdditionalAmounts() {	
		return clone $this->additionalAmounts;
	}

	/**
	 * Sets the additionalAmounts
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Amounts> $additionalAmounts
	 * @return void
	 */
	public function setAdditionalAmounts(Tx_Extbase_Persistence_ObjectStorage $additionalAmounts) {
		$this->AdditionalAmounts = $additionalAmounts;
	}

	/**
	 * Adds an overlayAmount
	 *
	 * @param Tx_Vegamatic_Domain_Model_Amounts $overlayAmount
	 * @return void
	 */
	public function addOverlayAmount(Tx_Vegamatic_Domain_Model_Amounts $overlayAmount) {
		$this->overlayAmounts->attach($overlayAmount);
	}

	/**
	 * Removes an overlayAmount
	 *
	 * @param Tx_Vegamatic_Domain_Model_Amounts $overlayAmountToRemove The Amounts to be removed
	 * @return void
	 */
	public function removeOverlayAmount(Tx_Vegamatic_Domain_Model_Amounts $overlayAmountToRemove) {
		$this->overlayAmounts->detach($overlayAmountToRemove);
	}

	/**
	 * Returns the overlayAmounts
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Amounts> $overlayAmounts
	 */
	public function getOverlayAmounts() {	
		return clone $this->overlayAmounts;
	}

	/**
	 * Sets the overlayAmounts
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Vegamatic_Domain_Model_Amounts> $overlayAmounts
	 * @return void
	 */
	public function setOverlayAmounts(Tx_Extbase_Persistence_ObjectStorage $overlayAmounts) {
		$this->overlayAmounts = $overlayAmounts;
	}
	
	/**
	 * Returns maindish1
	 *
	 * @return Tx_Vegamatic_Domain_Model_Dishes $maindish1
	 */
	public function getMaindish1() {
		return $this->maindish1;
	}

	/**
	 * Sets maindish1
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $maindish1
	 * @return void
	 */
	public function setMaindish1(Tx_Vegamatic_Domain_Model_Dishes $maindish1) {
		$this->maindish1 = $maindish1;
	}
	
	/**
	 * Returns maindish2
	 *
	 * @return Tx_Vegamatic_Domain_Model_Dishes $maindish2
	 */
	public function getMaindish2() {
		return $this->maindish2;
	}

	/**
	 * Sets maindish2
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $maindish2
	 * @return void
	 */
	public function setMaindish2(Tx_Vegamatic_Domain_Model_Dishes $maindish2) {
		$this->maindish2 = $maindish2;
	}
	
	/**
	 * Returns maindish3
	 *
	 * @return Tx_Vegamatic_Domain_Model_Dishes $maindish3
	 */
	public function getMaindish3() {
		return $this->maindish3;
	}

	/**
	 * Sets maindish3
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $maindish3
	 * @return void
	 */
	public function setMaindish3(Tx_Vegamatic_Domain_Model_Dishes $maindish3) {
		$this->maindish3 = $maindish3;
	}	

	/**
	 * Returns maindish4
	 *
	 * @return Tx_Vegamatic_Domain_Model_Dishes $maindish4
	 */
	public function getMaindish4() {
		return $this->maindish4;
	}

	/**
	 * Sets maindish4
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $maindish4
	 * @return void
	 */
	public function setMaindish4(Tx_Vegamatic_Domain_Model_Dishes $maindish4) {
		$this->maindish4 = $maindish4;
	}

	/**
	 * Returns maindish5
	 *
	 * @return Tx_Vegamatic_Domain_Model_Dishes $maindish5
	 */
	public function getMaindish5() {
		return $this->maindish5;
	}

	/**
	 * Sets maindish5
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $maindish5
	 * @return void
	 */
	public function setMaindish5(Tx_Vegamatic_Domain_Model_Dishes $maindish5) {
		$this->maindish5 = $maindish5;
	}
	
	/**
	 * Returns maindish6
	 *
	 * @return Tx_Vegamatic_Domain_Model_Dishes $maindish6
	 */
	public function getMaindish6() {
		return $this->maindish6;
	}

	/**
	 * Sets maindish6
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $maindish6
	 * @return void
	 */
	public function setMaindish6(Tx_Vegamatic_Domain_Model_Dishes $maindish6) {
		$this->maindish6 = $maindish6;
	}	

	/**
	 * Returns maindish7
	 *
	 * @return Tx_Vegamatic_Domain_Model_Dishes $maindish7
	 */
	public function getMaindish7() {
		return $this->maindish7;
	}

	/**
	 * Sets maindish7
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $maindish7
	 * @return void
	 */
	public function setMaindish7(Tx_Vegamatic_Domain_Model_Dishes $maindish7) {
		$this->maindish7 = $maindish7;
	}	

	/**
	 * Returns sidedish1
	 *
	 * @return Tx_Vegamatic_Domain_Model_Dishes $sidedish1
	 */
	public function getSidedish1() {
		return $this->sidedish1;
	}

	/**
	 * Sets sidedish1
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $sidedish1
	 * @return void
	 */
	public function setSidedish1(Tx_Vegamatic_Domain_Model_Dishes $sidedish1) {
		$this->sidedish1 = $sidedish1;
	}
	
	/**
	 * Returns sidedish2
	 *
	 * @return Tx_Vegamatic_Domain_Model_Dishes $sidedish2
	 */
	public function getSidedish2() {
		return $this->sidedish2;
	}

	/**
	 * Sets sidedish2
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $sidedish2
	 * @return void
	 */
	public function setSidedish2(Tx_Vegamatic_Domain_Model_Dishes $sidedish2) {
		$this->sidedish2 = $sidedish2;
	}
	
	/**
	 * Returns sidedish3
	 *
	 * @return Tx_Vegamatic_Domain_Model_Dishes $sidedish3
	 */
	public function getSidedish3() {
		return $this->sidedish3;
	}

	/**
	 * Sets sidedish3
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $sidedish3
	 * @return void
	 */
	public function setSidedish3(Tx_Vegamatic_Domain_Model_Dishes $sidedish3) {
		$this->sidedish3 = $sidedish3;
	}	

	/**
	 * Returns sidedish4
	 *
	 * @return Tx_Vegamatic_Domain_Model_Dishes $sidedish4
	 */
	public function getSidedish4() {
		return $this->sidedish4;
	}

	/**
	 * Sets sidedish4
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $sidedish4
	 * @return void
	 */
	public function setSidedish4(Tx_Vegamatic_Domain_Model_Dishes $sidedish4) {
		$this->sidedish4 = $sidedish4;
	}

	/**
	 * Returns sidedish5
	 *
	 * @return Tx_Vegamatic_Domain_Model_Dishes $sidedish5
	 */
	public function getSidedish5() {
		return $this->sidedish5;
	}

	/**
	 * Sets sidedish5
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $sidedish5
	 * @return void
	 */
	public function setSidedish5(Tx_Vegamatic_Domain_Model_Dishes $sidedish5) {
		$this->sidedish5 = $sidedish5;
	}
	
	/**
	 * Returns sidedish6
	 *
	 * @return Tx_Vegamatic_Domain_Model_Dishes $sidedish6
	 */
	public function getSidedish6() {
		return $this->sidedish6;
	}

	/**
	 * Sets sidedish6
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $sidedish6
	 * @return void
	 */
	public function setSidedish6(Tx_Vegamatic_Domain_Model_Dishes $sidedish6) {
		$this->sidedish6 = $sidedish6;
	}	

	/**
	 * Returns sidedish7
	 *
	 * @return Tx_Vegamatic_Domain_Model_Dishes $sidedish7
	 */
	public function getSidedish7() {
		return $this->sidedish7;
	}

	/**
	 * Sets sidedish7
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $sidedish7
	 * @return void
	 */
	public function setSidedish7(Tx_Vegamatic_Domain_Model_Dishes $sidedish7) {
		$this->sidedish7 = $sidedish7;
	}	
	
	/**
	 * @return array $shoppingList
	 */
	public function getShoppingList() {

		// collect all ingredients for the maindishes
		for ($i=1; $i < 7; $i++) {
			
			$maindish = 'getMaindish'.$i;
			$sidedish = 'getSidedish'.$i;
			
			// if the maindish has ingredients		
			if (is_object($this->$maindish()) && is_object($this->$maindish()->getAmounts())) {
				// iterate through all items
				foreach ($this->$maindish()->getAmounts() as $amount) {										
					$items[] = array(
//						'amount' => $amount->getUid(),
						'amount' => $amount,                       
						'quantity' => $amount->getQuantity(),			
						'unit' => $amount->getUnit(),
						'goods' => $amount->getGoods()->getUid(),						
						'name' => $amount->getGoods()->getName(),
						'shop' => $amount->getGoods()->getShop()->getName(),
						'parent' => 'Tx_Vegamatic_Domain_Model_Dishes',
						'exclude' => 0,		
					);
				}
			}
			
			// if the sidedish has ingredients
			if (is_object($this->$sidedish()) && is_object($this->$sidedish()->getAmounts())) {
				// iterate through all items
				foreach ($this->$sidedish()->getAmounts() as $amount) {										
					$items[] = array(
//						'amount' => $amount->getUid(),
						'amount' => $amount,                      
						'quantity' => $amount->getQuantity(),			
						'unit' => $amount->getUnit(),
						'goods' => $amount->getGoods()->getUid(),						
						'name' => $amount->getGoods()->getName(),
						'shop' => $amount->getGoods()->getShop()->getName(),
						'parent' => 'Tx_Vegamatic_Domain_Model_Dishes',
						'exclude' => 0,		
					);
				}
			}	
		}

		// merge together all items from all dishes to one list - use the goods uids as keys for later comparison with the special items set for the week
		$shoppingList = array();
		if ($items) {
			foreach ($items as $key => $item) {
				$uid = $item['goods'];
				// same item: quantity addition
				if ($uid == $shoppingList[$uid]['goods']) {
					$shoppingList[$uid]['quantity'] = $shoppingList[$uid]['quantity'] + $item['quantity'];
				// different item, add to list
				} else {
					$shoppingList[$uid] = $items[$key];
				}
			}
		}
		
		// fuse in additional amounts
		if (is_object($this->getAdditionalAmounts())) {
			foreach ($this->getAdditionalAmounts() as $additionalAmount) {
				$goodsUid = $additionalAmount->getGoods()->getUid();
				$shoppingList[$goodsUid] = array(
//					'amount' => $additionalAmount->getUid(),
					'amount' => $additionalAmount,
					'quantity' => $additionalAmount->getQuantity(),
					'unit' => $additionalAmount->getUnit(),
					'goods' => $goodsUid,					
					'name' => $additionalAmount->getGoods()->getName(),					
					'shop' => $additionalAmount->getGoods()->getShop()->getName(),
					'parent' => 'Tx_Vegamatic_Domain_Model_Weeks',
					'exclude' => $additionalAmount->getExclude(),				
				);			
			}
		}		
		
		// now bring on the overlays (= excluded / modified items)
// note: if an amount has values for quantity / unit we can assume that it has been modified and mark it like this
		if (is_object($this->getOverlayAmounts())) {
			foreach ($this->getOverlayAmounts() as $overlayAmount) {
				$goodsUid = $overlayAmount->getGoods()->getUid();
				// find the item on the list that will get the overlay
				if ($shoppingList[$goodsUid]['goods']) {
//					$shoppingList[$goodsUid]['amount'] = $overlayAmount->getUid();
					$shoppingList[$goodsUid]['amount'] = $overlayAmount;
					$shoppingList[$goodsUid]['parent'] = 'Tx_Vegamatic_Domain_Model_Weeks';
					if ($overlayAmount->getQuantity()) $shoppingList[$goodsUid]['quantity'] = $overlayAmount->getQuantity();
					if ($overlayAmount->getUnit()) $shoppingList[$goodsUid]['unit']	= $overlayAmount->getUnit();						
					$shoppingList[$goodsUid]['exclude'] = $overlayAmount->getExclude();
					$shoppingList[$goodsUid]['overlay'] = 1;
				} else {
					// there was no item on the list that matches the specified overlay - remove it
					$this->removeOverlayAmount($overlayAmount); 
				}
			}
		}
	
#		return array_values($shoppingList);
		return $shoppingList;
	}
	
}
?>