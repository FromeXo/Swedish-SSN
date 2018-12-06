/*******************************************************************************
 *  Check Last Digit - Luhn-algoritmen
 *
 *  Calculate the controll digit in a swedish social security number.
 *
 *  @param String ssn 12 digit ssn with a dash befor the 4 last digits.
 *  @returns Bool
 ******************************************************************************/
function checkLastDigit(ssn) {
    
    // Remove the dash from ssn
    ssn = ssn.replace('-', '');
    
    // Pop of the last number of ssn and parse it as a interger.
    var lastDigit = parseInt(ssn.substring(( ssn.length - 1 )));
    
    // After last digit has been extraced remove it from the string.
    // Also remove the 2 first digit from the beginning of the string (19|20).
    ssn = ssn.substring(2, ( ssn.length - 1 ));

    // Calculate the products and concatenate them.
    var products = '';
    for (var i=0; ssn.length > i; i++ ) {
        products += (i % 2) == 0 ? (ssn[i] * 2).toString() : (ssn[i] * 1).toString();
    }

    // Calculate the sum of all products.
    var sum = 0;
    for ( var j=0; products.length > j; j++ ) {
        sum += parseInt(products[j]);
    }
    
    // Substract 10 and modulo 10 twice.
    // If the result is equal to the last digit, return true.
    return ((10 - (sum % 10)) % 10) === lastDigit ? true : false;
};

/*******************************************************************************
 *  Validate 
 *
 *  Validate a swedish security number.
 *
 *  @param String ssn 12 digit ssn with a dash befor the 4 last digits.
 *  @returns Bool
 ******************************************************************************/
function validate(ssn) {
    return /(19|20)\d{2}((0(1|3|5|7|8)|1(0|2))(0[1-9]|1[0-9]|2[0-9]|3[0-1])|02(0[1-9]|1[0-9]|2[0-9])|(0(4|6|9)|11)(0[1-9]|1[0-9]|2[0-9]|30))\-\d{4}/.test(ssn);
};
