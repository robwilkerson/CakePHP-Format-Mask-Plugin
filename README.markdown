# CakePHP Format Mask Plugin

A collection of useful (to me, at least) formatters for values that are commonly input, stored and displayed in different ways. Phone numbers are a good example and, not coincidentally, the backbone of the 0.1 release.

Although not the case for international numbers, US phone numbers are very predictable: a 3 digit area code, a 3 digit exchange and a 4 digit number. To help emphasize that predictability, I split the components into different inputs on forms, merge the component values to store only the number and then display the number in some kind of "pretty" format, e.g. (555) 463-3310.

Deploy more than a couple of models that include phone number values and there's a lot of work getting duplicated.

## Installation

### As an Archive

1. Click the big 'ol **Downloads** button next to the project description.
1. Extract the archive to `app/plugins/format_mask`.

### As a Submodule

1. `$ git submodule add git@github.com:robwilkerson/CakePHP-Format-Mask-Plugin.git <path_to>/app/plugins/format_mask`
1. `$ git submodule init`
1. `$ git submodule update`
1. Ensure that you're using the intended branch (may I suggest `master`?)

## Usage

This usage example continues the phone number example discussed in the intro and, again, not coincidentally, is the only one supported in the 0.1 release.

### Controller

1. Make the component and helper available. I've been doing this in my `AppController` because I'm lazy, but it might not be a bad thing to be a bit more surgical about it if you want to include it only where you actually _use_ it.

        public $helpers = array( 'Session', 'Html', 'FormatMask.Format' );
        public $components = array( 'Session', 'RequestHandler', 'FormatMask.Format' );
        
1. In the controller method that displays the form allowing a user to enter a phone number, let the formatter explode the number into its component parts.
        
        $this->data['Model']['phone_number'] = $this->Format->phone_number( $this->data['Model']['phone_number'] );
        
1. Display the phone number input fields on your form using the included element.

        /**
         * It's not shown, but a label can also be specified. The label
         * value defaults to "Phone Number".
         */
        <?php echo $this->element( 'phone_number', array( 'plugin' => 'FormatMask', 'field' => 'phone_number', 'required' => true ) ) ?>
        
1. In the controller method that receives the submitted form and performs the save operation, squash the phone number down so that only the digits are stored.

        $this->data['Model']['phone_number'] = $this->Format->phone_number( $this->data['Model']['phone_number'] );
        
1. Use the helper to display the phone number all pretty-like when showing it to the world.

        <?php echo $this->Format->phone_number( $thing['Model']['phone_number'] ) ?>

For those of you who may have noticed that the two controller uses employ exactly the same syntax, it's not a mistake. The method attempts to be intelligent about what to do based on the format of its input.

## Documentation

Coming soon. For now, at least, the *Usage* section kind of covers it.

### TODO

1. Tests. Even simple functionality can benefit from unit tests.

        
        

    
