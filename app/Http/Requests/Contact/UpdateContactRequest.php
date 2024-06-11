<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'map' => ['string'],
'address' => ['string'],
'phone' => ['string'],
'email' => ['string'],

        ];
    }
}
