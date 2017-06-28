<?php
namespace FSAPI\Validators;

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
     * @param array|bool $validation_rules   The validation rules from the Node: array('min' => 1, 'max' => 2)
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
     *
     * @param string $input input for validation
     * @return bool if validation-rules are not set or not an (valid) array.
     *
     * @throws ValidatorException if validation-rules are not set or not an (valid) array.
     */
    public function validateInput($input)
    {
        $validation_rules = $this->validation_rules;
        if (!is_array($validation_rules) || (!isset($validation_rules['min']) || !isset($validation_rules['max']))) {
            throw new ValidatorException('Validation rules have to be set for validation method '.var_export($validation_rules,true).' ValidateBetween.');
        }
        if (($validation_rules['min'] <= $input) && ($input <= $validation_rules['max'])) {
            return true;
        }
        return false;
    }
}
