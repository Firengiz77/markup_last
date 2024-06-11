<?php
namespace App\Http\Controllers;


use App\Http\Requests\Tag\StoreTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;
use App\Models\Tag;
use App\Repositories\TagRepository;

class TagController extends Controller
{


    private TagRepository $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $tags    = Tag::all();

        return view('tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('tag.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->tagRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Tag  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $tag = Tag::findorFail($id);
        return view('tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $tag=Tag::findorFail($id);
        if($request->validated())
        {
             $result =  $this->tagRepository->update($request, $tag);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Tag Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $tag = Tag::findorFail($id);
        $result =  $this->tagRepository->destroy($tag);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Tag Successfully Delete!') );
    }

}
