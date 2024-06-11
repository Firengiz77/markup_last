<?php
namespace App\Http\Controllers;


use App\Http\Requests\ProjectImage\StoreProjectImageRequest;
use App\Http\Requests\ProjectImage\UpdateProjectImageRequest;
use App\Models\ProjectImage;
use App\Repositories\ProjectImageRepository;

class ProjectImageController extends Controller
{


    private ProjectImageRepository $projectimageRepository;

    public function __construct(ProjectImageRepository $projectimageRepository)
    {
        $this->projectimageRepository = $projectimageRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $projectimages    = ProjectImage::all();

        return view('projectimage.index', compact('projectimages','id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('projectimage.create',compact('id'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id,StoreProjectImageRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->projectimageRepository->store($id,$request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('ProjectImage  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectImage $projectimage)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $projectimage = ProjectImage::findorFail($id);
        return view('projectimage.edit', compact('projectimage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectImageRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $projectimage=ProjectImage::findorFail($id);
        if($request->validated())
        {
             $result =  $this->projectimageRepository->update($request, $projectimage);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('ProjectImage Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $projectimage = ProjectImage::findorFail($id);
        $result =  $this->projectimageRepository->destroy($projectimage);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('ProjectImage Successfully Delete!') );
    }

}
