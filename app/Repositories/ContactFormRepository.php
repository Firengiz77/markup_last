<?php

namespace App\Repositories;

use App\Models\ContactForm;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class ContactFormRepository
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

            $contactform = new ContactForm();


          $contactform->name = $request->name;
          $contactform->detail = $request->detail;
          $contactform->topic = $request->topic;
          $contactform->note = $request->note;






            $contactform->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $contactform];
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
     * @param ContactForm $contactform
     * @return array
     */
    public function update($request, ContactForm $contactform): array
    {
        DB::beginTransaction();

        try {

          $contactform->name = $request->name;
          $contactform->detail = $request->detail;
          $contactform->topic = $request->topic;
          $contactform->note = $request->note;

            $contactform->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $contactform];


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



    public function destroy(ContactForm $contactform): array
    {
        DB::beginTransaction();

        try {
            




            $contactform->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $contactform];


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
