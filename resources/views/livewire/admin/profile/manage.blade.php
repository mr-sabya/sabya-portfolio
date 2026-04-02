<div class="container py-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-sm">
                <div class="card-header bg-primary ">
                    <h5 class="mb-0 text-white">Manage Admin Profile</h5>
                </div>
                <div class="card-body">

                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form wire:submit="updateProfile">
                        <div class="row mb-4 text-center">
                            <div class="col-12">
                                <!-- Profile Photo Preview -->
                                @if ($photo)
                                <img src="{{ $photo->temporaryUrl() }}" class="rounded-circle img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                                @elseif($current_photo)
                                <img src="{{ asset('storage/' . $current_photo) }}" class="rounded-circle img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                                @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($name) }}" class="rounded-circle img-thumbnail" style="width: 150px;">
                                @endif

                                <div class="mt-3">
                                    <label class="form-label d-block">Profile Photo</label>
                                    <input type="file" wire:model="photo" class="form-control @error('photo') is-invalid @enderror">
                                    <div wire:loading wire:target="photo" class="text-primary mt-1 small">Uploading...</div>
                                    @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror">
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" wire:model="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="+123456789">
                                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Address</label>
                                <input type="text" wire:model="address" class="form-control @error('address') is-invalid @enderror">
                                @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Bio</label>
                                <textarea wire:model="bio" class="form-control @error('bio') is-invalid @enderror" rows="3"></textarea>
                                @error('bio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                <span wire:loading wire:target="updateProfile" class="spinner-border spinner-border-sm me-1"></span>
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>