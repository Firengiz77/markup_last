<?php
namespace App\Http\Controllers;


use App\Http\Requests\MainInformation\StoreMainInformationRequest;
use App\Http\Requests\MainInformation\UpdateMainInformationRequest;
use App\Models\MainInformation;
use App\Repositories\MainInformationRepository;

class MainInformationController extends Controller
{


    private MainInformationRepository $maininformationRepository;

    public function __construct(MainInformationRepository $maininformationRepository)
    {
        $this->maininformationRepository = $maininformationRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $maininformations    = MainInformation::all();

        return view('maininformation.index', compact('maininformations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('maininformation.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMainInformationRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->maininformationRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('MainInformation  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(MainInformation $maininformation)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $maininformation = MainInformation::findorFail($id);
        return view('maininformation.edit', compact('maininformation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMainInformationRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $maininformation=MainInformation::findorFail($id);
        if($request->validated())
        {
             $result =  $this->maininformationRepository->update($request, $maininformation);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('MainInformation Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $maininformation = MainInformation::findorFail($id);
        $result =  $this->maininformationRepository->destroy($maininformation);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('MainInformation Successfully Delete!') );
    }

}
