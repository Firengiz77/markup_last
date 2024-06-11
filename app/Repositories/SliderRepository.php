<?php

namespace App\Repositories;

use App\Models\Slider;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class SliderRepository
{

    private ImageRepository $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;

    }



    public function store($request): array
    {
        DB::beginTransaction();

        try {

            $slider = new Slider();



                $image = $this->imageRepository->upload($request, "Slider", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    $slider->image = $image["data"];
                }
        
            $slider->setTranslation('title', $request->lang??'az', $request->title);  
            $slider->setTranslation('desc', $request->lang??'az', $request->desc);
            $slider->setTranslation('buttonText', $request->lang??'az', $request->buttonText); 
            $slider->link = $request->link; 


            $slider->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $slider];
        } catch (ModelNotFoundException $e) {
            DB::rollBack();

            return [
                'status' => false,
                'code' => 404,
                'message' => __('errors.404')
            ];

        } catch (Throwable $e) {
            DB::rollBack();

            return [
                'status' => false,
                'code' => 502,
                'message' => __('errors.502')
            ];


        }
    }


    /**
     * @param $request
     * @param Slider $slider
     * @return array
     */
    public function update($request, Slider $slider): array
    {
        DB::beginTransaction();

        try {


                $image = $this->imageRepository->upload($request, "Slider", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    Utility::deleteFile($slider->image);
                    $slider->image = $image["data"];
                }
            
                $slider->setTranslation('title', $request->lang, $request->title);  
                $slider->setTranslation('desc', $request->lang, $request->desc);

                $slider->setTranslation('buttonText', $request->lang, $request->buttonText); 
                $slider->link = $request->link; 
    
    
            $slider->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $slider];


        } catch (ModelNotFoundException $e) {
            DB::rollBack();

            return [
                'status' => false,
                'code' => 404,
                'message' => __('errors.404')
            ];

        } catch (Throwable $e) {
            DB::rollBack();

            return [
                'status' => false,
                'code' => 502,
                'message' => __('errors.502')
            ];


        }
    }



    public function destroy(Slider $slider): array
    {
        DB::beginTransaction();

        try {
            Utility::deleteFile($slider->image);
                




            $slider->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $slider];


        } catch (ModelNotFoundException $e) {
            DB::rollBack();

            return [
                'status' => false,
                'code' => 404,
                'message' => __('errors.404')
            ];

        } catch (Throwable $e) {
            DB::rollBack();

            return [
                'status' => false,
                'code' => 502,
                'message' => __('errors.502')
            ];


        }
    }



}
