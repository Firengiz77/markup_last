<?php
namespace App\Http\Controllers;


use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Models\Blog;
use App\Repositories\BlogRepository;
use App\Models\Tag;

class BlogController extends Controller
{


    private BlogRepository $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $blogs    = Blog::all();

        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $tags = Tag::orderBy('title')->get();
        return view('blog.create',compact('tags'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->blogRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Blog  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $blog = Blog::findorFail($id);
        $tags = Tag::orderBy('title')->get();
        return view('blog.edit', compact('blog','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $blog=Blog::findorFail($id);
        if($request->validated())
        {
             $result =  $this->blogRepository->update($request, $blog);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Blog Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $blog = Blog::findorFail($id);
        $result =  $this->blogRepository->destroy($blog);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Blog Successfully Delete!') );
    }

}
