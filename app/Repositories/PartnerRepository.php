<?php

namespace App\Repositories;

use App\Models\Partner;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class PartnerRepository
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

            $partner = new Partner();



                $image = $this->imageRepository->upload($request, "Partners", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    $partner->image = $image["data"];
                }
                            $partner->setTranslation('title', $request->lang??'az', $request->title);          $partner->link = $request->link;






            $partner->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $partner];
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
     * @param Partner $partner
     * @return array
     */
    public function update($request, Partner $partner): array
    {
        DB::beginTransaction();

        try {


                $image = $this->imageRepository->upload($request, "Partners", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    Utility::deleteFile($partner->image);
                    $partner->image = $image["data"];
                }
                            $partner->setTranslation('title', $request->lang, $request->title);          $partner->link = $request->link;

            $partner->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $partner];


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



    public function destroy(Partner $partner): array
    {
        DB::beginTransaction();

        try {
            Utility::deleteFile($partner->image);
                




            $partner->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $partner];


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
