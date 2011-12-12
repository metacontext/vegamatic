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
class Tx_Vegamatic_Domain_Repository_GoodsRepository extends Tx_Vegamatic_Domain_Repository_CommonRepository {

	/**
	 * Finds all goods not listed on the current shopping list
	 * 
	 * @return object The unlisted goods
	 */
	public function findUnlistedGoods($shoppingList) {

		$goods = array();

		foreach($shoppingList as $item) {
			$goods[] = $item['goods'];
		}
					
		$query = $this->createQuery();
		$query->matching($query->logicalNot($query->in('uid', $goods)));
		$query->setOrderings(array('name' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));

		return $query->execute();	
	}
	
}
?>