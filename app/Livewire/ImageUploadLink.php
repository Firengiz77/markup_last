<?php

namespace App\Livewire;

use App\Models\EmailTemplateImage;
use App\Models\Utility;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUploadLink extends Component
{
    use WithFileUploads;
    public $photo;

    public $id;
    public function mount($emailTemplate)
    {
        $this->id = $emailTemplate->id;
    }

    public function render()
    {
        $images= EmailTemplateImage::where('parent_id', $this->id)->get();
        return view('livewire.image-upload-link', compact('images'));
    }

    public function delete($id)
    {
       $image= EmailTemplateImage::find($id);

        $filePath ='app/email_template_image/'. substr(strrchr($image->image, '/'), 1);

        Utility::deleteFile($filePath);
        $image->delete();

    }
    public function save()
    {


        $name = md5($this->photo . microtime()).'.'.$this->photo->extension();
        $this->photo->storeAs('email_template_image', $name);
        $image= new EmailTemplateImage();
        $image->parent_id = $this->id;
        $image->image = \App\Models\Utility::get_file('app/email_template_image/').$name;
        $image->save();

        session()->flash('message', 'The photo is successfully uploaded!');
    }
}
