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
class Tx_Vegamatic_Controller_DishesController extends Tx_Extbase_MVC_Controller_ActionController {
	
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
		$dishes = $this->dishesRepository->findAllWithOrderings();
		$this->view->assign('dishes', $dishes);
		$this->view->assign('referrerAction', $this->request->getArgument('referrerAction'));
		$this->view->assign('referrerController', $this->request->getArgument('referrerController'));		
	}

	/**
	 * action show
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $dish
	 * @return string The HTML for the show action
	 */
	public function showAction(Tx_Vegamatic_Domain_Model_Dishes $dish) {
		$this->view->assign('dish', $dish);
	}

	/**
	 * action new
	 *
	 * @param $newDish
	 * 
	 * @dontvalidate $newDish
	 * @dontverifyrequesthash
	 * 
	 * @return void
	 */
	public function newAction(Tx_Vegamatic_Domain_Model_Dishes $newDish = NULL) {
		$this->view->assign('goods', array_merge(array(0 => 'Choose Item'), $this->goodsRepository->findAllWithOrderings()->toArray()));	
		$this->view->assign('shops', array_merge(array(0 => 'Choose Shop'), $this->shopsRepository->findAllWithOrderings()->toArray()));	
		$this->view->assign('newDish', $newDish);
		$this->view->assign('referrerAction', $this->request->getArgument('referrerAction'));
		$this->view->assign('referrerController', $this->request->getArgument('referrerController'));
		if ($this->request->hasArgument('referrerObject')) $this->view->assign('referrerObject', $this->request->getArgument('referrerObject'));
	}

	/**
	 * action create
	 *
	 * @param $newDish
	 * 
	 * @dontverifyrequesthash
	 * 
	 * @return void
	 */
	public function createAction(Tx_Vegamatic_Domain_Model_Dishes $newDish) {
		
		$arguments = $this->request->getArguments();
		
		// if the incoming request has new amounts to create (as array), hand over to amounts controller
		if (is_array($arguments['newAmounts'])) {	
			$arguments['callingAction'] = $arguments['action']; unset($arguments['action']);		
			$arguments['callingController'] = $arguments['controller']; unset($arguments['controller']);			
			$this->forward('new', 'Amounts', NULL, $arguments);
		}
		
		// if any amounts were given, they should be in form of an object storage by now
		if (is_object($arguments['newAmounts']) && count($arguments['newAmounts']) > 0) $newDish->setAmounts($arguments['newAmounts']);
		
		// add new dish
		$this->dishesRepository->add($newDish);
		$this->flashMessageContainer->add('Your new dish was created.');
		
		// return to origin
		if ($arguments['referrerObject']) {
			$object = strtolower(substr($arguments['referrerController'], 0, -1));
			$this->redirect($arguments['referrerAction'], $arguments['referrerController'], NULL, array($object => $arguments['referrerObject']));
		} else {
			$this->redirect($arguments['referrerAction'], $arguments['referrerController']);
		}
	}

	/**
	 * action edit
	 *
	 * @param Tx_Vegamatic_Domain_Model_Dishes $dish
	 * 
	 * @return Tempalte/Partial
	 */
	public function editAction(Tx_Vegamatic_Domain_Model_Dishes $dish) {
		$this->view->assign('dish', $dish);
		// VEGAMATIC TODO: $this->goodsRepository->findGoodsNotInDish($dish)
		$this->view->assign('goods', array_merge(array(0 => 'Choose Item'), $this->goodsRepository->findAllWithOrderings()->toArray()));
		$this->view->assign('shops', array_merge(array(0 => 'Choose Shop'), $this->shopsRepository->findAllWithOrderings()->toArray()));
		$this->view->assign('referrerAction', $this->request->getArgument('referrerAction'));
		$this->view->assign('referrerController', $this->request->getArgument('referrerController'));		
		if ($this->request->hasArgument('referrerObject')) $this->view->assign('referrerObject', $this->request->getArgument('referrerObject'));
	}

	/**
	 * action update
	 *
	 * @param $dish
	 * 
	 * @dontverifyrequesthash
	 * 
	 * @return void
	 */
	public function updateAction(Tx_Vegamatic_Domain_Model_Dishes $dish) {
		
		$arguments = $this->request->getArguments();
		
		// new : if the incoming request has new amounts (as array), hand over to amounts controller for creating objects
		if (is_array($arguments['newAmounts'])) {	
			$arguments['callingAction'] = $arguments['action']; unset($arguments['action']);		
			$arguments['callingController'] = $arguments['controller']; unset($arguments['controller']);			
			$this->forward('new', 'Amounts', NULL, $arguments);
		}
		
		// if any amount objects were created, attach them to this dish
		if (is_object($arguments['newAmounts']) && count($arguments['newAmounts']) > 0) {
			foreach ($arguments['newAmounts'] as $newAmount) {
				$dish->addAmount($newAmount);
			}
		}
		
		// update: iterate through all existing amounts - if incoming $amount['setGoods'] is empty, remove the amount - otherwise update
		if (count($arguments['updateAmounts'] > 0)) {
			foreach ($dish->getAmounts() as $key => $amountToUpdate) {
				$uid = $amountToUpdate->getUid();
				// take into account that the object storage may also contain new object from above, therefore also test for $uid
				if ($uid && !$arguments['updateAmounts'][$uid]['setGoods']) {
					$dish->removeAmount($amountToUpdate);
				} elseif ($uid && $arguments['updateAmounts'][$uid]['setGoods']) {
					$amountToUpdate->setQuantity($arguments['updateAmounts'][$uid]['setQuantity']);
					$amountToUpdate->setUnit($arguments['updateAmounts'][$uid]['setUnit']);
					$this->amountsRepository->update($amountToUpdate);
				}
			}
		}
		
		// update existing dish
		$this->dishesRepository->update($dish);
		$this->flashMessageContainer->add('Your Dish was updated.');
		
		// return to origin
		if ($arguments['referrerObject']) {
			$object = strtolower(substr($arguments['referrerController'], 0, -1));
			$this->redirect($arguments['referrerAction'], $arguments['referrerController'], NULL, array($object => $arguments['referrerObject']));
		} else {
			$this->redirect($arguments['referrerAction'], $arguments['referrerController']);
		}
	}
}
?>