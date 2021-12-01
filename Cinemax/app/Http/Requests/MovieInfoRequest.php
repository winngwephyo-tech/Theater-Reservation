<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieInfoRequest extends FormRequest
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
            'theater_id' => ['required', 'max:255'],
            'genre' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'details' => ['required', 'max:255'],
            'rating' => ['required', 'max:255'],
            'trailer' => ['required', 'max:255'],
            'duration' => 'required',
            'cast' => ['required'],
            'time1' => ['required'],
            'time2' => ['required'],
            'time3' => ['required'],

        ];
    }
}
