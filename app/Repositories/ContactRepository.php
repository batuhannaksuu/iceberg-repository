<?php

namespace App\Repositories;

use App\Models\Contacts;
use App\Repositories\Contracts\ContactRepositoryContract;

class ContactRepository implements ContactRepositoryContract
{
    public function createContact(array $data)
    {
        try {
            $contact = new Contacts();
            $contact->name = $data['name'];
            $contact->surname = $data['surname'];
            $contact->email = $data['email'];
            $contact->phone = $data['phone'];
            $contact->save();

            return $contact->id;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function delete(int $id)
    {
        try {
            $contact = Contacts::where('id',$id)->first();
            $contact = $contact->delete();
            return $contact;
        } catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
}
