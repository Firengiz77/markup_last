<?php

namespace App\Repositories;

use App\Models\Service;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class ServiceRepository
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

            $service = new Service();


            $service->setTranslation('title', $request->lang??'az', $request->title);         
            $service->setTranslation('detail', $request->lang??'az', $request->detail);
            $service->setTranslation('meta_title', $request->lang??'az', $request->meta_title);   
            $service->setTranslation('meta_description', $request->lang??'az', $request->meta_description);  
            $service->setTranslation('meta_keywords', $request->lang??'az', $request->meta_keywords);
   

                $image = $this->imageRepository->upload($request, "Service", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    $service->image = $image["data"];
                }


                $icon = $this->imageRepository->upload($request, "Service", "icon");
                if (!$icon["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Icon Error.")
                    ];
                } elseif ($icon["code"] == 200) {
                    $service->icon = $icon["data"];
                }


                $image2 = $this->imageRepository->upload($request, "Service", "image2");
                if (!$image2["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image2 Error.")
                    ];
                } elseif ($image2["code"] == 200) {
                    $service->image2 = $image2["data"];
                }


           
                $service->setTranslation('slug', $request->lang??'az', $request->slug);


            $service->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $service];
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
     * @param Service $service
     * @return array
     */
    public function update($request, Service $service): array
    {
        DB::beginTransaction();

        try {

            $service->setTranslation('title', $request->lang, $request->title);      
                  $service->setTranslation('detail', $request->lang, $request->detail);

                  $service->setTranslation('meta_title', $request->lang, $request->meta_title);
                  $service->setTranslation('meta_description', $request->lang, $request->meta_description);
                  $service->setTranslation('meta_keywords', $request->lang, $request->meta_keywords);
      
      
                $image = $this->imageRepository->upload($request, "Service", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    Utility::deleteFile($service->image);
                    $service->image = $image["data"];
                }



                $icon = $this->imageRepository->upload($request, "Service", "icon");
                if (!$icon["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Icon Error.")
                    ];
                } elseif ($icon["code"] == 200) {
                    Utility::deleteFile($service->icon);
                    $service->icon = $icon["data"];
                }


                $image2 = $this->imageRepository->upload($request, "Service", "image2");
                if (!$icon["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image2 Error.")
                    ];
                } elseif ($image2["code"] == 200) {
                    Utility::deleteFile($service->image2);
                    $service->image2 = $image2["data"];
                }




             $service->setTranslation('slug', $request->lang, $request->slug);
             $service->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $service];


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



    public function destroy(Service $service): array
    {
        DB::beginTransaction();

        try {
            Utility::deleteFile($service->image);
            Utility::deleteFile($service->icon);
                 

            $service->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $service];


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
