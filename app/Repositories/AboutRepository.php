<?php

namespace App\Repositories;

use App\Models\About;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class AboutRepository
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

            $about = new About();



                $image = $this->imageRepository->upload($request, "About", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    $about->image = $image["data"];
                }
            
            $about->setTranslation('title', $request->lang??'az', $request->title);   
            $about->setTranslation('desc', $request->lang??'az', $request->desc);





            $about->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $about];
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
     * @param About $about
     * @return array
     */
    public function update($request, About $about): array
    {
        DB::beginTransaction();

        try {


                $image = $this->imageRepository->upload($request, "About", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    Utility::deleteFile($about->image);
                    $about->image = $image["data"];
                }
          
                $about->setTranslation('title', $request->lang, $request->title);  
                
                $about->setTranslation('desc', $request->lang, $request->desc);

                $about->setTranslation('meta_title', $request->lang, $request->meta_title);
                $about->setTranslation('meta_description', $request->lang, $request->meta_description);
                $about->setTranslation('meta_keywords', $request->lang, $request->meta_keywords);
    
    
            $about->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $about];


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



    public function destroy(About $about): array
    {
        DB::beginTransaction();

        try {
            Utility::deleteFile($about->image);
                




            $about->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $about];


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
