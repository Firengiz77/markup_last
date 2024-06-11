<?php

namespace App\Repositories;

use App\Models\ProjectAttribute;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class ProjectAttributeRepository
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

            $projectattribute = new ProjectAttribute();


            $projectattribute->setTranslation('key', $request->lang??'az', $request->key);            $projectattribute->setTranslation('value', $request->lang??'az', $request->value);          $projectattribute->project_id = $request->project_id;






            $projectattribute->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $projectattribute];
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
     * @param ProjectAttribute $projectattribute
     * @return array
     */
    public function update($request, ProjectAttribute $projectattribute): array
    {
        DB::beginTransaction();

        try {

            $projectattribute->setTranslation('key', $request->lang, $request->key);            $projectattribute->setTranslation('value', $request->lang, $request->value);          $projectattribute->project_id = $request->project_id;

            $projectattribute->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $projectattribute];


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



    public function destroy(ProjectAttribute $projectattribute): array
    {
        DB::beginTransaction();

        try {
            




            $projectattribute->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $projectattribute];


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
