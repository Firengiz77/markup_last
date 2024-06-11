<?php
namespace App\Http\Controllers;


use App\Http\Requests\MetaTag\StoreMetaTagRequest;
use App\Http\Requests\MetaTag\UpdateMetaTagRequest;
use App\Models\MetaTag;
use App\Repositories\MetaTagRepository;

class MetaTagController extends Controller
{


    private MetaTagRepository $metatagRepository;

    public function __construct(MetaTagRepository $metatagRepository)
    {
        $this->metatagRepository = $metatagRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $metatags    = MetaTag::all();

        return view('metatag.index', compact('metatags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('metatag.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMetaTagRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->metatagRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('MetaTag  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(MetaTag $metatag)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $metatag = MetaTag::findorFail($id);
        return view('metatag.edit', compact('metatag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMetaTagRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $metatag=MetaTag::findorFail($id);
        if($request->validated())
        {
             $result =  $this->metatagRepository->update($request, $metatag);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('MetaTag Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $metatag = MetaTag::findorFail($id);
        $result =  $this->metatagRepository->destroy($metatag);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('MetaTag Successfully Delete!') );
    }

}
