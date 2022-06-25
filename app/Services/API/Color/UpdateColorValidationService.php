<?php

namespace App\Services\API\Color;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateColorValidationService
{
    public static function isValid(Request $request) 
    {
        // Validate inputs
        $validator = Validator::make($request->all(), [
            'color_value'  => 'string',
        ]);

        // Check if there are validation errors
        if($validator->fails()) {
            return $validator->errors();
        } else {
            return false;
        }
    }
}