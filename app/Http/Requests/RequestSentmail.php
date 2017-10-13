<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSentmail extends FormRequest
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
            'email_to'=>'required',
            'message'=>'required',
            'attachment'=>'mimes:jpeg,png,jpg,gif,svg,txt,pdf,ppt,docx,doc,xls|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'email_to.required'=>'Please enter email to !',
            'message.required'=>'Please enter message !',
            'attachment.mimes'=>'Please choose file format : .jpeg, .png, .jpg, .gif, .svg, .txt, .pdf, .ppt, .docx, .doc, .xls',
            'attachment.max'=>'Max size 2M'
        ];
    }
}
