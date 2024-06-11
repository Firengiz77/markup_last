<?php

namespace App\Http\Requests\SocialLink;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreSocialLinkRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

'link' => ['string'],
'icon' => ['string'],
'name' => ['string'],

        ];
    }
}
