<?php

namespace App\Http\Requests\VaccineShipment;


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
            'amount' => 'required|integer|min:0',
            'arrival_date' => 'required|date',
        ];
    }
}
