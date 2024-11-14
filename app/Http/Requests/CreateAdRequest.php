<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:500',
            'status' => 'required|in:active,pending,archived',
            'url' => 'required|url',
            'impressions_count' => 'required|integer|min:0',
            'cpm' => 'required|numeric|min:0',
            'budget' => 'required|numeric|min:0',
            'button_text' => 'required|string|in:watch,apply,download,learn_more',
            'campaign_id' => 'required|exists:campaigns,id',
        ];
    }
}
