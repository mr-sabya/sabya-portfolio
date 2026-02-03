<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ProjectFile;
use Illuminate\Support\Facades\Storage;

class AssetManager extends Component
{
    use WithFileUploads;

    public $project_id;
    public $upload;

    public function saveFile()
    {
        $this->validate(['upload' => 'required|max:10240']); // 10MB

        $path = $this->upload->store('projects/files', 'public');

        ProjectFile::create([
            'project_id' => $this->project_id,
            'file_name' => $this->upload->getClientOriginalName(),
            'file_path' => $path,
            'file_type' => $this->upload->getClientOriginalExtension()
        ]);

        $this->reset('upload');
    }

    public function deleteFile($id)
    {
        $file = ProjectFile::find($id);
        Storage::disk('public')->delete($file->file_path);
        $file->delete();
    }

    public function render()
    {
        return view('livewire.admin.projects.asset-manager', [
            'files' => ProjectFile::where('project_id', $this->project_id)->latest()->get()
        ]);
    }
}
