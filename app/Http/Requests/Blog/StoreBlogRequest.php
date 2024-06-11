<?php

namespace App\Http\Requests\Blog;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends BaseRequest
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
'desc' => ['string'],
'image' => 'mimes:jpeg,png,jpg,gif,svg,pdf,webp|max:20480',
'meta_title' => ['string'],
'meta_description' => ['string'],
'meta_keywords' => ['string'],
'slug' => ['string'],

        ];
    }
}
