<?php

namespace App\Http\Requests\MetaTag;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMetaTagRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['string'],
'meta_title' => ['string'],
'meta_description' => ['string'],
'meta_keywords' => ['string'],

        ];
    }
}
