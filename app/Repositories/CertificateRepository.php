<?php

namespace App\Repositories;

use App\Models\Certificate;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class CertificateRepository
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

            $certificate = new Certificate();



                $image = $this->imageRepository->upload($request, "Certificate", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    $certificate->image = $image["data"];
                }
                





            $certificate->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $certificate];
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
     * @param Certificate $certificate
     * @return array
     */
    public function update($request, Certificate $certificate): array
    {
        DB::beginTransaction();

        try {


                $image = $this->imageRepository->upload($request, "Certificate", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    Utility::deleteFile($certificate->image);
                    $certificate->image = $image["data"];
                }
                
            $certificate->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $certificate];


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



    public function destroy(Certificate $certificate): array
    {
        DB::beginTransaction();

        try {
            Utility::deleteFile($certificate->image);
                




            $certificate->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $certificate];


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
