<?php

namespace App\Http\Requests\MainInformation;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreMainInformationRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'header_logo' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:20480',
'footer_logo' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:20480',
'phone' => ['string'],

        ];
    }
}
