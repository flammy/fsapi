<?php

namespace FSAPI\Validators;

class Validator
{
    protected $validation_method;
    protected $validation_rules;
    
    
    public function __construct($validation_method, $validation_rules = false)
    {
        $this->validation_method = $validation_method;
        $this->validation_rules = $validation_rules;
    }

    /**
     * validates the input with the supplied method
     *
     * @param string $input The Input to validate
     * @return bool TRUE if the input matches the validation rule, FALSE if not
     *
     * @throws ValidatorException
     */
    public function validateInput($input)
    {
        $validation_method = $this->validation_method;
        if ($validation_method === false) {
            return true;
        }

        $validation_method = "\FSAPI\Validators\Validate".ucfirst($validation_method);

        if (!class_exists($validation_method)) {
            throw new ValidatorException(sprintf('Validation Method %s not found.', $validation_method));
        }

        $this->createdValidator = new $validation_method($this->validation_rules);
        return $this->createdValidator->validateInput($input);
    }
}
