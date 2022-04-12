<?php

namespace NovaItemsField;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ArrayRules implements Rule
{
    public $rules = [];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $input = [$attribute => json_decode($value)];
        $validator = Validator::make($input, $this->rules, [], [ "$attribute.*" => 'input']);
        $this->message = $validator->errors()->toJson();
        return $validator->passes();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
