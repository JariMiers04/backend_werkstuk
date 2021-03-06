<?php

namespace App\Rules;

use App\Models\Block;
use Illuminate\Contracts\Validation\Rule;

class BlockRoomAvailabilityRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($day_id)
    {
        $this->day_id = $day_id;
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
        return Block::isRoomAvailable(request()->days, request()->times, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {

        return 'This room is not available for this day: '. $this->day_id;
    }
}
