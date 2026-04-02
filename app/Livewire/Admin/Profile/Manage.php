<?php

namespace App\Livewire\Admin\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class Manage extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $bio;
    public $phone;
    public $address;
    public $photo; // For new uploads
    public $current_photo; // To display existing photo

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->bio = $user->bio;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->current_photo = $user->profile_photo;
    }

    public function updateProfile()
    {
        $user = User::find(Auth::id());

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'bio' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:1024', // Max 1MB
        ]);

        if ($this->photo) {
            // Delete old photo if exists
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            // Store new photo
            $validated['profile_photo'] = $this->photo->store('profile-photos', 'public');
        }

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'bio' => $this->bio,
            'phone' => $this->phone,
            'address' => $this->address,
            'profile_photo' => $validated['profile_photo'] ?? $user->profile_photo,
        ]);

        session()->flash('success', 'Profile updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.profile.manage');
    }
}
