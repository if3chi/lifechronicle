<?php

namespace App\Rules;

use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Rule;

class MaxWords implements Rule
{

    protected $maxWords;
    protected $entryCount;

    /**
     * Create a new rule instance.
     *
     * @return void
     *
     */
    public function __construct($maxWords)
    {
        $this->maxWords = $maxWords;
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
        $this->entryCount = Str::of($value)->wordCount();

        return $this->maxWords >= $this->entryCount;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute cannot be more than '
            . $this->maxWords . ' words, You have '
            . $this->entryCount . ' words';
    }
}
