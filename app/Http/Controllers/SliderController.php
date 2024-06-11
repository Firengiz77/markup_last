<?php
namespace App\Http\Controllers;


use App\Http\Requests\Slider\StoreSliderRequest;
use App\Http\Requests\Slider\UpdateSliderRequest;
use App\Models\Slider;
use App\Repositories\SliderRepository;

class SliderController extends Controller
{


    private SliderRepository $sliderRepository;

    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $sliders    = Slider::all();

        return view('slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('slider.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->validated())
        {
            $result =  $this->sliderRepository->store($request);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Slider  Successfully added!') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $slider = Slider::findorFail($id);
        return view('slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request,$id): \Illuminate\Http\RedirectResponse
    {
        $slider=Slider::findorFail($id);
        if($request->validated())
        {
             $result =  $this->sliderRepository->update($request, $slider);
        }else{
            return redirect()->back()->with('error', __('ERROR!') );

        }

        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Slider Successfully Update!') );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $slider = Slider::findorFail($id);
        $result =  $this->sliderRepository->destroy($slider);


        if (!data_get($result, 'status')) {
            return redirect()->back()->with('error', $result['message']);
        }


        return redirect()->back()->with('success', __('Slider Successfully Delete!') );
    }

}
