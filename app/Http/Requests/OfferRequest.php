<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ar' => 'required',
            'name_en' => 'required',
            'details_ar' => 'required',
            'details_en' => 'required',
            'price' => 'required',
            'photo' => 'required_without:id'
         ];
    }

    public function messages()
    {
        return $message = [
            'name_ar.required' => __('message.Offer Name ar Is required'),
            'name_en.required' => __('message.Offer Name en Is required'),
            'details_ar.required' => __('message.Offer Details ar Is required'),
            'details_en.required' => __('message.Offer Details en Is required'),
            'price.required' => __('message.price is required'),
            'photo.required' => __('message.Offer photo is required')
         ];
    }
}
