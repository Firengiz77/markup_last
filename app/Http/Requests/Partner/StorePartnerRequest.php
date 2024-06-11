<?php

namespace App\Http\Requests\Partner;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class StorePartnerRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:20480',
'title' => ['string'],
'link' => ['string'],

        ];
    }
}
