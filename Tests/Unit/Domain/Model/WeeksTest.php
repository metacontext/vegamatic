<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 tesselation <t.esselation@gmx.net>
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_Vegamatic_Domain_Model_Weeks.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Veg-A-Matic
 *
 * @author tesselation <t.esselation@gmx.net>
 */
class Tx_Vegamatic_Domain_Model_WeeksTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Vegamatic_Domain_Model_Weeks
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Vegamatic_Domain_Model_Weeks();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getWeekstampReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setWeekstampForDateTimeSetsWeekstamp() { }
	
	/**
	 * @test
	 */
	public function getMaindishReturnsInitialValueForObjectStorageContainingTx_Vegamatic_Domain_Model_Dishes() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getMaindish()
		);
	}

	/**
	 * @test
	 */
	public function setMaindishForObjectStorageContainingTx_Vegamatic_Domain_Model_DishesSetsMaindish() { 
		$maindish = new Tx_Vegamatic_Domain_Model_Dishes();
		$objectStorageHoldingExactlyOneMaindish = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneMaindish->attach($maindish);
		$this->fixture->setMaindish($objectStorageHoldingExactlyOneMaindish);

		$this->assertSame(
			$objectStorageHoldingExactlyOneMaindish,
			$this->fixture->getMaindish()
		);
	}
	
	/**
	 * @test
	 */
	public function addMaindishToObjectStorageHoldingMaindish() {
		$maindish = new Tx_Vegamatic_Domain_Model_Dishes();
		$objectStorageHoldingExactlyOneMaindish = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneMaindish->attach($maindish);
		$this->fixture->addMaindish($maindish);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneMaindish,
			$this->fixture->getMaindish()
		);
	}

	/**
	 * @test
	 */
	public function removeMaindishFromObjectStorageHoldingMaindish() {
		$maindish = new Tx_Vegamatic_Domain_Model_Dishes();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($maindish);
		$localObjectStorage->detach($maindish);
		$this->fixture->addMaindish($maindish);
		$this->fixture->removeMaindish($maindish);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getMaindish()
		);
	}
	
	/**
	 * @test
	 */
	public function getSidedishReturnsInitialValueForObjectStorageContainingTx_Vegamatic_Domain_Model_Dishes() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getSidedish()
		);
	}

	/**
	 * @test
	 */
	public function setSidedishForObjectStorageContainingTx_Vegamatic_Domain_Model_DishesSetsSidedish() { 
		$sidedish = new Tx_Vegamatic_Domain_Model_Dishes();
		$objectStorageHoldingExactlyOneSidedish = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneSidedish->attach($sidedish);
		$this->fixture->setSidedish($objectStorageHoldingExactlyOneSidedish);

		$this->assertSame(
			$objectStorageHoldingExactlyOneSidedish,
			$this->fixture->getSidedish()
		);
	}
	
	/**
	 * @test
	 */
	public function addSidedishToObjectStorageHoldingSidedish() {
		$sidedish = new Tx_Vegamatic_Domain_Model_Dishes();
		$objectStorageHoldingExactlyOneSidedish = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneSidedish->attach($sidedish);
		$this->fixture->addSidedish($sidedish);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneSidedish,
			$this->fixture->getSidedish()
		);
	}

	/**
	 * @test
	 */
	public function removeSidedishFromObjectStorageHoldingSidedish() {
		$sidedish = new Tx_Vegamatic_Domain_Model_Dishes();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($sidedish);
		$localObjectStorage->detach($sidedish);
		$this->fixture->addSidedish($sidedish);
		$this->fixture->removeSidedish($sidedish);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getSidedish()
		);
	}
	
	/**
	 * @test
	 */
	public function getAmountsReturnsInitialValueForObjectStorageContainingTx_Vegamatic_Domain_Model_Amounts() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getAmounts()
		);
	}

	/**
	 * @test
	 */
	public function setAmountsForObjectStorageContainingTx_Vegamatic_Domain_Model_AmountsSetsAmounts() { 
		$amount = new Tx_Vegamatic_Domain_Model_Amounts();
		$objectStorageHoldingExactlyOneAmounts = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneAmounts->attach($amount);
		$this->fixture->setAmounts($objectStorageHoldingExactlyOneAmounts);

		$this->assertSame(
			$objectStorageHoldingExactlyOneAmounts,
			$this->fixture->getAmounts()
		);
	}
	
	/**
	 * @test
	 */
	public function addAmountToObjectStorageHoldingAmounts() {
		$amount = new Tx_Vegamatic_Domain_Model_Amounts();
		$objectStorageHoldingExactlyOneAmount = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneAmount->attach($amount);
		$this->fixture->addAmount($amount);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneAmount,
			$this->fixture->getAmounts()
		);
	}

	/**
	 * @test
	 */
	public function removeAmountFromObjectStorageHoldingAmounts() {
		$amount = new Tx_Vegamatic_Domain_Model_Amounts();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($amount);
		$localObjectStorage->detach($amount);
		$this->fixture->addAmount($amount);
		$this->fixture->removeAmount($amount);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getAmounts()
		);
	}
	
}
?>