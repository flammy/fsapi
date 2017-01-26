<?php
/**
* ValidateBool is validation method used by the validator class
*
*/
class ValidateBool extends Validator implements Validators
{
    protected $validation_rules;
    
    /**
     * create a new ValidateBool Validator
     *
     * @param bool $validation_rules   The validation rules from the Node: false
     *                                  
     *
     */
    public function __construct($validation_rules = false)
    {
        $this->validation_rules = $validation_rules;
    }
    
    /**
     * Checks if the input is int-castable to 1 or 0
     *
     * @param string $input   The new value for the Node
     *
     * @throws ValidatorException if validation-rules are set.
     *
     * @return bool TRUE if the input matches the validation rule, FALSE if not
     *
     */
    public function validateInput($input)
    {
        if (is_array($this->validation_rules)) {
            throw new ValidatorException('Validation rules must not be set for validation method ValidateBetween.');
        }
        if (1 == (int) $input || (int) $input == 0) {
            return true;
        }
        return false;
    }
}
