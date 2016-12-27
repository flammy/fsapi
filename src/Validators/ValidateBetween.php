<?php
/**
* ValidateBetween is validation method used by the validator class
*
*/
class ValidateBetween extends Validator implements Validators
{
    protected $validation_rules;
    
    /**
     * create a new ValidateBetween Validator
     *
     * @var array $validation_rules   The validation rules from the Node: array('min' => 1, 'max' => 2)
     *                                  
     *
     */
    public function __construct($validation_rules = false)
    {
        $this->validation_rules = $validation_rules;
    }
    
    /**
     * Checks if the input is between the min and max of the validation-rules provides by constructor
     *
     * @var string $input   The new value for the Node
     *
     * @throws ValidatorException if validation-rules are not set or not an (valid) array.
     *
     * @return bool TRUE if the input matches the validation rule, FALSE if not
     *
     */
    public function validateInput($input)
    {
        $validation_rules = $this->validation_rules;
        if (!is_array($validation_rules) && (count($validation_rules) != 2) &&(!isset($validation_rules['min']) || !isset($validation_rules['max']))) {
            throw new ValidatorException('Validation rules have to be set for validation method ValidateBetween.');
        }
        if (($validation_rules['min'] <= $input) && ($input <= $validation_rules['max'])) {
            return true;
        }
        return false;
    }
}
