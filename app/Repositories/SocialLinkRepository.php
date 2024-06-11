<?php

namespace App\Repositories;

use App\Models\SocialLink;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class SocialLinkRepository
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

            $sociallink = new SocialLink();

            $sociallink->link = $request->link;
            $sociallink->name = $request->name;
            $sociallink->icon = $request->icon;

            $sociallink->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $sociallink];
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
     * @param SocialLink $sociallink
     * @return array
     */
    public function update($request, SocialLink $sociallink): array
    {
        DB::beginTransaction();

        try {


            $sociallink->link = $request->link;
            $sociallink->name = $request->name;
            $sociallink->icon = $request->icon;

            $sociallink->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $sociallink];


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



    public function destroy(SocialLink $sociallink): array
    {
        DB::beginTransaction();

        try {
         

            $sociallink->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $sociallink];


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
