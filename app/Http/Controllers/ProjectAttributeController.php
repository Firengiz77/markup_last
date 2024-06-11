<?php
namespace App\Http\Controllers;


use App\Http\Requests\ProjectAttribute\StoreProjectAttributeRequest;
use App\Http\Requests\ProjectAttribute\UpdateProjectAttributeRequest;
use App\Models\ProjectAttribute;
use App\Repositories\ProjectAttributeRepository;

class ProjectAttributeController extends Controller
{


    private ProjectAttributeRepository $projectattributeRepository;

    public function __construct(ProjectAttributeRepository $projectattributeRepository)
    {
        $this->projectattributeRepository = $projectattributeRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $projectattributes    = ProjectAttribute::all();

        return view('projectattribute.index', compact('projectattributes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('projectattribute.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectAttributeRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->projectattributeRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('ProjectAttribute  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectAttribute $projectattribute)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $projectattribute = ProjectAttribute::findorFail($id);
        return view('projectattribute.edit', compact('projectattribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectAttributeRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $projectattribute=ProjectAttribute::findorFail($id);
        if($request->validated())
        {
             $result =  $this->projectattributeRepository->update($request, $projectattribute);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('ProjectAttribute Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $projectattribute = ProjectAttribute::findorFail($id);
        $result =  $this->projectattributeRepository->destroy($projectattribute);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('ProjectAttribute Successfully Delete!') );
    }

}
