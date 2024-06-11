<?php
namespace App\Http\Controllers;


use App\Http\Requests\Reference\StoreReferenceRequest;
use App\Http\Requests\Reference\UpdateReferenceRequest;
use App\Models\Reference;
use App\Repositories\ReferenceRepository;

class ReferenceController extends Controller
{


    private ReferenceRepository $referenceRepository;

    public function __construct(ReferenceRepository $referenceRepository)
    {
        $this->referenceRepository = $referenceRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $references    = Reference::all();

        return view('reference.index', compact('references'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('reference.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReferenceRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->referenceRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Reference  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Reference $reference)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $reference = Reference::findorFail($id);
        return view('reference.edit', compact('reference'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReferenceRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $reference=Reference::findorFail($id);
        if($request->validated())
        {
             $result =  $this->referenceRepository->update($request, $reference);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Reference Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $reference = Reference::findorFail($id);
        $result =  $this->referenceRepository->destroy($reference);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Reference Successfully Delete!') );
    }

}
