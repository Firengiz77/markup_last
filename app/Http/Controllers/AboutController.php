<?php
namespace App\Http\Controllers;


use App\Http\Requests\About\StoreAboutRequest;
use App\Http\Requests\About\UpdateAboutRequest;
use App\Models\About;
use App\Repositories\AboutRepository;

class AboutController extends Controller
{


    private AboutRepository $aboutRepository;

    public function __construct(AboutRepository $aboutRepository)
    {
        $this->aboutRepository = $aboutRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $abouts    = About::all();

        return view('about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('about.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->aboutRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('About  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $about = About::findorFail($id);
        return view('about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $about=About::findorFail($id);
        if($request->validated())
        {
             $result =  $this->aboutRepository->update($request, $about);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('About Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $about = About::findorFail($id);
        $result =  $this->aboutRepository->destroy($about);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('About Successfully Delete!') );
    }

}
