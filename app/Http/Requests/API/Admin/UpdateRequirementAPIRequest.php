<?php

namespace App\Http\Requests\API\Admin;

use App\Models\Admin\Requirement;
use InfyOm\Generator\Request\APIRequest;

class UpdateRequirementAPIRequest extends APIRequest
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
        return Requirement::$rules;
    }
}
