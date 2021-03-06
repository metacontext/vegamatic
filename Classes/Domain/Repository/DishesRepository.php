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
class Tx_Vegamatic_Domain_Repository_DishesRepository extends Tx_Vegamatic_Domain_Repository_CommonRepository {
	
	/**
	 * @param array $exclude
	 * @param integer $type
	 * 
	 * @return Tx_Extbase_Persistence_QueryResultInterface|array
	 */
	public function findAllBut($exclude, $type = 1) {

		$query = $this->createQuery();
		$constraints = array();
		
		$constraints[] = $query->equals('type', $type);
		if ($exclude) $constraints[] = $query->logicalNot($query->in('uid', $exclude));

		$query->matching($query->logicalAnd($constraints));
		
		return $query->execute();
	}
	
	/*
	 * @param int $type
	 * @param string $orderings
	 * 
	 * return object
	 */
	public function findDishByTypeWithOrderings($type, $orderings='ASC') {
		
		$query = $this->createQuery();
		$query->matching($query->equals('type', $type));
		
		switch ($orderings) {
			case 'DESC':
				$query->setOrderings(array('name' => Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING));		
			break;
			default:
				$query->setOrderings(array('name' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));	
			break;
		}
		
		return $query->execute();		
	}
}
?>