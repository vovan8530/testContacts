<?php

namespace App\Http\Requests;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest {

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
      'full_name' => ['required', 'string', 'max:255'],
      'address' => ['required', 'string', 'max:255'],
      'mail' => ['required',
        'email',
        Rule::unique((new Contact())->getTable(), 'mail'),
        'max:255'],
    ];
  }

  /**
   * @return array
   */
  public function messages() {
    return [
      'full_name.required' => 'name is required!',
      'address.required' => 'address is required!',
      'mail.required' => 'mail is required!',
      'mail.email' => 'mail is not mail!',
      'mail.unique' => 'This mail already exists!',
    ];
  }
}
