<?php
namespace App\Http\Controllers;


use App\Http\Requests\Partner\StorePartnerRequest;
use App\Http\Requests\Partner\UpdatePartnerRequest;
use App\Models\Partner;
use App\Repositories\PartnerRepository;

class PartnerController extends Controller
{


    private PartnerRepository $partnerRepository;

    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $partners    = Partner::all();

        return view('partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('partner.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->partnerRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Partner  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $partner = Partner::findorFail($id);
        return view('partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $partner=Partner::findorFail($id);
        if($request->validated())
        {
             $result =  $this->partnerRepository->update($request, $partner);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Partner Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $partner = Partner::findorFail($id);
        $result =  $this->partnerRepository->destroy($partner);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Partner Successfully Delete!') );
    }

}
