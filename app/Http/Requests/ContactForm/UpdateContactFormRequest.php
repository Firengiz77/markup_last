<?php

namespace App\Http\Requests\ContactForm;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContactFormRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string'],
'detail' => ['string'],
'topic' => ['string'],
'note' => ['string'],

        ];
    }
}
