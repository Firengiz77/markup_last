<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;
use App\Models\ProjectAttribute;
use Throwable;
use App\Models\ProjectImage;

class ProjectRepository
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

            $project = new Project();
      
            $project->category_id = $request->category_id;
            $project->setTranslation('title', $request->lang??'az', $request->title);   
            $project->setTranslation('desc', $request->lang??'az', $request->desc);     
                                     
            $project->setTranslation('meta_title', $request->lang??'az', $request->meta_title);   
            $project->setTranslation('meta_description', $request->lang??'az', $request->meta_description);  
            $project->setTranslation('meta_keywords', $request->lang??'az', $request->meta_keywords);


                $image = $this->imageRepository->upload($request, "Project", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    $project->image = $image["data"];
                }
          
            $project->save();

         

            if ($request->hasFile('images')) {
               
                foreach ($request->file('images') as $image) {

                    $settings = Utility::getStorageSetting();
                    if ($settings['storage_setting'] == 'local') {
                        $dir = 'uploads/' . strtolower('ProductImage') . '/';

                    } else {
                        $dir = 'uploads/' . strtolower('ProductImage') . '/';
                    }

                    $path = $image->store(strtolower('ProductImage'), ['disk' => 'uploads']);
                 
                    $productimage = new ProjectImage();
                    $productimage->image = 'uploads/' . $path;
                    $productimage->project_id = $project->id;
                    $productimage->save();
                }

            }




            if($request->fields){
        
                foreach ($request->fields as $key => $value) {
                    $attribute = new ProjectAttribute();
                    $attribute->setTranslation("key",  $request->lang ?? 'az', $value['key']);
                    $attribute->setTranslation("value",  $request->lang ?? 'az', $value['value']);
                    $attribute->project_id  = $project->id;
                    $attribute->save();
                }
            }




            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $project];
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
     * @param Project $project
     * @return array
     */
    public function update($request, Project $project): array
    {
        DB::beginTransaction();

        try {

    
            $project->setTranslation('title', $request->lang, $request->title);           
            $project->setTranslation('desc', $request->lang, $request->desc);         
            $project->category_id = $request->category_id;
            $project->setTranslation('meta_title', $request->lang, $request->meta_title); 
            $project->setTranslation('meta_description', $request->lang, $request->meta_description); 
            $project->setTranslation('meta_keywords', $request->lang, $request->meta_keywords);
           

                if($request->attribute){
                    foreach ($request->attribute as $key => $value) {
        
                        $attribute=ProjectAttribute::find($value['id']);
                        $attribute->setTranslation("key",  $request->lang, $value['key']);
                        $attribute->setTranslation("value",  $request->lang, $value['value']);
                        $attribute->project_id  = $project->id;
                        $attribute->save();
                  }
                }
        
        
                if($request->fields){
                    foreach ($request->fields as $key => $value) {
                        $attribute = new ProjectAttribute();
                         $attribute->setTranslation("key", $request->lang, $value['key']);
                        $attribute->setTranslation("value",  $request->lang, $value['value']);
                        $attribute->project_id  = $project->id;
                        $attribute->save();
                    }
                }


            $project->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $project];


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



    public function destroy(Project $project): array
    {
        DB::beginTransaction();

        try {
            Utility::deleteFile($project->image);
                Utility::deleteFile($project->images);
                

            $project->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $project];


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
