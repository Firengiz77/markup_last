<?php

namespace App\Http\Requests\ProjectImage;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectImageRequest extends BaseRequest
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

        ];
    }
}
