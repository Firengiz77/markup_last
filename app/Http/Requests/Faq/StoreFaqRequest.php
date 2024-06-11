<?php

namespace App\Http\Requests\Faq;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'question' => ['string'],
            'answer' => ['string'],

        ];
    }
}
