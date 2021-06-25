<?php


namespace App\Services\Actions;

use App\Models\Contact;

class ContactServiceAction {
  /**
   * @param Contact $contact
   * @return $this
   */
  public function saveTask(Contact $contact): self {
    $contact->save();

    return $this;
  }
}