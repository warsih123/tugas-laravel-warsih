<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilmRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'sinopsis' => 'required|string',
            'year' => 'required|integer|min:1900|max:2100',
            'poster' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'genre_id' => 'required|exists:genres,id',
            'sutradara_id' => 'nullable|exists:sutradaras,id',
        ];
    }
}