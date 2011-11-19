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
class Tx_Vegamatic_Domain_Model_Amounts extends Tx_Extbase_DomainObject_AbstractValueObject {

	/**
	 * The quantity of this amount
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $quantity;

	/**
	 * The kind of quantity (number, weight ec.)
	 *
	 * @var integer
	 */
	protected $unit;

	/**
	 * The ingredient connected to this amount
	 *
	 * @var Tx_Vegamatic_Domain_Model_Goods
	 */
	protected $goods;
	
	/**
	 * Should this item be excluded for the week
	 *
	 * @var integer
	 */
	protected $exclude;	

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

	}

	/**
	 * Returns the unit
	 *
	 * @return integer $unit
	 */
	public function getUnit() {
		return $this->unit;
	}

	/**
	 * Sets the unit
	 *
	 * @param integer $unit
	 * @return void
	 */
	public function setUnit($unit) {
		$this->unit = $unit;
	}

	/**
	 * Returns the goods
	 *
	 * @return Tx_Vegamatic_Domain_Model_Goods goods
	 */
	public function getGoods() {
		return $this->goods;
	}

	/**
	 * Sets the goods
	 *
	 * @param Tx_Vegamatic_Domain_Model_Goods $goods
	 * @return Tx_Vegamatic_Domain_Model_Goods goods
	 */
	public function setGoods(Tx_Vegamatic_Domain_Model_Goods $goods) {
		$this->goods = $goods;
	}

	/**
	 * Returns the quantity
	 *
	 * @return integer quantity
	 */
	public function getQuantity() {
		return $this->quantity;
	}

	/**
	 * Sets the quantity
	 *
	 * @param integer $quantity
	 * @return integer quantity
	 */
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
	}

	/**
	 * Returns the exclude
	 *
	 * @return integer $exclude
	 */
	public function getExclude() {
		return $this->exclude;
	}

	/**
	 * Sets the exclude
	 *
	 * @param integer $exclude
	 * @return void
	 */
	public function setExclude($exclude) {
		$this->unit = $exclude;
	}
}
?>