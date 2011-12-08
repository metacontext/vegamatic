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
class Tx_Vegamatic_Controller_GoodsController extends Tx_Extbase_MVC_Controller_ActionController {
	
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
	 * action list
	 *
	 * @return string HTML template/partial
	 */
	public function listAction() {
		$this->view->assign('goods', $this->goodsRepository->findAllWithOrderings('name'));
		$this->view->assign('shops', $this->shopsRepository->findAllWithOrderings('name'));
		if ($this->request->hasArgument('addProduct')) $this->view->assign('addProduct', 1);	
		if ($this->request->hasArgument('editProduct')) $this->view->assign('editProduct', $this->request->getArgument('editProduct'));
		if ($this->request->hasArgument('newShops')) $this->view->assign('newShops', 1);		
	}
	
	/*
	 * add new goods action
	 * uses the same template as list to which a form is appended based on argument
	 * 
	 * @return void
	 */
	public function newAction() {
		$this->forward('list', 'Goods', NULL, array('addProduct' => 1));
	}
	
	/*
	 * create goods action
	 * 
	 * @param Tx_Vegamatic_Domain_Model_Goods $newGoods
	 * 
	 * @return void
	 */
	public function createAction(Tx_Vegamatic_Domain_Model_Goods $newGoods) {
		$this->goodsRepository->add($newGoods);
		$this->flashMessageContainer->add('Your new product was created.');
		$this->redirect('list');		
	}
	
	/*
	 * edit goods action
	 * 
	 * @param Tx_Vegamatic_Domain_Model_Goods $product
	 * 
	 * @return void
	 */
	public function editAction(Tx_Vegamatic_Domain_Model_Goods $product) {
		$this->forward('list', 'Goods', NULL, array('editProduct' => $product));
	}
	
	/*
	 * update goods function
	 * 
	 * @param Tx_Vegamatic_Domain_Model_Goods $goods
	 * 
	 * @return void
	 * 
	 */
	public function updateAction(Tx_Vegamatic_Domain_Model_Goods $goods) {
		$this->goodsRepository->update($goods);
		$this->flashMessageContainer->add('Your product was updated.');
		$this->redirect('list');		
	}
	
	/**
	 * action delete
	 *
	 * @param $product
	 * 
	 * @return void
	 */
	public function deleteAction(Tx_Vegamatic_Domain_Model_Goods $product) {		
		// first find all amounts where this item is used and delete them
		// @cascade remove will not help here, since it could only be set on the amounts side
		$amountsWithThisItem = $this->amountsRepository->findByGoods($product);
		if (count($amountsWithThisItem) > 0) {	
			foreach ($amountsWithThisItem as $amount) {
				$this->amountsRepository->remove($amount);
			}
		}
		
		// now remove the item; 	
		$this->goodsRepository->remove($product);
		$this->flashMessageContainer->add('Your product was removed.');
		$this->redirect('list');
	}
	
	/*
	 * add new shops
	 * 
	 * @return void
	 */
	public function newShopsAction() {
		$this->forward('list', 'Goods', NULL, array('newShops' => 1));
	}	
	
	/*
	 * creates a new shop
	 * 
	 * @param Tx_Vegamatic_Domain_Model_Shops $newShop
	 * 
	 * @return void
	 */
	public function createShopsAction(Tx_Vegamatic_Domain_Model_Shops $newShop) {
		$this->shopsRepository->add($newShop);
		$this->flashMessageContainer->add('Your new shop was created.');
		$this->redirect('list');		
	}

}
?>