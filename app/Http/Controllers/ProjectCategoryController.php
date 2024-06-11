<?php
namespace App\Http\Controllers;


use App\Http\Requests\ProjectCategory\StoreProjectCategoryRequest;
use App\Http\Requests\ProjectCategory\UpdateProjectCategoryRequest;
use App\Models\ProjectCategory;
use App\Repositories\ProjectCategoryRepository;

class ProjectCategoryController extends Controller
{


    private ProjectCategoryRepository $projectcategoryRepository;

    public function __construct(ProjectCategoryRepository $projectcategoryRepository)
    {
        $this->projectcategoryRepository = $projectcategoryRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $projectcategorys    = ProjectCategory::all();

        return view('projectcategory.index', compact('projectcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('projectcategory.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->projectcategoryRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('ProjectCategory  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectCategory $projectcategory)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $projectcategory = ProjectCategory::findorFail($id);
        return view('projectcategory.edit', compact('projectcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectCategoryRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $projectcategory=ProjectCategory::findorFail($id);
        if($request->validated())
        {
             $result =  $this->projectcategoryRepository->update($request, $projectcategory);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('ProjectCategory Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $projectcategory = ProjectCategory::findorFail($id);
        $result =  $this->projectcategoryRepository->destroy($projectcategory);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('ProjectCategory Successfully Delete!') );
    }

}
