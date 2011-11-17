<?
// ------------------------------------------------------------------------

/**
 * Strip Quotes
 *
 * Removes single and double quotes from a string
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('similar_field'))
{
	function similar_field($our_field, $user_fields)
	{
	    // Tidy up
	    $str = strtolower($our_field);
	    
	    $shortest = $index = -1;
	    
	    for($i = 0; $i < count($user_fields); $i++) {
	        
    	    $lev = levenshtein($str, strtolower($user_fields[$i]));
    	    
    	    // Is it exact?
    	    if ($lev == 0) {
    	        $index = $i;
    	        $shortest = 0;
    	        break;
    	    }
    	    
    	    // No? Find the shortest of the bunch
    	    if (($lev <= $shortest || $shortest < 0)) {
                $shortest = $lev;
    	        $index = $i;
    	    }
    	    
    	}
    	
    	return $user_fields[$index];

	}
}