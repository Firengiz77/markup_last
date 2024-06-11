<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\Utility;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;
use App\Models\Tag;

use Throwable;

class BlogRepository
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

            $blog = new Blog();


            $blog->setTranslation('title', $request->lang??'az', $request->title);            $blog->setTranslation('desc', $request->lang??'az', $request->desc);
                $image = $this->imageRepository->upload($request, "Blog", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    $blog->image = $image["data"];
                }
             $blog->setTranslation('meta_title', $request->lang??'az', $request->meta_title);   
                      $blog->setTranslation('meta_description', $request->lang??'az', $request->meta_description);  
                                $blog->setTranslation('meta_keywords', $request->lang??'az', $request->meta_keywords);





            $blog->save();

            $tags = Tag::findOrFail($request->tags);
            $blog->tags()->attach($tags);




            DB::commit();
            return ['status' => true, 'code' => 200, 'data' => $blog];
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
     * @param Blog $blog
     * @return array
     */
    public function update($request, Blog $blog): array
    {
        DB::beginTransaction();

        try {

            $blog->setTranslation('title', $request->lang, $request->title);            $blog->setTranslation('desc', $request->lang, $request->desc);
                $image = $this->imageRepository->upload($request, "Blog", "image");
                if (!$image["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($image["code"] == 200) {
                    Utility::deleteFile($blog->image);
                    $blog->image = $image["data"];
                }
            $blog->setTranslation('meta_title', $request->lang, $request->meta_title); 
            $blog->setTranslation('meta_description', $request->lang, $request->meta_description); 
            $blog->setTranslation('meta_keywords', $request->lang, $request->meta_keywords);
           

            $tags = Tag::findOrFail($request->tags);
            $blog->tags()->sync($tags);

            $blog->update();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $blog];


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



    public function destroy(Blog $blog): array
    {
        DB::beginTransaction();

        try {
            Utility::deleteFile($blog->image);

            $blog->delete();

            DB::commit();

            return ['status' => true, 'code' => 200, 'data' => $blog];


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
