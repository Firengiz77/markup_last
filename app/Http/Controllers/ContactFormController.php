<?php
namespace App\Http\Controllers;


use App\Http\Requests\ContactForm\StoreContactFormRequest;
use App\Http\Requests\ContactForm\UpdateContactFormRequest;
use App\Models\ContactForm;
use App\Repositories\ContactFormRepository;

class ContactFormController extends Controller
{


    private ContactFormRepository $contactformRepository;

    public function __construct(ContactFormRepository $contactformRepository)
    {
        $this->contactformRepository = $contactformRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $contactforms    = ContactForm::all();

        return view('contactform.index', compact('contactforms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('contactform.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactFormRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->contactformRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('ContactForm  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactForm $contactform)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $contactform = ContactForm::findorFail($id);
        return view('contactform.edit', compact('contactform'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactFormRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $contactform=ContactForm::findorFail($id);
        if($request->validated())
        {
             $result =  $this->contactformRepository->update($request, $contactform);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('ContactForm Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $contactform = ContactForm::findorFail($id);
        $result =  $this->contactformRepository->destroy($contactform);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('ContactForm Successfully Delete!') );
    }

}
