<?php

namespace App\Http\Requests\Volunteer;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateRequest
 * @package App\Http\Requests\VaccineShipment
 */
class CreateRequest extends FormRequest
{
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'vaccine_type_id' => 'required|exists:vaccine_types,id',
            'name' => 'required|string',
            'email' => 'required|email|unique:volunteers',
            'preferred_date' => 'required|date',
        ];
    }
}
