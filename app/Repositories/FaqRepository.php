<?php

namespace App\Repositories;

use App\Models\Faq;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class FaqRepository
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

            $faq = new Faq();
            $faq->setTranslation('question', $request->lang??'az', $request->question);       
            $faq->setTranslation('answer', $request->lang??'az', $request->answer);
            $faq->save();

            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $faq];
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
     * @param Faq $faq
     * @return array
     */
    public function update($request, Faq $faq): array
    {
        DB::beginTransaction();

        try {

            $faq->setTranslation('question', $request->lang, $request->question);            $faq->setTranslation('answer', $request->lang, $request->answer);
            $faq->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $faq];


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



    public function destroy(Faq $faq): array
    {
        DB::beginTransaction();

        try {
            




            $faq->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $faq];


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
