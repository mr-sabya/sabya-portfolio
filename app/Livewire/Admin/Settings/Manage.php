<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Setting;
use App\Enums\SettingType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Manage extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $isEditMode = false;
    public $settingId;

    public $name, $slug, $group = 'General', $type = 'text', $value, $description, $is_private = false, $options;
    public $image_upload;
    public $url_target_blank = false; // NEW Property for URL Target

    public function updatedName($value)
    {
        if (!$this->isEditMode) $this->slug = Str::slug($value, '_');
    }

    public function updatedType()
    {
        $this->value = null;
        $this->url_target_blank = false;
    }

    public function openModal()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->reset(['name', 'slug', 'group', 'type', 'value', 'description', 'is_private', 'options', 'settingId', 'isEditMode', 'image_upload', 'url_target_blank']);
    }

    public function edit(Setting $setting)
    {
        $this->isEditMode = true;
        $this->settingId = $setting->id;
        $this->name = $setting->name;
        $this->slug = $setting->slug;
        $this->group = $setting->group;
        $this->type = $setting->type->value;
        $this->value = $setting->value;
        $this->description = $setting->description;
        $this->is_private = $setting->is_private;
        $this->options = $setting->options;

        // Check if URL was set to blank
        if ($this->type === 'url') {
            $this->url_target_blank = $setting->options['blank'] ?? false;
        }

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|unique:settings,slug,' . $this->settingId,
            'group' => 'required',
            'type' => 'required',
        ]);

        $optionsData = null;
        if ($this->type === 'select') {
            $optionsData = is_string($this->options) ? json_decode($this->options, true) : $this->options;
        } elseif ($this->type === 'url') {
            $optionsData = ['blank' => $this->url_target_blank];
        }

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'group' => Str::title($this->group),
            'type' => $this->type,
            'description' => $this->description,
            'is_private' => $this->is_private,
            'options' => $optionsData,
        ];

        if ($this->type === 'image' && $this->image_upload) {
            $data['value'] = $this->image_upload->store('settings', 'public');
        } else {
            $data['value'] = $this->value;
        }

        Setting::updateOrCreate(['id' => $this->settingId], $data);

        $this->closeModal();
        $this->dispatch('show-toast', ['message' => 'Setting Saved!', 'type' => 'success']);
    }

    public function delete($id)
    {
        Setting::find($id)->delete();
        $this->dispatch('show-toast', ['message' => 'Setting Deleted.', 'type' => 'info']);
    }

    public function render()
    {
        return view('livewire.admin.settings.manage', [
            'settings' => Setting::orderBy('group')->get(),
            'types' => SettingType::cases()
        ]);
    }
}
