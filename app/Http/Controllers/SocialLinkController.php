<?php
namespace App\Http\Controllers;


use App\Http\Requests\SocialLink\StoreSocialLinkRequest;
use App\Http\Requests\SocialLink\UpdateSocialLinkRequest;
use App\Models\SocialLink;
use App\Repositories\SocialLinkRepository;

class SocialLinkController extends Controller
{


    private SocialLinkRepository $sociallinkRepository;

    public function __construct(SocialLinkRepository $sociallinkRepository)
    {
        $this->sociallinkRepository = $sociallinkRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $sociallinks    = SocialLink::all();

        return view('sociallink.index', compact('sociallinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('sociallink.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSocialLinkRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->sociallinkRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('SocialLink  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialLink $sociallink)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $sociallink = SocialLink::findorFail($id);
        return view('sociallink.edit', compact('sociallink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSocialLinkRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $sociallink=SocialLink::findorFail($id);
        if($request->validated())
        {
             $result =  $this->sociallinkRepository->update($request, $sociallink);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('SocialLink Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $sociallink = SocialLink::findorFail($id);
        $result =  $this->sociallinkRepository->destroy($sociallink);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('SocialLink Successfully Delete!') );
    }

}
