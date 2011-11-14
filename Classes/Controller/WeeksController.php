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
	 * @param $weeks
	 * @return void
	 */
	public function showAction(Tx_Vegamatic_Domain_Model_Weeks $weeks) {
		$this->view->assign('weeks', $weeks);
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
	 * @param $weeks
	 * @return void
	 */
	public function updateAction(Tx_Vegamatic_Domain_Model_Weeks $weeks) {
		$this->weeksRepository->update($weeks);
		$this->flashMessageContainer->add('Your Weeks was updated.');
		$this->redirect('list');
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

}
?>