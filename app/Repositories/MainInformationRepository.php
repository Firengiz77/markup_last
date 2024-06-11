<?php

namespace App\Repositories;

use App\Models\MainInformation;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class MainInformationRepository
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

            $maininformation = new MainInformation();



                $header_logo = $this->imageRepository->upload($request, "MainInformation", "header_logo");
                if (!$header_logo["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($header_logo["code"] == 200) {
                    $maininformation->header_logo = $header_logo["data"];
                }
                
                $footer_logo = $this->imageRepository->upload($request, "MainInformation", "footer_logo");
                if (!$footer_logo["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($footer_logo["code"] == 200) {
                    $maininformation->footer_logo = $footer_logo["data"];
                }
                  




            $maininformation->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $maininformation];
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
     * @param MainInformation $maininformation
     * @return array
     */
    public function update($request, MainInformation $maininformation): array
    {
        DB::beginTransaction();

        try {


                $header_logo = $this->imageRepository->upload($request, "MainInformation", "header_logo");
                if (!$header_logo["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($header_logo["code"] == 200) {
                    Utility::deleteFile($maininformation->header_logo);
                    $maininformation->header_logo = $header_logo["data"];
                }
                
                $footer_logo = $this->imageRepository->upload($request, "MainInformation", "footer_logo");
                if (!$footer_logo["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($footer_logo["code"] == 200) {
                    Utility::deleteFile($maininformation->footer_logo);
                    $maininformation->footer_logo = $footer_logo["data"];
                }
            
            $maininformation->setTranslation('title', $request->lang, $request->title);  

            $maininformation->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $maininformation];


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



    public function destroy(MainInformation $maininformation): array
    {
        DB::beginTransaction();

        try {
            Utility::deleteFile($maininformation->header_logo);
                Utility::deleteFile($maininformation->footer_logo);
                




            $maininformation->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $maininformation];


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
