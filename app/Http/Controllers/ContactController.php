<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Services\Actions\ContactServiceAction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller {
  /**
   * @var ContactServiceAction
   */
  protected $service;

  /**
   * ContactController constructor.
   *
   * @param ContactServiceAction $service
   */
  public function __construct(ContactServiceAction $service) {
    $this->service = $service;
  }

  /**
   * @return View
   */
  public function index(): View {
    $contacts = Contact::query()->get();
    return view('contact.index', [
      'contacts' => $contacts
    ]);
  }

  /**
   * @param ContactRequest $request
   * @param Contact $contact
   * @return RedirectResponse
   */
  public function store(ContactRequest $request, Contact $contact): RedirectResponse {
    $contact->create($request->all());
    return redirect()->route('contacts.index');
  }

  /**
   * @param Contact $contact
   * @return RedirectResponse
   */
  public function destroy(Contact $contact): RedirectResponse {
    $contact->delete();
    return redirect()->route('contacts.index');
  }
}
