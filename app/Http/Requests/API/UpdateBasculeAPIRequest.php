<?php

namespace App\Http\Requests\API;

use App\Models\Bascule;
use InfyOm\Generator\Request\APIRequest;

class UpdateBasculeAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Bascule::$rules;
        
        return $rules;
    }
}
