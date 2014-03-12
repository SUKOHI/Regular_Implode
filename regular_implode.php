<?php

class Regular_Implode {

	const MODE_SINGLE = 1;
	const MODE_ARRAY = 2;
	
	public static function get($glue, $pieces, $regular_position) {
		
		$mode = self::MODE_SINGLE;
		
		if(is_array($regular_position)) {
			
			$mode =  self::MODE_ARRAY;
			
			$array_glue_positions = array();
			$current_position = 0;
			
			foreach ($regular_position as $position) {
				
				$current_position += $position;
				$array_glue_positions[] = $current_position;
				
			}
			
		}
		
		$return = '';
		$pieces_count = count($pieces);
		
		for ($i = 0; $i < $pieces_count; $i++) {
			
			$return .= $pieces[$i];
			
			if($mode == self::MODE_SINGLE && $i > 0 && ($i+1)%$regular_position == 0) {
			
				$return .= $glue;
			
			} else if($mode == self::MODE_ARRAY && in_array(($i+1), $array_glue_positions)) {
				
				$return .= $glue;
				
			}
			
		}
		
		return $return;
		
	}
	
}
/*** Example

$numbers = array(
		
	1, 2, 3, 4, 5, 6, 7, 8, 9, 0
		
);

echo Regular_Implode::get('<br>', $numbers, 4);

[Result]:

1234
5678
90


echo Regular_Implode::get('<br>', $numbers, array(1, 2, 3, 1));

[Result]:

1
23
456
7
890

***/
