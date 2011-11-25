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
		die();
		
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
					$this->amountsRepository->update($overlayAmount);
					$this->redirect('show', 'Weeks', NULL, array('week' => $week));			
				}
			}
		}

		// no overlay amount found for this week and goods, create a new one
		$overlayAmount = new Tx_Vegamatic_Domain_Model_Amounts();
		$overlayAmount->setGoods($goods);
		$overlayAmount->setExclude(1);
		$week->addOverlayAmount($overlayAmount);
		$this->redirect('show', 'Weeks', NULL, array('week' => $week));
	}
	
	/**
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * @param Tx_Vegamatic_Domain_Model_Amounts $amount
	 * 
	 * @return void
	 */
	public function includeAmountAction(Tx_Vegamatic_Domain_Model_Weeks $week, Tx_Vegamatic_Domain_Model_Amounts $amount) {
		// reset exclude flag - overlay amount will already exist so its safe to just update
		$amount->setExclude(0);
		$this->amountsRepository->update($amount);	
		$this->redirect('show', 'Weeks', NULL, array('week' => $week));
	}

	/**
	 * modifies the quantity and/or unit of an (accumulated) amount (by creating a new one or updating an existing one from the week object)
	 * 
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * @param Tx_Vegamatic_Domain_Model_Amounts $amount
	 * 
	 * @return string Template/Partial for this action
	 * 
	 * @dontvalidate $amount
	 * 
	 */
	public function modifyAmountAction(Tx_Vegamatic_Domain_Model_Weeks $week, Tx_Vegamatic_Domain_Model_Amounts $amount = NULL) {
		// modify should first find out if an amount for the week (by parent) already exists - if so, this is updated and no new amount is created
		// has own template
	}

	/**
	 * adds an amount to the weeks shopping list (will override existing amounts if the related goods are the same)
	 * 
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * 
	 * @return string Template/Partial
	 */
	public function addAmountAction(Tx_Vegamatic_Domain_Model_Weeks $week) {
		
		$goods = array();
		foreach ($this->goodsRepository->findAll() as $good) {
			$goods[$good->getUid()] = $good->getName();
		}
		
		$this->view->assign('goods', $goods);
		$this->view->assign('week', $week);
		$this->view->assign('currentAction', 'addAmount');		
	}
	
	/**
	 * create new amount for the week
	 * 
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * @param Tx_Vegamatic_Domain_Model_Amounts $amount
	 * @dontvalidate $amount
	 * 
	 * @return void
	 */
	public function createAmountAction(Tx_Vegamatic_Domain_Model_Weeks $week, Tx_Vegamatic_Domain_Model_Amounts $amount) {
		
		// add amount to the current week
		$week->addAmount($amount);

		// redirect to show again - persist the added, new amount
		$this->redirect('show', 'Weeks', NULL, array('week' => $week));		
	}
	
	/**
	 * include amount action: destroys the amount that has it's exclude flag set to 1 (other amounts with same goods will be included again)
	 * 
	 * @param Tx_Vegamatic_Domain_Model_Weeks $week
	 * @param Tx_Vegamatic_Domain_Model_Amounts $amount
	 * 
	 * @return void
	 * 
	 */
	public function removeAmountAction(Tx_Vegamatic_Domain_Model_Weeks $week, Tx_Vegamatic_Domain_Model_Amounts $amount) {
		
		// remove amount the current week
		$week->removeAmount($amount);

		// show again
		$this->redirect('show', 'Weeks', NULL, array('week' => $week));
	}	
}
?>