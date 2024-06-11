<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Pluralizer;

class CrudController extends Controller
{

    /**
     * Filesystem instance
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        $this->files = $files;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view('crud.index');
    }


    public function store(Request $request)
    {
//        return  $request->inputFields;

//        foreach ($request->inputFields as $field) {
//            echo $field['row_name'];
//        }




        $this->makeController($request->name, $request);
        $this->makeRepo($request->name, $request);
//
        $this->makeModel($request->name, $request);
        $this->makeMigration($request->name, $request);
        $this->makeRequest($request->name, $request);
        $this->makeView($request->name, $request);

//        return  $request->all();
        return redirect()->back()->with('success', __('Page Successfully added!'));
    }


    /**
     * Return the Singular Capitalize Name
     * @param $name
     * @return string
     */
    public function getSingularClassName($name): string
    {
        return ucwords(Pluralizer::singular($name));
    }

    /**
     * Return the Singular Capitalize Name
     * @param $name
     * @return string
     */
    public function getSingularVariableName($name): string
    {
        return strtolower(Pluralizer::singular($name));
    }


    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param $stub
     * @param array $stubVariables
     * @return bool|mixed|string
     */
    public function getStubContents($stub, array $stubVariables = []): mixed
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('$' . $search . '$', $replace, $contents);
        }

        return $contents;

    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getSourceFilePath($dir, $file, $modelName = null): string
    {
        if ($modelName) {
            return base_path('App\\' . $dir) . '\\' . $this->getSingularClassName($modelName) . $file . '.php';

        } else {
            return base_path('App\\' . $dir) . '\\' . $file . '.php';

        }
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     *
     */
    public function getSourceFile($dir, $file, $modelName, $request = null): mixed
    {
//        $field['row_name']
        $fields = '';
        $delete_fields = '';
        $update_fields = '';
        $model_fields = '';
        $model_translatable = '';
        $migrate = '';
        $store_req = '';
        $update_req = '';
        $create_inpute = '';
        $edit_inpute = '';


        foreach ($request->inputFields as $field) {
            $model_fields .= "'" . $field['row_name'] . "',\n";
            $migrate .= '$table->' . $field['row_type'] . '("' . $field['row_name'] . '")->nullable();' . "\n";

            if ($field['input_type'] == 'file') {
                $store_req .= "'" . $field['row_name'] . "' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:20480',\n";

                $fields .= '
                $' . $field['row_name'] . ' = $this->imageRepository->upload($request, "' . $modelName . '", "' . $field['row_name'] . '");
                if (!$' . $field['row_name'] . '["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($' . $field['row_name'] . '["code"] == 200) {
                    $' . $this->getSingularVariableName($modelName) . '->' . $field['row_name'] . ' = $' . $field['row_name'] . '["data"];
                }
                ';


                $update_fields .= '
                $' . $field['row_name'] . ' = $this->imageRepository->upload($request, "' . $modelName . '", "' . $field['row_name'] . '");
                if (!$' . $field['row_name'] . '["status"]) {
                    return [
                        "status" => false,
                        "code" => 502,
                        "message" => __("Image Error.")
                    ];
                } elseif ($' . $field['row_name'] . '["code"] == 200) {
                    Utility::deleteFile($' . $this->getSingularVariableName($modelName) . '->' . $field['row_name'] . ');
                    $' . $this->getSingularVariableName($modelName) . '->' . $field['row_name'] . ' = $' . $field['row_name'] . '["data"];
                }
                ';

                $delete_fields .= 'Utility::deleteFile($' . $this->getSingularVariableName($modelName) . '->' . $field['row_name'] . ');
                ';

            } else {
                $store_req .= "'" . $field['row_name'] . "' => ['string'],\n";

                $update_req .= "'" . $field['row_name'] . "' => ['string'],\n";

                if (@$field['translatable'] == 'on') {
                    $model_translatable .= "'" . $field['row_name'] . "',\n";

                    $fields .= "            $" . $this->getSingularVariableName($modelName) . "->setTranslation('" . $field['row_name'] . "', \$request->lang??'az', \$request->" . $field['row_name'] . ");";
                    $update_fields .= "            $" . $this->getSingularVariableName($modelName) . "->setTranslation('" . $field['row_name'] . "', \$request->lang, \$request->" . $field['row_name'] . ");";
                } else {
                    $fields .= "          \$" . $this->getSingularVariableName($modelName) . "->" . $field['row_name'] . " = \$request->" . $field['row_name'] . ";\n";
                    $update_fields .= "          \$" . $this->getSingularVariableName($modelName) . "->" . $field['row_name'] . " = \$request->" . $field['row_name'] . ";\n";

                }

            }


            if ($field['input_type'] == 'file') {
                $create_inpute .= "<div class='col-12'> ";
                $edit_inpute .= "\n";
                $create_inpute .= "<div class='form-group'>";
                $edit_inpute .= "\n";
                $create_inpute .= "<label for='" . $field['row_name'] . "' class='col-form-label'>" . __($field['row_name']) . "</label>";
                $edit_inpute .= "\n";
                $create_inpute .= "<input type='file' name='" . $field['row_name'] . "' id='blog_cover_image' class='form-control' onchange='document.getElementById(\"" . $field['row_name'] . "Img\").src = window.URL.createObjectURL(this.files[0])'>";
                $edit_inpute .= "\n";
                $create_inpute .= "<img id='" . $field['row_name'] . "Img' src='' width='20%' class='mt-2'/>";
                $edit_inpute .= "\n";
                $create_inpute .= "</div>";
                $edit_inpute .= "\n";
                $create_inpute .= "</div>";
                $create_inpute .= "\n";

                $edit_inpute .= "<div class='col-12'>";
                $edit_inpute .= "\n";
                $edit_inpute .= "<div class='form-group'>";
                $edit_inpute .= "\n";
                $edit_inpute .= "<label for='" . $field['row_name'] . "' class='col-form-label'>" . __($field['row_name']) . "</label>";
                $edit_inpute .= "\n";
                $edit_inpute .= "<input type='file' name='" . $field['row_name'] . "' id='blog_cover_image' class='form-control' onchange='document.getElementById(\"" . $field['row_name'] . "Img\").src = window.URL.createObjectURL(this.files[0])'>";
                $edit_inpute .= "\n";
                $edit_inpute .= "<img src='/public/{{\$" . $this->getSingularVariableName($modelName) . "->" . $field['row_name'] . "}}' width='200' class='mt-2'/>";
                $edit_inpute .= "\n";
                $edit_inpute .= "<img id='" . $field['row_name'] . "Img' src='' width='20%' class='mt-2'/>";
                $edit_inpute .= "\n";
                $edit_inpute .= "</div>";
                $edit_inpute .= "\n";
                $edit_inpute .= "</div>";
                $edit_inpute .= "\n";


            } elseif ($field['input_type'] == 'text') {
                $create_inpute .= "<div class='col-12'>";
                $edit_inpute .= "\n";
                $create_inpute .= "<div class='form-group'>";
                $edit_inpute .= "\n";
                $create_inpute .= "{{ Form::label('" . $field['row_name'] . "', __('" . $field['row_name'] . "'), array('class' => 'form-label')) }}";
                $edit_inpute .= "\n";
                $create_inpute .= "{{ Form::text('" . $field['row_name'] . "', null, array('class' => 'form-control', 'placeholder' => __('Enter " . $field['row_name'] . "'), 'required' => 'required')) }}";
                $edit_inpute .= "\n";
                $create_inpute .= "</div>";
                $edit_inpute .= "\n";
                $create_inpute .= "</div>";
                $create_inpute .= "\n";

                if (@$field['translatable'] == 'on') {
                    $edit_inpute .= "<div class='col-12'>";
                    $edit_inpute .= "\n";
                    $edit_inpute .= "<div class='form-group'>";
                    $edit_inpute .= "\n";
                    $edit_inpute .= "{{ Form::label('" . $field['row_name'] . "', __('" . $field['row_name'] . "'), array('class' => 'form-label')) }}";
                    $edit_inpute .= "\n";
                    $edit_inpute .= "{{ Form::text('" . $field['row_name'] . "', \$" . $field['row_name'] . "->getTranslation('" . $field['row_name'] . "', \$code), array('class' => 'form-control', 'placeholder' => __('Enter " . $field['row_name'] . "'), 'required' => 'required')) }}";
                    $edit_inpute .= "\n";
                    $edit_inpute .= "</div>";
                    $edit_inpute .= "\n";
                    $edit_inpute .= "</div>";
                    $edit_inpute .= "\n";
                } else {

                    $edit_inpute .= "<div class='col-12'>";
                    $edit_inpute .= "\n";
                    $edit_inpute .= "<div class='form-group'>";
                    $edit_inpute .= "\n";
                    $edit_inpute .= "{{ Form::label('" . $field['row_name'] . "', __('" . $field['row_name'] . "'), array('class' => 'form-label')) }}";
                    $edit_inpute .= "\n";
                    $edit_inpute .= "{{ Form::text('" . $field['row_name'] . "', null, array('class' => 'form-control', 'placeholder' => __('Enter " . $field['row_name'] . "'), 'required' => 'required')) }}";
                    $edit_inpute .= "\n";
                    $edit_inpute .= "</div>";
                    $edit_inpute .= "\n";
                    $edit_inpute .= "</div>";
                    $edit_inpute .= "\n";

                }

            } elseif ($field['input_type'] == 'number') {
                $create_inpute .= "<div class='col-12'>";
                $edit_inpute .= "\n";
                $create_inpute .= "<div class='form-group'>";
                $edit_inpute .= "\n";
                $create_inpute .= "{{ Form::label('" . $field['row_name'] . "', __('" . $field['row_name'] . "'), array('class' => 'form-label')) }}";
                $edit_inpute .= "\n";
                $create_inpute .= "{{ Form::number('" . $field['row_name'] . "', null, array('class' => 'form-control', 'placeholder' => __('Enter " . $field['row_name'] . "'), 'required' => 'required')) }}";
                $edit_inpute .= "\n";
                $create_inpute .= "</div>";
                $edit_inpute .= "\n";
                $create_inpute .= "</div>";
                $create_inpute .= "\n";


                $edit_inpute .= "<div class='col-12'>";
                $edit_inpute .= "\n";
                $edit_inpute .= "<div class='form-group'>";
                $edit_inpute .= "\n";
                $edit_inpute .= "{{ Form::label('" . $field['row_name'] . "', __('" . $field['row_name'] . "'), array('class' => 'form-label')) }}";
                $edit_inpute .= "\n";
                $edit_inpute .= "{{ Form::number('" . $field['row_name'] . "', null, array('class' => 'form-control', 'placeholder' => __('Enter " . $field['row_name'] . "'), 'required' => 'required')) }}";
                $edit_inpute .= "\n";
                $edit_inpute .= "</div>";
                $edit_inpute .= "\n";
                $edit_inpute .= "</div>";
                $edit_inpute .= "\n";
            }


            if (@$field['seo'] == 'on') {
                $fields .= "            $" . $this->getSingularVariableName($modelName) . "->setTranslation('meta_title', \$request->lang??'az', \$request->meta_title);";
                $update_fields .= "            $" . $this->getSingularVariableName($modelName) . "->setTranslation('meta_title', \$request->lang, \$request->meta_title);";

                $fields .= "            $" . $this->getSingularVariableName($modelName) . "->setTranslation('meta_description', \$request->lang??'az', \$request->meta_description);";
                $update_fields .= "            $" . $this->getSingularVariableName($modelName) . "->setTranslation('meta_description', \$request->lang, \$request->meta_description);";

                $fields .= "            $" . $this->getSingularVariableName($modelName) . "->setTranslation('meta_keywords', \$request->lang??'az', \$request->meta_keywords);";
                $update_fields .= "            $" . $this->getSingularVariableName($modelName) . "->setTranslation('meta_keywords', \$request->lang, \$request->meta_keywords);";


                $migrate .= '$table->text("meta_title")->nullable();' . "\n";
                $migrate .= '$table->text("meta_description")->nullable();' . "\n";
                $migrate .= '$table->text("meta_keywords")->nullable();' . "\n";

            }

            }


//        foreach ($request->inputFields as $field) {
//            if ()
//        }
        $variables = [
            'NAMESPACE' => $dir,
            'FIELDS' => $fields,
            'EDIT_INPUTE' => $edit_inpute,
            'CREATE_INPUTE' => $create_inpute,
            'STORE_REQ' => $store_req,
            'UPDATE_REQ' => $update_req,
            'MODEL_FIELDS' => $model_fields,
            'MODEL_TRANS' => $model_translatable,
            'MIGRATE' => $migrate,
            'UPDATE_FIELDS' => $update_fields,
            'DELETE_FIELDS' => $delete_fields,
            'CLASS_NAME' => $this->getSingularClassName($modelName),
            'VARIABLE_NAME' => $this->getSingularVariableName($modelName),
        ];

        return $this->getStubContents(__DIR__ . '/../../../stubs/' . $file . '.stub', $variables);
    }


    /**
     * Build the directory for the class if necessary.
     *
     * @param string $path
     * @return string
     */
    protected function makeDirectory(string $path): string
    {
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }


    protected function makeController($modelName, $request): void
    {

        $path = $this->getSourceFilePath('Http\\Controllers', 'Controller', $modelName);

//        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile('App\\Http\\Controllers', 'controller', $modelName, $request);


//        Route::post('slide', [\App\Http\Controllers\SlideController::class, 'store'])->name('slide.store');
//        Route::get('slides', [\App\Http\Controllers\SlideController::class, 'index'])->name('slide.index');
//        Route::get('slide/create', [SlideController::class, 'create'])->name('slide.create');
//        Route::put('slide/{id}', [SlideController::class, 'update'])->name('slide.update');
//        Route::delete('slide/{id}', [SlideController::class, 'destroy'])->name('slide.destroy');
//        Route::get('slide/{id}/edit', [SlideController::class, 'edit'])->name('slide.edit');


        file_put_contents(base_path('routes/admin.php'), "\n
          Route::post('" . $this->getSingularVariableName($modelName) . "', [\App\Http\Controllers\\" . $this->getSingularClassName($modelName) . "Controller::class, 'store'])->name('" . $this->getSingularVariableName($modelName) . ".store'); \n
          Route::get('" . $this->getSingularVariableName($modelName) . "s', [\App\Http\Controllers\\" . $this->getSingularClassName($modelName) . "Controller::class, 'index'])->name('" . $this->getSingularVariableName($modelName) . ".index'); \n
          Route::get('" . $this->getSingularVariableName($modelName) . "/create', [\App\Http\Controllers\\" . $this->getSingularClassName($modelName) . "Controller::class, 'create'])->name('" . $this->getSingularVariableName($modelName) . ".create'); \n
          Route::put('" . $this->getSingularVariableName($modelName) . "/{id}', [\App\Http\Controllers\\" . $this->getSingularClassName($modelName) . "Controller::class, 'update'])->name('" . $this->getSingularVariableName($modelName) . ".update'); \n
          Route::delete('" . $this->getSingularVariableName($modelName) . "/{id}', [\App\Http\Controllers\\" . $this->getSingularClassName($modelName) . "Controller::class, 'destroy'])->name('" . $this->getSingularVariableName($modelName) . ".destroy'); \n
          Route::get('" . $this->getSingularVariableName($modelName) . "/{id}/edit', [\App\Http\Controllers\\" . $this->getSingularClassName($modelName) . "Controller::class, 'edit'])->name('" . $this->getSingularVariableName($modelName) . ".edit'); \n
      \n", FILE_APPEND);


        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            Log::channel('custom')->info("File : {$path} created");

        } else {
            Log::channel('custom')->info("File : {$path} already exits");

        }
    }

    protected function makeRepo($modelName, $request): void
    {
        $path = $this->getSourceFilePath('Repositories', 'Repository', $modelName);

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile('Repositories', 'repository', $modelName, $request);//dir: App\\Repositories    |file:  repository.stub

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            Log::channel('custom')->info("File : {$path} created");

        } else {
            Log::channel('custom')->info("File : {$path} already exits");

        }
    }


    protected function makeModel($modelName, $request): void
    {
        $path = $this->getSourceFilePath('Models', $modelName);//dir: App\\Repositories    |file:  BlogRepository

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile('Models', 'model', $modelName, $request);//dir: App\\Repositories    |file:  repository.stub

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            Log::channel('custom')->info("File : {$path} created");

        } else {
            Log::channel('custom')->info("File : {$path} already exits");

        }
    }

    protected function makeMigration($modelName, $request): void
    {
        $path = base_path('database\\migrations') . '\\' . now()->timestamp . '_create_' . $this->getSingularVariableName($modelName) . '_table.php';

//        $path = $this->getSourceFilePath('Policies','Policie',$modelName);//dir: App\\Repositories    |file:  BlogRepository

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile('migration', 'migration', $modelName, $request);//dir: App\\Repositories    |file:  repository.stub

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            Log::channel('custom')->info("File : {$path} created");

        } else {
            Log::channel('custom')->info("File : {$path} already exits");

        }
    }


    protected function makeRequest($modelName, $request): void
    {
//        $path = $this->getSourceFilePath('Http\\Requests\\'.$modelName.'\\'.,'Requests',$modelName);//dir: App\\Repositories    |file:  BlogRepository
        $path = base_path('App\\Http\\Requests\\') . '\\' . $this->getSingularClassName($modelName) . '\\Store' . $this->getSingularClassName($modelName) . 'Request.php';

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile('Http\\Requests', 'storerequest', $modelName, $request);//dir: App\\Repositories    |file:  repository.stub

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            Log::channel('custom')->info("File : {$path} created");

        } else {
            Log::channel('custom')->info("File : {$path} already exits");

        }

        $path = base_path('App\\Http\\Requests\\') . '\\' . $this->getSingularClassName($modelName) . '\\Update' . $this->getSingularClassName($modelName) . 'Request.php';

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile('Http\\Requests', 'updaterequest', $modelName, $request);//dir: App\\Repositories    |file:  repository.stub

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            Log::channel('custom')->info("File : {$path} created");

        } else {
            Log::channel('custom')->info("File : {$path} already exits");

        }
    }


    protected function makeView($modelName, $request): void
    {
//        $path = $this->getSourceFilePath('Http\\Requests\\'.$modelName.'\\'.,'Requests',$modelName);//dir: App\\Repositories    |file:  BlogRepository
        $path = base_path('resources\\views\\') . $this->getSingularVariableName($modelName) . '\\index.blade.php';

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile('resources', '/views/index', $modelName, $request);//dir: App\\Repositories    |file:  repository.stub

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            Log::channel('custom')->info("File : {$path} created");

        } else {
            Log::channel('custom')->info("File : {$path} already exits");

        }

        $path = base_path('resources\\views\\') . $this->getSingularVariableName($modelName) . '\\edit.blade.php';

        $this->makeDirectory(dirname($path));
        if (@$field['seo'] == 'on') {
            $contents = $this->getSourceFile('resources', '/views/edit_seo', $modelName, $request);//dir: App\\Repositories    |file:  repository.stub

        } else {
            $contents = $this->getSourceFile('resources', '/views/edit', $modelName, $request);//dir: App\\Repositories    |file:  repository.stub

        }

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            Log::channel('custom')->info("File : {$path} created");

        } else {
            Log::channel('custom')->info("File : {$path} already exits");

        }

        $path = base_path('resources\\views\\') . $this->getSingularVariableName($modelName) . '\\create.blade.php';

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile('resources', '/views/create', $modelName, $request);//dir: App\\Repositories    |file:  repository.stub

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            Log::channel('custom')->info("File : {$path} created");

        } else {
            Log::channel('custom')->info("File : {$path} already exits");

        }
    }
}
