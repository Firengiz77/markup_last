<?php
namespace App\Http\Controllers;


use App\Http\Requests\Faq\StoreFaqRequest;
use App\Http\Requests\Faq\UpdateFaqRequest;
use App\Models\Faq;
use App\Repositories\FaqRepository;

class FaqController extends Controller
{


    private FaqRepository $faqRepository;

    public function __construct(FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $faqs    = Faq::all();

        return view('faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('faq.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFaqRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->faqRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }


        
        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Faq  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $faq = Faq::findorFail($id);
        return view('faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFaqRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $faq=Faq::findorFail($id);
        if($request->validated())
        {
             $result =  $this->faqRepository->update($request, $faq);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Faq Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $faq = Faq::findorFail($id);
        $result =  $this->faqRepository->destroy($faq);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Faq Successfully Delete!') );
    }

}
