<?php

namespace App\Livewire\Admin\About;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\AboutInfo;
use App\Models\MissionVision;
use App\Models\CoreValue;
use Illuminate\Support\Facades\Storage;

class ManageAbout extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    // --- About Info Properties (Single Bio) ---
    public $about_id, $about_title, $about_desc1, $about_desc2;
    public $new_image;      // For new uploads
    public $current_image;  // Path from DB

    // --- Item Properties (Mission/Vision & Core Values) ---
    public $item_id, $item_type; // 'mission' or 'value'
    public $title, $subtitle, $description, $sort_order = 0, $status = true;

    public $search = '';
    public $isEditMode = false;

    public function mount()
    {
        $about = AboutInfo::first();
        if ($about) {
            $this->about_id      = $about->id;
            $this->about_title   = $about->title;
            $this->about_desc1   = $about->description_one;
            $this->about_desc2   = $about->description_two;
            $this->current_image = $about->image;
        }
    }

    // --- Save Bio & Image ---
    public function saveAbout()
    {
        $this->validate([
            'about_title' => 'required|string|max:255',
            'about_desc1' => 'required',
            'about_desc2' => 'required',
            'new_image'   => 'nullable|image|max:2048', // 2MB Max
        ]);

        $data = [
            'title'           => $this->about_title,
            'description_one' => $this->about_desc1,
            'description_two' => $this->about_desc2,
        ];

        if ($this->new_image) {
            if ($this->current_image) {
                Storage::disk('public')->delete($this->current_image);
            }
            $data['image'] = $this->new_image->store('about', 'public');
            $this->current_image = $data['image'];
            $this->new_image = null;
        }

        AboutInfo::updateOrCreate(['id' => $this->about_id], $data);

        $this->dispatch('show-toast', ['message' => 'Bio Updated Successfully!', 'type' => 'success']);
    }

    // --- Shared CRUD Logic for Mission & Values ---
    public function openModal($type, $id = null)
    {
        $this->resetItemFields();
        $this->item_type = $type;
        $this->isEditMode = $id ? true : false;

        if ($id) {
            $model = ($type === 'mission') ? MissionVision::findOrFail($id) : CoreValue::findOrFail($id);
            $this->item_id     = $model->id;
            $this->title       = $model->title;
            $this->description = $model->description;
            $this->status      = $model->status;
            if ($type === 'mission') {
                $this->subtitle = $model->subtitle;
            } else {
                $this->sort_order = $model->sort_order;
            }
        }
    }

    public function saveItem()
    {
        $this->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
        ]);

        $data = [
            'title'       => $this->title,
            'description' => $this->description,
            'status'      => $this->status ? 1 : 0,
        ];

        if ($this->item_type === 'mission') {
            $data['subtitle'] = $this->subtitle;
            MissionVision::updateOrCreate(['id' => $this->item_id], $data);
        } else {
            $data['sort_order'] = $this->sort_order;
            CoreValue::updateOrCreate(['id' => $this->item_id], $data);
        }

        $this->dispatch('show-toast', ['message' => 'Item Saved!', 'type' => 'success']);
        $this->dispatch('close-modal');
    }

    public function deleteItem($type, $id)
    {
        if ($type === 'mission') MissionVision::destroy($id);
        else CoreValue::destroy($id);

        $this->dispatch('show-toast', ['message' => 'Deleted Successfully', 'type' => 'error']);
    }

    private function resetItemFields()
    {
        $this->item_id = null;
        $this->title = '';
        $this->subtitle = '';
        $this->description = '';
        $this->sort_order = 0;
        $this->status = true;
    }

    public function render()
    {
        return view('livewire.admin.about.manage-about', [
            'missions' => MissionVision::where('title', 'like', '%' . $this->search . '%')->get(),
            'values'   => CoreValue::where('title', 'like', '%' . $this->search . '%')->orderBy('sort_order')->get(),
        ]);
    }
}
