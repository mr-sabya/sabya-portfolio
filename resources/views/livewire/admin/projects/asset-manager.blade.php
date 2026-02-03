<div class="row">
    <!-- Upload Section -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">
                <i class="ri-upload-cloud-2-line me-1"></i> Upload New Asset
            </div>
            <div class="card-body">
                <form wire:submit.prevent="saveFile">
                    <div class="mb-3">
                        <label class="form-label small">Select File (Max 10MB)</label>
                        <input type="file" class="form-control" wire:model="upload">

                        <!-- Progress Indicator -->
                        <div wire:loading wire:target="upload" class="mt-2">
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
                            </div>
                            <small class="text-primary">Uploading to server...</small>
                        </div>

                        @error('upload') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="saveFile">Save Document</span>
                        <span wire:loading wire:target="saveFile">Saving...</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="alert alert-info mt-3 small">
            <i class="ri-information-line"></i> Use this section for contracts, design assets, or project documentation that shouldn't be in the public gallery.
        </div>
    </div>

    <!-- Files List -->
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">
                Project Documents
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small">
                        <tr>
                            <th>Type</th>
                            <th>File Name</th>
                            <th>Size</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($files as $file)
                        <tr>
                            <td width="60">
                                @php
                                $icon = match($file->file_type) {
                                'pdf' => 'ri-file-pdf-fill text-danger',
                                'zip', 'rar' => 'ri-file-zip-fill text-warning',
                                'doc', 'docx' => 'ri-file-word-fill text-primary',
                                'xls', 'xlsx' => 'ri-file-excel-fill text-success',
                                'jpg', 'png', 'svg', 'webp' => 'ri-image-fill text-info',
                                default => 'ri-file-line text-secondary'
                                };
                                @endphp
                                <i class="{{ $icon }} fs-3"></i>
                            </td>
                            <td>
                                <div class="fw-bold text-truncate" style="max-width: 250px;">{{ $file->file_name }}</div>
                                <small class="text-muted text-uppercase">{{ $file->file_type }}</small>
                            </td>
                            <td>
                                @php
                                $size = Storage::disk('public')->size($file->file_path);
                                $sizeStr = $size >= 1048576 ? number_format($size / 1048576, 2) . ' MB' : number_format($size / 1024, 2) . ' KB';
                                @endphp
                                <small class="text-muted">{{ $sizeStr }}</small>
                            </td>
                            <td class="text-end">
                                <div class="btn-group">
                                    <a href="{{ asset('storage/'.$file->file_path) }}" target="_blank" class="btn btn-sm btn-light border" title="Download">
                                        <i class="ri-download-2-line"></i>
                                    </a>
                                    <button wire:click="deleteFile({{ $file->id }})" wire:confirm="Delete this file?" class="btn btn-sm btn-light border text-danger" title="Delete">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="ri-file-info-line display-4 opacity-25"></i>
                                <p class="mt-2">No documents uploaded for this project.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>