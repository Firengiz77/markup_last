<?php

namespace App\Repositories;

use App\Models\ProjectImage;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class ProjectImageRepository
{

    private ImageRepository $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;

    }



    public function store($id,$request): array
    {
        DB::beginTransaction();

        try {

            $projectimage = new ProjectImage();


          $projectimage->project_id = $id;

                $image = $this->imageRepository->upload($request, "ProjectImage", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    $projectimage->image = $image["data"];
                }
                





            $projectimage->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $projectimage];
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
     * @param ProjectImage $projectimage
     * @return array
     */
    public function update($request, ProjectImage $projectimage): array
    {
        DB::beginTransaction();

        try {

          $projectimage->project_id = $request->project_id;

                $image = $this->imageRepository->upload($request, "ProjectImage", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    Utility::deleteFile($projectimage->image);
                    $projectimage->image = $image["data"];
                }
                
            $projectimage->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $projectimage];


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



    public function destroy(ProjectImage $projectimage): array
    {
        DB::beginTransaction();

        try {
            Utility::deleteFile($projectimage->image);
                




            $projectimage->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $projectimage];


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
