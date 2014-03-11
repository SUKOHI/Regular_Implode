<?php

class Regular_Implode {
	
	public static function get($glue, $pieces, $regular_count) {
		
		$return = '';
		$pieces_count = count($pieces);
		
		for ($i = 0; $i < $pieces_count; $i++) {
			
			$return .= $pieces[$i];
			
			if($i > 0 && ($i+1)%$regular_count == 0) {
			
				$return .= $glue;
			
			}
			
		}
		
		return $return;
		
	}
	
}
/*** Example

	echo Regular_Implode::get('<br>', $pieces, 5);

***/
