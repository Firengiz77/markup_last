<?php

namespace App\Http\Requests\Team;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends BaseRequest
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
'facebook' => ['string'],
'linkedin' => ['string'],
'instagram' => ['string'],

        ];
    }
}
