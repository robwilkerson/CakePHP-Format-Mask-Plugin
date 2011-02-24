<?php

class FormatHelper extends AppHelper {
  /**
   * PUBLIC METHODS
   */
  
  /**
   * Formats a phone number with an (XXX) XXX-XXX mask.
   *
   * @param   $digits   The phone number
   * @return  string
   * @access  public
   * @todo    Support user defined masks
   */
  public function phone_number( $digits ) {
    $digits = preg_replace( '/[^0-9]/', '', $digits );
    
    return preg_replace( '/([0-9]{3})([0-9]{3})([0-9]{4})/', "($1) $2-$3", $digits );
  }
}
