<?php

namespace App\Http\Requests\ProjectImage;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectImageRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'project_id' => ['string'],
'image' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:20480',

        ];
    }
}
