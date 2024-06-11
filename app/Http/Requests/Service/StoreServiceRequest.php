<?php

namespace App\Http\Requests\Service;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends BaseRequest
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
'detail' => ['string'],
'image' => 'mimes:jpeg,png,jpg,gif,svg,pdf,webp|max:20480',
'image2' => 'mimes:jpeg,png,jpg,gif,svg,pdf,webp|max:20480',
'icon' => 'mimes:jpeg,png,jpg,gif,svg,pdf,webp|max:20480',
'meta_title' => ['string'],
'meta_description' => ['string'],
'meta_keywords' => ['string'],
'slug' => ['string'],

        ];
    }
}
