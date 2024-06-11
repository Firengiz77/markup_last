<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class BaseRequest extends FormRequest
{

    /**
     * Dəyişdirmək istəyirsinizsə, özünüzün class da dəyişdirin. Bu Classa toxunmayın.
     * İstifadəçinin bu sorğunu etməyə icazəsi varmı?
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * Xüsusi mesajlar əlavə etmək istəyirsinizsə, buraya əlavə etməyin.
     * parent::messages() + ['ozel_sutun' => 'xüsusi mesaj'] kimi edin.
     * @return array
     */
    public function messages(): array
    {
        return [
            'integer'       => __('integer'),
            'required'      => __('required'),
            'exists'        => __('exists'),
            'numeric'       => __('numeric'),
            'boolean'       => __('boolean'),
            'bool'          => __('bool'),
            'array'         => __('array'),
            'string'        => __('string'),
            'expired_at'    => __('expired_at'),
            'date_format'   => __('date_format'),
            'max'           => __('max'),
            'min'           => __('min'),
            'mimes'         => __('mimes'),
            'in'            => __('in'),
            'unique'        => __('unique'),
            'email'         => __('email'),
        ];
    }


    /**
     * @param Validator $validator
     * @return RedirectResponse
     */
    public function failedValidation(Validator $validator): RedirectResponse
    {
        $messages = $validator->getMessageBag();

        return redirect()->back()->with('error', $messages->first());

    }
}
