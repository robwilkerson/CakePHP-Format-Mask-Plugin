<?php

class FormatComponent extends Object {
  public $components = array( 'FormatMask.PhoneNumber' );
  
  /**
   * PUBLIC METHODS
   */
  
  public function format( $what, $data, $regex = null ) {
    switch( strtolower( $what ) ) {
      case 'phone':
      case 'phone_number':
      case 'phonenumber':
        return $this->PhoneNumber->format( $data, $regex );
        break;
      
      default:
        throw new Exception( 'Unsupported data type (' . $what . ') sent for formatting.' );
        break;
    }
  }
  
  /**
   * Formats a phone number with an (XXX) XXX-XXX mask.
   *
   * @param   $digits   The phone number
   * @return  string
   * @access  public
   * @todo    Support user defined masks
   */
  public function phone_number( $digits ) {
    if( is_array( $digits ) ) {
      # squash it. this is an array coming in from a form.
      return $this->PhoneNumber->implode( $digits );
    }
    else {
      return $this->PhoneNumber->explode( $digits );
    }
  }
}
