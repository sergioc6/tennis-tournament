<?php

namespace App\Http\Requests;

use App\Rules\PowerOfTwo;
use Illuminate\Foundation\Http\FormRequest;

class StoreTournamentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'year' => 'required|date_format:Y',
            'gender' => 'required|in:M,F',
            'players' => [
                'required',
                'integer',
                'gt:0',
                new PowerOfTwo
            ],
            'prize_money' => 'required|numeric|gt:0'
        ];
    }
}
