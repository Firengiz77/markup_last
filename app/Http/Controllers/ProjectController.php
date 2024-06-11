<?php
namespace App\Http\Controllers;


use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project;
use App\Repositories\ProjectRepository;
use App\Models\ProjectCategory;

class ProjectController extends Controller
{


    private ProjectRepository $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $projects    = Project::all();

        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = ProjectCategory::pluck("name","id");
        return view('project.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->projectRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Project  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $project = Project::findorFail($id);
        $categories = ProjectCategory::pluck("name","id");
        return view('project.edit', compact('project','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $project=Project::findorFail($id);
        if($request->validated())
        {
             $result =  $this->projectRepository->update($request, $project);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Project Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $project = Project::findorFail($id);
        $result =  $this->projectRepository->destroy($project);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Project Successfully Delete!') );
    }

}
