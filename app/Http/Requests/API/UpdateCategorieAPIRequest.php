<?php

namespace App\Http\Requests\API;

use App\Models\Categorie;
use InfyOm\Generator\Request\APIRequest;

class UpdateCategorieAPIRequest extends APIRequest
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
        $rules = Categorie::$rules;
        $rules['categorie'] = $rules['categorie'].",".$this->route("category");$rules['code_prodtui'] = $rules['code_prodtui'].",".$this->route("category");
        return $rules;
    }
}
