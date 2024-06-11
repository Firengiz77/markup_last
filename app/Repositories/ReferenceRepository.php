<?php

namespace App\Repositories;

use App\Models\Reference;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class ReferenceRepository
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

            $reference = new Reference();



                $image = $this->imageRepository->upload($request, "Reference", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    $reference->image = $image["data"];
                }
                            $reference->setTranslation('name', $request->lang??'az', $request->name);          $reference->link = $request->link;






            $reference->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $reference];
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
     * @param Reference $reference
     * @return array
     */
    public function update($request, Reference $reference): array
    {
        DB::beginTransaction();

        try {


                $image = $this->imageRepository->upload($request, "Reference", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    Utility::deleteFile($reference->image);
                    $reference->image = $image["data"];
                }
                            $reference->setTranslation('name', $request->lang, $request->name);          $reference->link = $request->link;

            $reference->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $reference];


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



    public function destroy(Reference $reference): array
    {
        DB::beginTransaction();

        try {
            Utility::deleteFile($reference->image);
                




            $reference->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $reference];


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
