<div class="row">
    <div class="col-lg-6">
        <div class="card shadow-sm mt-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Update Password</h5>
            </div>
            <div class="card-body">

                @if (session('status') === 'password-updated')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Your password has been updated successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form wire:submit="updatePassword">
                    <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input type="password" wire:model="current_password" class="form-control @error('current_password') is-invalid @enderror">
                        @error('current_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" wire:model="password_confirmation" class="form-control">
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-dark" wire:loading.attr="disabled">
                            <span wire:loading wire:target="updatePassword" class="spinner-border spinner-border-sm me-1"></span>
                            Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>