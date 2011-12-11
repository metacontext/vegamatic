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
		$this->view->assign('weeks', $this->weeksRepository->findAllWithOrderings('weekstamp'));
	}

	/**
	 * action show
	 *
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * 
	 * @return string The HTML for the show action
	 */
	public function showAction(Tx_Vegamatic_Domain_Model_Weeks $week) {
		$this->view->assign('days', Tx_Vegamatic_Utility_Datetime::getNextSevenDays($week->getWeekstamp()));
		$this->view->assign('week', $week);
		$this->view->assign('dishes', $this->dishesRepository->findAllWithOrderings('name'));
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
	 * 
	 * @return void
	 */
	public function createAction(Tx_Vegamatic_Domain_Model_Weeks $newWeeks) {
		$this->weeksRepository->add($newWeeks);
		$this->flashMessageContainer->add('Your new Week was created.');
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
	 * @param $week
	 * @return void
	 */
	public function deleteAction(Tx_Vegamatic_Domain_Model_Weeks $week) {
		$this->weeksRepository->remove($week);
		$this->flashMessageContainer->add('Your Week was removed.');
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
		$this->view->assign('maindishes', $this->dishesRepository->findDishByTypeWithOrderings(1));
		$this->view->assign('sidedishes', $this->dishesRepository->findDishByTypeWithOrderings(2));
		$this->view->assign('week', $week);
		$this->view->assign('slot', $slot);
		$this->view->assign('dishes', $this->dishesRepository->findAllWithOrderings('name'));		
	}
	
	/**
	 * remove a dish from a week slot
	 *
	 * @param Tx_Vegamatic_Domain_Model_Weeks $weeks
	 * @param integer $slot
	 * 
	 * @return void
	 */
	public function removeDishAction(Tx_Vegamatic_Domain_Model_Weeks $week, $slot) {
		$maindishes = array(1 => 1, 2 => 3, 3 => 5, 4 => 7, 5 => 9, 6 => 11, 7 => 13);
		$sidedishes = array(1 => 2, 2 => 4, 3 => 6, 4 => 8, 5 => 10, 6 => 12, 7 => 14);		
		if (($slot % 2) != 0) { $slot = 'removeMaindish'.array_search($slot, $maindishes);
		} else { $slot = 'removeSidedish'.array_search($slot, $sidedishes); }
		$week->$slot();
		$this->redirect('show', 'Weeks', NULL, array('week' => $week));			
	}
	
	/**
	 * exclude amount: excludes an amount from the dishes/shopping list by creating/updating an amount set for the week (setExclude = 1)
	 * 
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * @param Tx_Vegamatic_Domain_Model_Goods $goods
	 * 
	 * @return void
	 * 
	 */
	public function excludeAmountAction(Tx_Vegamatic_Domain_Model_Weeks $week, Tx_Vegamatic_Domain_Model_Goods $goods) {		
		// check if overlay amount already exists; if yes, update this
		if (is_object($week->getOverlayAmounts())) {
			foreach ($week->getOverlayAmounts() as $overlayAmount) {				
				if ($overlayAmount->getGoods()->getUid() == $goods->getUid() && $overlayAmount->getExclude() < 1) {
					// update & forward
					$overlayAmount->setExclude(1);
					$this->forward('updateAmount', 'Weeks', NULL, array('week' => $week, 'amount' => $overlayAmount));					
				}
			}
		}
		// no overlay amount for the given week and goods exists, create a new one
		$this->forward('createAmount', 'Weeks', NULL, array(
			'week' => $week,
			'amountTypeToAdd' => 'addOverlayAmount',
			'newAmounts' => array(0 => array('setGoods' => $goods, 'setExclude' => 1)),
			'action' => 'createAmount',
			'controller' => 'Weeks'
		));
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
			// no, create an empty one, then only update has to be called from view (quantity and unit for this new overlay will be filled in on the shopping list until the user modifies it)
			$overlayAmount = new Tx_Vegamatic_Domain_Model_Amounts();
			$overlayAmount->setGoods($goods);
			$week->addOverlayAmount($overlayAmount);
			// rederect to the same action for persisting the new amount - this will then display the form with the now existing overlay
			$this->redirect('modifyAmount', 'Weeks', NULL, array('week' => $week, 'goods' => $goods));
		}
		$this->view->assign('days', Tx_Vegamatic_Utility_Datetime::getNextSevenDays($week->getWeekstamp()));
		$this->view->assign('week', $week);
		$this->view->assign('modifyAmount', $goods->getUid());
		$this->view->assign('dishes', $this->dishesRepository->findAllWithOrderings('name'));		
	}
	
	/**
	 * add new amounts to this weeks additional amounts
	 * 
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * 
	 * @return HTML string / view for this action
	 */
	public function addAmountAction(Tx_Vegamatic_Domain_Model_Weeks $week) {
		$this->view->assign('goods', array_merge(array(0 => 'Choose Item'), $this->goodsRepository->findUnlistedGoods($week->getShoppingList())));
		$this->view->assign('shops', array_merge(array(0 => 'Choose Shop'), $this->shopsRepository->findAllWithOrderings('name')->toArray()));		
		$this->view->assign('days', Tx_Vegamatic_Utility_Datetime::getNextSevenDays($week->getWeekstamp()));
		$this->view->assign('week', $week);
		$this->view->assign('addAmount', 1);
		$this->view->assign('dishes', $this->dishesRepository->findAllWithOrderings('name'));		
	}	
	
	/**
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * @param string $amountTypeToAdd
	 * 
	 * @dontverifyrequesthash
	 * 
	 * @return void
	 */
	public function createAmountAction(Tx_Vegamatic_Domain_Model_Weeks $week, $amountTypeToAdd) {
		
		$arguments = $this->request->getArguments();
		
		// if the incoming request has new amounts to create (in form of an array), hand them over to the amounts controller for object construction
		if (is_array($arguments['newAmounts'])) {	
			$arguments['callingAction'] = $arguments['action']; unset($arguments['action']);		
			$arguments['callingController'] = $arguments['controller']; unset($arguments['controller']);			
			$this->forward('new', 'Amounts', NULL, $arguments);
		}
		
		// check if the correct amount type (additional/overlay) has been submitted and if so add the new amounts to the week
		if (($amountTypeToAdd == 'addOverlayAmount' || $amountTypeToAdd == 'addAdditionalAmount') && is_object($arguments['newAmounts'])) {
			foreach ($arguments['newAmounts'] as $newAmount) {
				$week->$amountTypeToAdd($newAmount);
			}
		} else { die('VEGAMATIC TODO: Throw error - wrong amount type submitted'); }

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
	
	/**
	 * fills up the week with random dishes
	 * 
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * 
	 * @return void
	 */
	public function randomizeAction(Tx_Vegamatic_Domain_Model_Weeks $week) {
		
		// find out if there are any dishes already set
		for ($i = 1; $i < 8; $i++) {
			$maindishGetter = 'getMaindish'.$i;
			$sidedishGetter = 'getSidedish'.$i;
			if (is_object($week->$maindishGetter())) $maindishesToExclude[] = $week->$maindishGetter()->getUid();
			if (is_object($week->$sidedishGetter())) $sidedishesToExclude[] = $week->$sidedishGetter()->getUid();
		}
		
		// find all dishes that are not set
		$maindishesAvailable = $this->dishesRepository->findAllBut($maindishesToExclude, 1);
		$sidedishesAvailable = $this->dishesRepository->findAllBut($sidedishesToExclude, 2);
		
		// get their uids
		foreach ($maindishesAvailable as $dish) {
			$maindishes[] = $dish->getUid();
		}
		foreach ($sidedishesAvailable as $dish) {
			$sidedishes[] = $dish->getUid();
		}

		// now set as many as possible randomly on the days
		for ($i = 1; $i < 8; $i++) {
			
			$maindishGetter = 'getMaindish'.$i;
			$sidedishGetter = 'getSidedish'.$i;			
			$maindishSetter = 'setMaindish'.$i;
			$sidedishSetter = 'setSidedish'.$i;
					
			if (!is_object($week->$maindishGetter()) && count($maindishes) > 0) {
				$randomKey = array_rand($maindishes);
				$week->$maindishSetter($this->dishesRepository->findByUid($maindishes[$randomKey]));
				unset($maindishes[$randomKey]);
			}

			if (!is_object($week->$sidedishGetter()) && count($sidedishes) > 0) {
				$randomKey = array_rand($sidedishes);
				$week->$sidedishSetter($this->dishesRepository->findByUid($sidedishes[$randomKey]));
				unset($sidedishes[$randomKey]);
			}			
		}
		
		// persist
		$this->redirect('show', 'Weeks', NULL, array('week' => $week));
	}
}
?>