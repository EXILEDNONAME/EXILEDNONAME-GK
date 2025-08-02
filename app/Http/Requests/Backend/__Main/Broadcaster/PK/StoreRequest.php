<?php

namespace App\Http\Requests\Backend\__Main\Broadcaster\PK;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest {

  public function authorize(): bool {
    return true;
  }

  public function rules(): array {
    return [
      // 
    ];
  }

}
