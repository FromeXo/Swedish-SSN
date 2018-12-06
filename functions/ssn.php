/*******************************************************************************
 *  Check Last Digit - Luhn-algoritmen
 *
 *  Calculate the controll digit in a swedish social security number.
 *
 *  @param String ssn 12 digit ssn with a dash befor the 4 last digits.
 *  @returns Bool
 ******************************************************************************/
function checkLastDigit($ssn) {
    
    // Remove the dash from ssn
    $ssn = str_replace('-', '', $ssn);
        
    // Pop of the last number of ssn and parse it as a interger.
    $lastDigit = intval(substr($ssn, -1));
    
    // After last digit has been extraced remove it from the string.
    // Also remove the 2 first digit from the beginning of the string (19|20).
    $ssn = substr($ssn, 2, 9);
    
    // Calculate the products and concatenate them.
    $products = '';
    for ( $i=0; strlen($ssn) > $i; $i++ ) {
        $products .= ( ( $i % 2 ) == 0 ) ? ( intval($ssn[$i]) * 2 ) : ( intval($ssn[$i]) * 1 );
    }
    
    // Calculate the sum of all products.
    $sum = 0;
    for ( $j=0; strlen($products) > $j; $j++ ) {
        $sum += intval($products[$j]);
    }
    
    // Substract 10 and modulo 10 twice.
    // If the result is equal to the last digit, return true.
    return ((10 - ($sum % 10)) % 10) === $lastDigit ? true : false;
}

/*******************************************************************************
 *  Validate 
 *
 *  Validate a swedish security number.
 *
 *  @param String ssn 12 digit ssn with a dash befor the 4 last digits.
 *  @returns Bool
 ******************************************************************************/
function validate($ssn) {
    return preg_match('/(19|20)\d{2}((0(1|3|5|7|8)|1(0|2))(0[1-9]|1[0-9]|2[0-9]|3[0-1])|02(0[1-9]|1[0-9]|2[0-9])|(0(4|6|9)|11)(0[1-9]|1[0-9]|2[0-9]|30))\-\d{4}/', $ssn) ? true : false;
}
