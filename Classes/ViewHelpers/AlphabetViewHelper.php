<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 tesselation <t.esselation@gmx.net>
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
 * View Helper for generating alphabetically sorted lists
 *
 * @package TYPO3
 * @subpackage vegamatic
 * @author tesselation <t.esselation@gmx.net>
 */

class Tx_Vegamatic_ViewHelpers_AlphabetViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	
	/**
	 * @param array $objects
	 * @param string $property
	 * @param string $as
	 *
	 * @return string 
	 */
    public function render($objects, $property, $as) {
   	
    	$output = array();
    	
    	if ($objects === NULL) { return '';}
		
		if (is_object($objects) && !$objects instanceof Traversable) {
			throw new Tx_Vegamatic_ViewHelpers_AlphabetViewHelper('AlphabetViewHelper only supports arrays and objects implementing Traversable interface' , 1323213814);
		}

		$getter = 'get'.$property;
		
		foreach ($objects as $key => $object) {
			
			if ($key == 0) {
				$output[strtoupper(substr($object->$getter(), 0, 1))] = 'startOfLetter';
				$output[$object->getUid()] = $object->$getter();
			}
			
			if ($key > 0) {
				
				if (strtoupper(substr($object->$getter(), 0, 1)) == strtoupper(substr(end($output), 0, 1))) {
					$output[$object->getUid()] = $object->$getter();
				} else {
					$output['key-'.$key] = 'endOfLetter';
					$output[strtoupper(substr($object->$getter(), 0, 1))] = 'startOfLetter';
					$output[$object->getUid()] = $object->$getter();
				}
			}			
		}
		
		$output[] = 'endOfLetter';

		return $this->templateVariableContainer->add($as, $output);
    }
}
?>