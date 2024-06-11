<?php

namespace App\Repositories;

use App\Models\ProjectCategory;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class ProjectCategoryRepository
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

            $projectcategory = new ProjectCategory();


            $projectcategory->setTranslation('name', $request->lang??'az', $request->name);





            $projectcategory->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $projectcategory];
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
     * @param ProjectCategory $projectcategory
     * @return array
     */
    public function update($request, ProjectCategory $projectcategory): array
    {
        DB::beginTransaction();

        try {

            $projectcategory->setTranslation('name', $request->lang, $request->name);
            $projectcategory->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $projectcategory];


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



    public function destroy(ProjectCategory $projectcategory): array
    {
        DB::beginTransaction();

        try {
            




            $projectcategory->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $projectcategory];


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
