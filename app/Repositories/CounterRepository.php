<?php

namespace App\Repositories;

use App\Models\Counter;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class CounterRepository
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

            $counter = new Counter();


            $counter->setTranslation('title', $request->lang??'az', $request->title);          $counter->number = $request->number;






            $counter->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $counter];
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
     * @param Counter $counter
     * @return array
     */
    public function update($request, Counter $counter): array
    {
        DB::beginTransaction();

        try {

            $counter->setTranslation('title', $request->lang, $request->title);          $counter->number = $request->number;

            $counter->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $counter];


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



    public function destroy(Counter $counter): array
    {
        DB::beginTransaction();

        try {
            




            $counter->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $counter];


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
