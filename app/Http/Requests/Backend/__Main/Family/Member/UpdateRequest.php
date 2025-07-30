<?php

namespace App\Http\Requests\Backend\__Main\Family\Member;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest {

  public function authorize(): bool {
    return true;
  }

  public function rules(): array {
    return [
      'bigo_id' => ['required', Rule::unique('main_family_members')->ignore($this->id)],
    ];
  }

}
