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
class Tx_Vegamatic_Controller_WeeksController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * weeksRepository
	 *
	 * @var Tx_Vegamatic_Domain_Repository_WeeksRepository
	 */
	protected $weeksRepository;

	/**
	 * injectWeeksRepository
	 *
	 * @param Tx_Vegamatic_Domain_Repository_WeeksRepository $weeksRepository
	 * @return void
	 */
	public function injectWeeksRepository(Tx_Vegamatic_Domain_Repository_WeeksRepository $weeksRepository) {
		$this->weeksRepository = $weeksRepository;
	}
	
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
	 * dishesRepository
	 *
	 * @var Tx_Vegamatic_Domain_Repository_DishesRepository
	 */
	protected $dishesRepository;

	/**
	 * injectDishesRepository
	 *
	 * @param Tx_Vegamatic_Domain_Repository_DishesRepository $dishesRepository
	 * @return void
	 */
	public function injectDishesRepository(Tx_Vegamatic_Domain_Repository_DishesRepository $dishesRepository) {
		$this->dishesRepository = $dishesRepository;
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
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$weeks = $this->weeksRepository->findAll();
		$this->view->assign('weeks', $weeks);
	}

	/**
	 * action show
	 *
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * @return string The HTML for the show action
	 */
	public function showAction(Tx_Vegamatic_Domain_Model_Weeks $week) {
		$this->view->assign('days', Tx_Vegamatic_Utility_Datetime::getNextSevenDays($week->getWeekstamp()));
		$this->view->assign('week', $week);
	}

	/**
	 * action new
	 *
	 * @param $newWeeks
	 * @dontvalidate $newWeeks
	 * @return void
	 */
	public function newAction(Tx_Vegamatic_Domain_Model_Weeks $newWeeks = NULL) {
		$this->view->assign('newWeeks', $newWeeks);
	}

	/**
	 * action create
	 *
	 * @param $newWeeks
	 * @return void
	 */
	public function createAction(Tx_Vegamatic_Domain_Model_Weeks $newWeeks) {
		$this->weeksRepository->add($newWeeks);
		$this->flashMessageContainer->add('Your new Weeks was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $weeks
	 * @return void
	 */
	public function editAction(Tx_Vegamatic_Domain_Model_Weeks $weeks) {
		$this->view->assign('weeks', $weeks);
	}

	/**
	 * action update
	 *
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * 
	 * @return void
	 */
	public function updateAction(Tx_Vegamatic_Domain_Model_Weeks $week) {
		$this->weeksRepository->update($week);
		$this->flashMessageContainer->add('Your Week was updated.');
		$this->redirect('show', 'Weeks', NULL, array('week' => $week));
	}
	
	/**
	 * action delete
	 *
	 * @param $weeks
	 * @return void
	 */
	public function deleteAction(Tx_Vegamatic_Domain_Model_Weeks $weeks) {
		$this->weeksRepository->remove($weeks);
		$this->flashMessageContainer->add('Your Weeks was removed.');
		$this->redirect('list');
	}

	/**
	 * action addDish
	 *
	 * @param Tx_Vegamatic_Domain_Model_Weeks $weeks
	 * @param integer $slot
	 * 
	 * @return Template/Partial string
	 */
	public function addDishAction(Tx_Vegamatic_Domain_Model_Weeks $week, $slot) {
		$this->view->assign('days', Tx_Vegamatic_Utility_Datetime::getNextSevenDays($week->getWeekstamp()));
		$this->view->assign('maindishes', $this->dishesRepository->findByType(1));
		$this->view->assign('sidedishes', $this->dishesRepository->findByType(2));
		$this->view->assign('week', $week);		
		$this->view->assign('slot', $slot);
	}
	
	/**
	 * remove a dish from a week slot
	 *
	 * @param Tx_Vegamatic_Domain_Model_Weeks $weeks
	 * @param integer $uid
	 * 
	 * @return void
	 */
	public function removeDishAction(Tx_Vegamatic_Domain_Model_Weeks $week, $uid) {
		
#		$setter = 'set'.$property;
#		$week->$setter($emptyObject);
		die('removeDishAction not yet implemented');
		
		$week->maindish1 = 0;
		
		// redirect to show again - persist new amount
		$this->redirect('show', 'Weeks', NULL, array('week' => $week));			
	}
	
	/**
	 * exclude amount: excludes an amount from the dishes/shopping list by creating/updating an amount set in the week (setExclude)
	 * 
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * @param Tx_Vegamatic_Domain_Model_Goods $goods
	 * 
	 * @return void
	 * 
	 */
	public function excludeAmountAction(Tx_Vegamatic_Domain_Model_Weeks $week, Tx_Vegamatic_Domain_Model_Goods $goods) {		
		// check if overlay amount already exists; if found, update
		if (is_object($week->getOverlayAmounts())) {
			foreach ($week->getOverlayAmounts() as $overlayAmount) {				
				if ($overlayAmount->getGoods()->getUid() == $goods->getUid() && $overlayAmount->getExclude() < 1) {
					// update & forward
					$overlayAmount->setExclude(1);
					$this->forward('updateAmount', 'Weeks', NULL, array('week' => $week, 'amount' => $overlayAmount));					
				}
			}
		}
		// no overlay amount found for this week and goods, create a new one
		$this->forward('createAmount', 'Weeks', NULL, array('week' => $week, 'amountTypeToAdd' => 'addOverlayAmount', 'amountProperties' => array('setGoods' => $goods, 'setExclude' => 1)));
	}
	
	/**
	 * resets exclude flag - overlay amount will already exist so its safe to just update
	 * 
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * @param Tx_Vegamatic_Domain_Model_Amounts $amount
	 * 
	 * @return void
	 */
	public function includeAmountAction(Tx_Vegamatic_Domain_Model_Weeks $week, Tx_Vegamatic_Domain_Model_Amounts $amount) {
		$amount->setExclude(0);
		$this->forward('updateAmount', 'Weeks', NULL, array('week' => $week, 'amount' => $amount));					
	}
	
	/**
	 * displays an inline form for modifiying the quantity and/or unit of an amount (by creating or updating an overlay)
	 * 
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * @param Tx_Vegamatic_Domain_Model_Goods $goods
	 * 
	 * @return string Template/Partial for this action
	 * 
	 */
	public function modifyAmountAction(Tx_Vegamatic_Domain_Model_Weeks $week, Tx_Vegamatic_Domain_Model_Goods $goods) {
		// first find out if an overlay for the current goods already exists
		$shoppingList = $week->getShoppingList();
		if (!$shoppingList[$goods->getUid()]['overlay']) {
			// create an empty one, then only update has to be called from view (quantity and unit for this new overlay will be filled in on the shopping list until the user modifies it)
			$overlayAmount = new Tx_Vegamatic_Domain_Model_Amounts();
			$overlayAmount->setGoods($goods);
			$week->addOverlayAmount($overlayAmount);
			// persist and then display form with now existing overlay
			$this->redirect('modifyAmount', 'Weeks', NULL, array('week' => $week, 'goods' => $goods));
		}
		$this->view->assign('days', Tx_Vegamatic_Utility_Datetime::getNextSevenDays($week->getWeekstamp()));
		$this->view->assign('week', $week);
		$this->view->assign('modifyAmount', $goods->getUid());
	}
	
	/**
	 * add a new amount to this weeks additional amounts and/or create a completely new amount=>goods
	 * 
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * 
	 * @return HTML string / view for this action
	 */
	public function addAmountAction(Tx_Vegamatic_Domain_Model_Weeks $week) {
		$this->view->assign('unlistedGoods', array_merge(array(0 => 'Choose Item'), $this->goodsRepository->findUnlistedGoods($week->getShoppingList())));
		$this->view->assign('shops', array_merge(array(0 => 'Choose Shop'), $this->shopsRepository->findAll()->toArray()));		
		$this->view->assign('days', Tx_Vegamatic_Utility_Datetime::getNextSevenDays($week->getWeekstamp()));
		$this->view->assign('week', $week);
		$this->view->assign('addAmount', 1);
	}	
	
	/**
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * @param string $amountTypeToAdd
	 * @param array $amountProperties
	 * 
	 * 1: no setGoods, no newGoods => error
	 * 2: setGoods, no newGoods or newGoods => setGoods takes precedence
	 * 3: no setGoods, newGoods
	 * 3.1: no setShop, no newShop => error
	 * 3.2: setShop, no newShop or newShop => setShop takes precedence
	 * 3.3: noSetShop, newShop => createShopAction
	 * 
	 * 
	 * @return void
	 */
	public function createAmountAction(Tx_Vegamatic_Domain_Model_Weeks $week, $amountTypeToAdd, $amountProperties) {	
		
		if (($amountTypeToAdd == 'addOverlayAmount' || $amountTypeToAdd == 'addAdditionalAmount') && is_array($amountProperties) && count($amountProperties) > 0) {
			
			// case 2 - setGoods, no newGoods or newGoods => setGoods takes precedence
			if ($amountProperties['setGoods']) {
				
				// check if goods its already an object, otherwise fetch it from repository by the given uid
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
				$newGoods->setName($amountProperties['newGoods']);
				
				// case 3.2 - setShop, no newShop or newShop => setShop takes precedence
				if ($amountProperties['setShop']) {
					
					// get it as object from repository - at the same tests if the submitted shop is valid				
					$amountProperties['setShop'] = $this->shopsRepository->findByUid((int) $amountProperties['setShop']);
					if (is_object($amountProperties['setShop'])) { $newGoods->setShop($amountProperties['setShop']);
					} else { die('VEGAMATIC TODO: Throw error no valid integer given for setShop'); }
					
				// case 3.3 - noSetShop, newShop => createShopAction
				} elseif ($amountProperties['newShop']) {

					$newShop = new Tx_Vegamatic_Domain_Model_Shops();
					$newShop->setName($amountProperties['newShop']);
					$newGoods->setShop($newShop);
					
				// case 3.1 - no setShop, no newShop => error
				} else { die('VEGAMATIC TODO: Throw error for case 3.1 - no setShop, no newShop'); }
				
				unset($amountProperties['newGoods']);
				unset($amountProperties['setShop']);
				unset($amountProperties['newShop']);
				
				$amountProperties['setGoods'] = $newGoods;

			// case 1 - no setGoods, no newGoods => error
			} else { die('VEGAMATIC TODO: Throw error for case 1 - no setGoods, no newGoods'); }
		
			$amount = new Tx_Vegamatic_Domain_Model_Amounts();
			foreach ($amountProperties as $setter => $value) {
				$amount->$setter($value);
			}
			
		} else { die('VEGAMATIC TODO: Throw error'); }
		
		$week->$amountTypeToAdd($amount);
		$this->redirect('show', 'Weeks', NULL, array('week' => $week));		
	}

	/**
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * @param Tx_Vegamatic_Domain_Model_Amounts $amount
	 * @dontvalidate $amount
	 * 
	 * @return void
	 */	
	public function updateAmountAction(Tx_Vegamatic_Domain_Model_Weeks $week, Tx_Vegamatic_Domain_Model_Amounts $amount) {
		$this->amountsRepository->update($amount);
		$this->redirect('show', 'Weeks', NULL, array('week' => $week));
	}
}
?>