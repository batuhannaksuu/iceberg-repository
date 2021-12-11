<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Contact\CreateContactRequest;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactService,$responseHelper;

    public function __construct(ContactService $contactService,ResponseHelper $responseHelper)
    {
        $this->contactService = $contactService;
        $this->responseHelper = $responseHelper;
    }

    public function create(CreateContactRequest $request)
    {
        $contact = $this->contactService->create($request->all());
        dd($contact);
    }




}
