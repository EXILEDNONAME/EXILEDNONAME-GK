<?php

namespace App\Http\Requests\Backend\__Main\Broadcaster\Report;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest {

  public function authorize(): bool {
    return true;
  }

  public function rules(): array {
    return [
      'name' => ['required', Rule::unique('main_broadcaster_reports')->ignore($this->id)],
    ];
  }

}
