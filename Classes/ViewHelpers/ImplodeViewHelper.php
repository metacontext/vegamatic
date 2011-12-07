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
 * Implode array to string
 *
 * @package TYPO3
 * @subpackage Fluid
 * 
 * @version
 */
class Tx_Vegamatic_ViewHelpers_ImplodeViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

    /**
     * Render function of this view helper
     *
     * @param 	$objects 	array	Array/object to implode
     * @param 	$glue 		string	Glue
     * @param 	$property	string	Property that shoud be imploded
     * 
     * @return	string		String with imploded objects
     */
    public function render($objects, $glue = '', $property = '') {

		$output = '';

        if ($objects === NULL) { return '';}
        
        if (!is_object($objects) && !is_array($objects)) {
        	throw new Tx_Vegamatic_ViewHelpers_ImplodeViewHelper('ImplodeViewHelper supports only arrays and lists of objects for implosion' , 1323254724);
        
        } elseif (is_object($objects) && !$objects instanceof Traversable) {
			throw new Tx_Vegamatic_ViewHelpers_ImplodeViewHelper('ImplodeViewHelper only supports arrays and objects implementing Traversable interface' , 1323254434);
        
        } elseif (is_object($objects)) {
			
        	if (!$property) {throw new Tx_Vegamatic_ViewHelpers_ImplodeViewHelper('ImplodeViewHelper needs a property to implode a list of objects' , 1323254897);}
			foreach ($objects as $object) {
				$output .= $object->{'get' . ucfirst($property)}();
				$output .= $glue;
			}
			$output = substr($output, 0, (-1 * strlen($glue)));
					
		} else {
			foreach ($objects as $key => $object) {
				// take out empty values
				if (!$object) unset($objects[$key]);
			}
			if (count($objects) > 0) {
				$output = implode($glue, $objects);
			} else {
				$output = '';
			}
		}
        return $output;
    }
}