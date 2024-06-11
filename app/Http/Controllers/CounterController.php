<?php
namespace App\Http\Controllers;


use App\Http\Requests\Counter\StoreCounterRequest;
use App\Http\Requests\Counter\UpdateCounterRequest;
use App\Models\Counter;
use App\Repositories\CounterRepository;

class CounterController extends Controller
{


    private CounterRepository $counterRepository;

    public function __construct(CounterRepository $counterRepository)
    {
        $this->counterRepository = $counterRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $counters    = Counter::all();

        return view('counter.index', compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('counter.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCounterRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->counterRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Counter  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Counter $counter)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $counter = Counter::findorFail($id);
        return view('counter.edit', compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCounterRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $counter=Counter::findorFail($id);
        if($request->validated())
        {
             $result =  $this->counterRepository->update($request, $counter);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Counter Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $counter = Counter::findorFail($id);
        $result =  $this->counterRepository->destroy($counter);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Counter Successfully Delete!') );
    }

}
