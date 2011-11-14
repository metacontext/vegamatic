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
class Tx_Vegamatic_Controller_ShopsController extends Tx_Extbase_MVC_Controller_ActionController {

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
		$shops = $this->shopsRepository->findAll();
		$this->view->assign('shops', $shops);
	}

	/**
	 * action show
	 *
	 * @param $shops
	 * @return void
	 */
	public function showAction(Tx_Vegamatic_Domain_Model_Shops $shops) {
		$this->view->assign('shops', $shops);
	}

	/**
	 * action new
	 *
	 * @param $newShops
	 * @dontvalidate $newShops
	 * @return void
	 */
	public function newAction(Tx_Vegamatic_Domain_Model_Shops $newShops = NULL) {
		$this->view->assign('newShops', $newShops);
	}

	/**
	 * action create
	 *
	 * @param $newShops
	 * @return void
	 */
	public function createAction(Tx_Vegamatic_Domain_Model_Shops $newShops) {
		$this->shopsRepository->add($newShops);
		$this->flashMessageContainer->add('Your new Shops was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $shops
	 * @return void
	 */
	public function editAction(Tx_Vegamatic_Domain_Model_Shops $shops) {
		$this->view->assign('shops', $shops);
	}

	/**
	 * action update
	 *
	 * @param $shops
	 * @return void
	 */
	public function updateAction(Tx_Vegamatic_Domain_Model_Shops $shops) {
		$this->shopsRepository->update($shops);
		$this->flashMessageContainer->add('Your Shops was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $shops
	 * @return void
	 */
	public function deleteAction(Tx_Vegamatic_Domain_Model_Shops $shops) {
		$this->shopsRepository->remove($shops);
		$this->flashMessageContainer->add('Your Shops was removed.');
		$this->redirect('list');
	}

}
?>