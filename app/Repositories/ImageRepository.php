<?php

namespace App\Repositories;

use App\Models\Image;
use App\Models\Page;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Throwable;

class ImageRepository
{

    public function upload($request,$model,$input): array
    {
        try {
            if ($request->$input) {
                $extension = $request->file($input)->getClientOriginalExtension();

                if ($request->hasFile($input)) {

                    $fileNameToStorePage = strtolower($model). '_'.$input. time() . '.' . $extension;
                    $settings = Utility::getStorageSetting();
                    if ($settings['storage_setting'] == 'local') {
                        $dir = 'uploads/'.strtolower($model).'/';

                    } else {
                        $dir = 'uploads/'.strtolower($model).'/';
                    }
                    $path = Utility::upload_file($request, $input, $fileNameToStorePage, $dir, []);

                    if ($path['flag'] == 1) {
                        $url = $path['url'];
                    } else {
                        return [
                            'status' => false,
                            'code' => 502,
                            'message' => __($path['msg'])
                        ];
                    }

                }
                return ['status' => true, 'code' => 200, 'data' => $dir.$fileNameToStorePage];
            }else{
                return ['status' => true, 'code' => 201, 'data' => null];
            }




        }  catch (Throwable $e) {

            return [
                'status' => false,
                'code' => 502,
                'message' => __('errors.502')
            ];


        }
    }

    public function uploadAttribute($value, $model, $input): array
    {
        try {
            // Check if $value[$input] contains file data
            if (isset($value[$input])) {
                $extension = $value[$input]->getClientOriginalExtension();
    
                // Check if the file is valid
                if ($value[$input]->isValid()) {
                    // Generate file name
                    $fileNameToStore = strtolower($model) . '_' . $input . time() . '.' . $extension;
                    $settings = Utility::getStorageSetting();
                    $dir = 'uploads/' . strtolower($model) . '/';
    
                    // Move the uploaded file to the specified directory
                    $value[$input]->move($dir, $fileNameToStore);
    
                    // Assuming you want to return the URL of the uploaded file
                    $url = $dir . $fileNameToStore;
    
                    return ['status' => true, 'code' => 200, 'data' => $url];
                } else {
                    return [
                        'status' => false,
                        'code' => 502,
                        'message' => __("Invalid file.")
                    ];
                }
            } else {
                return ['status' => false, 'code' => 201, 'data' => null];
            }
        } catch (Throwable $e) {
            return [
                'status' => false,
                'code' => 502,
                'message' => __('errors.502')
            ];
        }
    }
    


    public function delete($image)
    {

        try {

            Utility::deleteFile($image);


            return ['status' => true, 'code' => 200, 'data' => $image];


        } catch (ModelNotFoundException $e) {

            return [
                'status' => false,
                'code' => 404,
                'message' => __('errors.404')
            ];

        } catch (Throwable $e) {

            return [
                'status' => false,
                'code' => 502,
                'message' => __('errors.502')
            ];


        }
    }

}
