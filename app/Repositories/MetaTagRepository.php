<?php

namespace App\Repositories;

use App\Models\MetaTag;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class MetaTagRepository
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

            $metatag = new MetaTag();


          $metatag->title = $request->title;
            $metatag->setTranslation('meta_title', $request->lang??'az', $request->meta_title);            $metatag->setTranslation('meta_description', $request->lang??'az', $request->meta_description);            $metatag->setTranslation('meta_keywords', $request->lang??'az', $request->meta_keywords);





            $metatag->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $metatag];
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
     * @param MetaTag $metatag
     * @return array
     */
    public function update($request, MetaTag $metatag): array
    {
        DB::beginTransaction();

        try {

          $metatag->title = $request->title;
            $metatag->setTranslation('meta_title', $request->lang, $request->meta_title);            $metatag->setTranslation('meta_description', $request->lang, $request->meta_description);            $metatag->setTranslation('meta_keywords', $request->lang, $request->meta_keywords);
            $metatag->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $metatag];


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



    public function destroy(MetaTag $metatag): array
    {
        DB::beginTransaction();

        try {
            




            $metatag->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $metatag];


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
