<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'office' => ['string'],
'image' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:20480',
'address' => ['string'],
'phone' => ['string'],
'email' => ['string'],

        ];
    }
}
