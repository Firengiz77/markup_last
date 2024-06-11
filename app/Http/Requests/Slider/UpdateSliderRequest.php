<?php

namespace App\Http\Requests\Slider;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends BaseRequest
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
'link' => ['string'],
'buttonText' => ['string'],

        ];
    }
}
