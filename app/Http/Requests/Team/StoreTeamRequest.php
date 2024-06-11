<?php

namespace App\Http\Requests\Team;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends BaseRequest
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
'profession' => ['string'],
'image' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:20480',
'facebook' => ['string'],
'linkedin' => ['string'],
'instagram' => ['string'],

        ];
    }
}
