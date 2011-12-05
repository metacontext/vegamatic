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
class Tx_Vegamatic_Controller_AmountsController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * goodsRepository
	 *
	 * @var Tx_Vegamatic_Domain_Repository_GoodsRepository
	 */
	protected $goodsRepository;

	/**
	 * injectGoodsRepository
	 *
	 * @param Tx_Vegamatic_Domain_Repository_GoodsRepository $goodsRepository
	 * @return void
	 */
	public function injectGoodsRepository(Tx_Vegamatic_Domain_Repository_GoodsRepository $goodsRepository) {
		$this->goodsRepository = $goodsRepository;
	}
	
	/**
	 * amountsRepository
	 *
	 * @var Tx_Vegamatic_Domain_Repository_AmountsRepository
	 */
	protected $amountsRepository;

	/**
	 * injectAmountsRepository
	 *
	 * @param Tx_Vegamatic_Domain_Repository_AmountsRepository $amountsRepository
	 * @return void
	 */
	public function injectAmountsRepository(Tx_Vegamatic_Domain_Repository_AmountsRepository $amountsRepository) {
		$this->amountsRepository = $amountsRepository;
	}	

	/**
	 * shopsRepository
	 *
	 * @var Tx_Vegamatic_Domain_Repository_ShopsRepository
	 */
	protected $shopsRepository;

	/**
	 * injectShopsRepository
	 *
	 * @param Tx_Vegamatic_Domain_Repository_ShopsRepository $shopsRepository
	 * @return void
	 */
	public function injectShopsRepository(Tx_Vegamatic_Domain_Repository_ShopsRepository $shopsRepository) {
		$this->shopsRepository = $shopsRepository;
	}
	
	/**
	 * transforms incoming amounts (in an array) to amount objects
	 * 
	 * @return object storage
	 * 
	 * case logic for building the amount objects according to the given amount properties
	 * 1: no setGoods, no newGoods => error
	 * 2: setGoods, no newGoods or newGoods => setGoods takes precedence
	 * 3: no setGoods, newGoods
	 * 3.1: no setShop, no newShop => error
	 * 3.2: setShop, no newShop or newShop => setShop takes precedence
	 * 3.3: noSetShop, newShop => createShopAction
	 * 
	 */
	public function newAction() {
		
		$arguments = $this->request->getArguments();
		
		if (is_array($arguments['newAmounts']) && count($arguments['newAmounts']) > 0) {
				
			$newAmounts = new Tx_Extbase_Persistence_ObjectStorage();
			
			// VEGAMATIC TODO: Insert a check if the submitted amount is empty => removed
			
			foreach ($arguments['newAmounts'] as $amountProperties) {
				
				// case 2 - setGoods, no newGoods or newGoods => setGoods takes precedence
				if ($amountProperties['setGoods']) {
					
					// check if goods already is an object, otherwise fetch it from repository by the given uid
					if (!is_object($amountProperties['setGoods']) && (int) $amountProperties['setGoods'] > 0) {
						$amountProperties['setGoods'] = $this->goodsRepository->findByUid((int) $amountProperties['setGoods']);
					}
					
					// check again if we now have a valid object
					if (!is_object($amountProperties['setGoods'])) {
						die('VEGAMATIC TODO: Throw error either no valid setGoods integer submitted or object not found for the given integer');
					}
					
				// case 3 - no setGoods, newGoods
				} elseif ($amountProperties['newGoods']) {
					
					// create new goods object
					$newGoods = new Tx_Vegamatic_Domain_Model_Goods();
					// VEGAMATIC TODO: There should probaly be a check on goods repository that this item doesn't exist - name unique
					$newGoods->setName($amountProperties['newGoods']);
					
					// case 3.2 - setShop, no newShop or newShop => setShop takes precedence
					if ($amountProperties['setShop']) {
						
						// get it as object from repository - at the same time tests if the submitted shop is valid				
						$amountProperties['setShop'] = $this->shopsRepository->findByUid((int) $amountProperties['setShop']);
						if (is_object($amountProperties['setShop'])) { $newGoods->setShop($amountProperties['setShop']);
						} else { die('VEGAMATIC TODO: Throw error no valid integer given for setShop'); }
						
					// case 3.3 - noSetShop, newShop => createShopAction
					} elseif ($amountProperties['newShop']) {
	
						$newShop = new Tx_Vegamatic_Domain_Model_Shops();
						// VEGAMATIC TODO: There should be a check on shops repository that this shop doesn't exist - name unique
						// btw, what happens if the users enters the new shop twice for separate amounts?
						$newShop->setName($amountProperties['newShop']);
						$newGoods->setShop($newShop);
						
					// case 3.1 - no setShop, no newShop => error
					} else { die('VEGAMATIC TODO: Throw error for case 3.1 - no setShop, no newShop'); }
					
					$amountProperties['setGoods'] = $newGoods;
	
				// case 1 - no setGoods, no newGoods (=error), take out this amount
				} else { 
					continue;
				}
				
				unset($amountProperties['newGoods']);
				unset($amountProperties['setShop']);
				unset($amountProperties['newShop']);
			
				$amount = new Tx_Vegamatic_Domain_Model_Amounts();
				foreach ($amountProperties as $setter => $value) {
					$amount->$setter($value);
				}
				$newAmounts->attach($amount);
			}
		} else { die('VEGAMATIC TODO: Throw error - no newAmounts in current request'); }
		
		$arguments['newAmounts'] = $newAmounts;
		
		$this->forward($arguments['callingAction'], $arguments['callingController'], NULL, $arguments);
	}
}
?>