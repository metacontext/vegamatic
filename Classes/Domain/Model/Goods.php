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
class Tx_Vegamatic_Domain_Model_Goods extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * uid
	 *
	 * @var integer
	 */
	protected $uid;
	
	/**
	 * Name of the product
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name;

	/**
	 * The shop where to buy the product
	 *
	 * @var Tx_Vegamatic_Domain_Model_Shops
	 */
	protected $shop;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
	}
	
	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the shop
	 *
	 * @return Tx_Vegamatic_Domain_Model_Shops $shop
	 */
	public function getShop() {
		return $this->shop;
	}

	/**
	 * Sets the shop
	 *
	 * @param Tx_Vegamatic_Domain_Model_Shops $shop
	 * @return void
	 */
	public function setShop(Tx_Vegamatic_Domain_Model_Shops $shop) {
		$this->shop = $shop;
	}

}
?>