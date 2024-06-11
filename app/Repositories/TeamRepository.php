<?php

namespace App\Repositories;

use App\Models\Team;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class TeamRepository
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

            $team = new Team();


            $team->setTranslation('name', $request->lang??'az', $request->name);            $team->setTranslation('profession', $request->lang??'az', $request->profession);
                $image = $this->imageRepository->upload($request, "Team", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    $team->image = $image["data"];
                }
                          $team->facebook = $request->facebook;
          $team->linkedin = $request->linkedin;
          $team->instagram = $request->instagram;






            $team->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $team];
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
     * @param Team $team
     * @return array
     */
    public function update($request, Team $team): array
    {
        DB::beginTransaction();

        try {

            $team->setTranslation('name', $request->lang, $request->name);            $team->setTranslation('profession', $request->lang, $request->profession);
                $image = $this->imageRepository->upload($request, "Team", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    Utility::deleteFile($team->image);
                    $team->image = $image["data"];
                }
                          $team->facebook = $request->facebook;
          $team->linkedin = $request->linkedin;
          $team->instagram = $request->instagram;

            $team->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $team];


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



    public function destroy(Team $team): array
    {
        DB::beginTransaction();

        try {
            Utility::deleteFile($team->image);
                




            $team->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $team];


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
