<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class TagRepository
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

            $tag = new Tag();


            $tag->setTranslation('title', $request->lang??'az', $request->title);   
          

            $tag->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $tag];
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
     * @param Tag $tag
     * @return array
     */
    public function update($request, Tag $tag): array
    {
        DB::beginTransaction();

        try {

            $tag->setTranslation('title', $request->lang, $request->title);     
            $tag->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $tag];


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



    public function destroy(Tag $tag): array
    {
        DB::beginTransaction();

        try {
            




            $tag->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $tag];


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
