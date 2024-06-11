<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;

use Throwable;

class ContactRepository
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

            $contact = new Contact();


          
                $image = $this->imageRepository->upload($request, "Contact", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    $contact->image = $image["data"];
                }
                            $contact->setTranslation('address', $request->lang??'az', $request->address);          $contact->phone = $request->phone;
          $contact->email = $request->email;






            $contact->save();



            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $contact];
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
     * @param Contact $contact
     * @return array
     */
    public function update($request, Contact $contact): array
    {
        DB::beginTransaction();

        try {

          
                // $image = $this->imageRepository->upload($request, "Contact", "image");
                // if (!$image["status"]) {
                //     return [
                //         "status" => false,
                //         "code" => 502,
                //         "message" => __("Image Error.")
                //     ];
                // } elseif ($image["code"] == 200) {
                //     Utility::deleteFile($contact->image);
                //     $contact->image = $image["data"];
                // }
            
            
            $contact->setTranslation('address', $request->lang, $request->address);  
                    $contact->phone = $request->phone;
          $contact->email = $request->email;
          $contact->map = $request->map;

            $contact->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $contact];


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



    public function destroy(Contact $contact): array
    {
        DB::beginTransaction();

        try {
            Utility::deleteFile($contact->image);
                




            $contact->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $contact];


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
