<?php

class PhoneNumberComponent extends Object {
  /**
   * PUBLIC METHODS
   */
  
  /**
   * Explodes data going out to forms so that it may be
   * displayed in components. For example, with separate
   * inputs for area code, exchange and number.
   *
   * @param   $digits   int   The phone number
   * @return  array
   * @access  public
   * @todo Support custom regex in preg_split
   */
  public function explode( $digits ) {
    $digits   = preg_replace( '/[^0-9]/', '', $digits ); # strip non-numerics
    $exploded = array();
    
    if( strlen( $digits ) == 10 ) { # The "expected" case
      $exploded = preg_split( '/^([0-9]{3})([0-9]{3})([0-9]{4})$/', $digits, null, PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY );
    }
    else if( empty( $digits ) ) {
      $exploded = array_fill( 0, 3, null );
    }

    return $exploded;
  }
  
  /**
   * Data coming in from a form has to be unified for storage.
   * For example, a US phone number will be held in an array
   * with 3 elements (area code, exchange, number).
   *
   * @param   $digits   array   The component array
   * @return  int
   * @access  public
   * @todo    support custom join characters
   */
  public function implode( $digits ) {
    return join( '', $digits );
  }
  
  /**
   * Formats a phone number in (XXX) XXX-XXX or custom mask.
   *
   * @param   $digits   The phone number
   * @param   $regex    The regex to pass to preg_replace
   * @param   $replace  The replacement string to pass to preg_replace
   * @return  string
   * @access  public
   * @todo    Support user defined masks
   */
  public function format( $digits, $regex = null, $replace = null ) {
    $digits  = preg_replace( '/[^0-9]/', '', $digits );
    $regex   = is_null( $regex )  ? '/([0-9]{3})([0-9]{3})([0-9]{4})/' : $regex;
    $replace = is_null( $replace) ? "($1) $2-$3" : $replace;
    
    return preg_replace( $regex, $replace, $digits );
  }

  /**
   * Strips a phone number of all non-numerics.
   *
   * @param   string $number
   * @return  string
   * @access  public
   */
  public function clean( $number ) {
    return preg_replace( '/[^0-9]/', '', $number );
  }
}
