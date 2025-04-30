<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTournamentPlayerRequest extends FormRequest
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
        $tournament = $this->tournament;
        
        return [
            'players' => [
                'required',
                'array',
                'distinct',
                'size:'. $tournament->players_count,
            ],
            'players.*' => [
                'required',
                'integer',
                'gt:0',
                'bail',
                'exists:players,id'
            ]
        ];
    }
}
