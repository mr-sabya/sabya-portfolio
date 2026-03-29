<div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold"><i class="bi bi-gear-wide-connected me-2 text-primary"></i>Global Configuration</h4>
        <button class="btn btn-primary shadow-sm" wire:click="openModal"><i class="bi bi-plus-lg me-1"></i> Add New Setting</button>
    </div>

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Setting Name</th>
                        <th>Slug / Key</th>
                        <th>Group</th>
                        <th>Preview Value</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($settings as $setting)
                    <tr>
                        <td class="ps-4">
                            <span class="fw-bold d-block text-dark">{{ $setting->name }}</span>
                            <small class="text-muted">{{ Str::limit($setting->description, 50) }}</small>
                        </td>
                        <td><code>setting('{{ $setting->slug }}')</code></td>
                        <td><span class="badge bg-soft-info text-info">{{ $setting->group }}</span></td>
                        <td>
                            @if($setting->is_private)
                            <span class="badge bg-light text-dark border"><i class="bi bi-lock-fill me-1"></i> Private</span>
                            @elseif($setting->type->value === 'image')
                            <img src="{{ asset('storage/'.$setting->value) }}" class="rounded border" style="width: 35px; height: 35px; object-fit: cover;">
                            @elseif($setting->type->value === 'color')
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle border me-2" style="width: 18px; height: 18px; background:{{ $setting->value }}"></div><small>{{ $setting->value }}</small>
                            </div>
                            @elseif($setting->type->value === 'boolean')
                            <span class="badge {{ $setting->value ? 'bg-success' : 'bg-danger' }}">{{ $setting->value ? 'ON' : 'OFF' }}</span>
                            @elseif($setting->type->value === 'url')
                            <div class="d-flex align-items-center">
                                <a href="{{ $setting->value }}" target="_blank" class="text-truncate me-2" style="max-width: 150px;">{{ $setting->value }}</a>
                                @if($setting->options['blank'] ?? false)
                                <span class="badge bg-soft-dark text-dark border" style="font-size: 0.6rem;">NEW TAB</span>
                                @endif
                            </div>
                            @else
                            <span class="text-truncate d-inline-block" style="max-width: 150px;">{{ $setting->value }}</span>
                            @endif
                        </td>
                        <td class="text-end pe-4">
                            <button class="btn btn-sm btn-outline-primary me-1" wire:click="edit({{ $setting->id }})"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger" onclick="confirm('Delete this setting?') || event.stopImmediatePropagation()" wire:click="delete({{ $setting->id }})"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- CREATE / EDIT MODAL -->
    @if($showModal)
    <div class="modal fade show d-block" style="background: rgba(0,0,0,0.6);" tabindex="-1">
        <div class="modal-dialog modal-lg border-0 shadow-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary p-3 border-0">
                    <h5 class="modal-title fw-bold text-white"><i class="bi bi-magic me-2"></i>{{ $isEditMode ? 'Edit' : 'New' }} Setting Field</h5>
                    <button type="button" class="btn-close btn-close-white" wire:click="closeModal"></button>
                </div>
                <form wire:submit.prevent="save">
                    <div class="modal-body p-4 bg-light-subtle">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Display Name</label>
                                <input type="text" class="form-control" wire:model.live="name" placeholder="e.g. Website Logo">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-muted">Auto-Generated Slug</label>
                                <input type="text" class="form-control bg-light" wire:model="slug" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Group / Category</label>
                                <input type="text" class="form-control" wire:model="group" placeholder="e.g. Social, SEO, Branding">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Input Type</label>
                                <select class="form-select" wire:model.live="type">
                                    @foreach($types as $t) <option value="{{ $t->value }}">{{ $t->label() }}</option> @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-bold text-primary">Value Content</label>
                                @switch($type)
                                @case('image')
                                <input type="file" class="form-control" wire:model="image_upload">
                                <div wire:loading wire:target="image_upload" class="text-primary small mt-1">Uploading...</div>
                                @if($image_upload) <img src="{{ $image_upload->temporaryUrl() }}" class="mt-2 rounded border" height="60">
                                @elseif($value) <img src="{{ asset('storage/'.$value) }}" class="mt-2 rounded border" height="60"> @endif
                                @break
                                @case('textarea') <textarea class="form-control" wire:model="value" rows="3"></textarea> @break
                                @case('color') <input type="color" class="form-control h-auto" wire:model="value"> @break
                                @case('boolean')
                                <div class="form-check form-switch"><input class="form-check-input" type="checkbox" wire:model="value" value="1"><label class="form-check-label">Enable by default</label></div>
                                @break
                                @case('select')
                                <div class="mb-2"><label class="small text-muted">Current Value:</label><input type="text" class="form-control" wire:model="value"></div>
                                <label class="small text-muted">Options JSON (e.g. {"en":"English", "bn":"Bangla"}):</label>
                                <textarea class="form-control" wire:model="options" rows="2"></textarea>
                                @case('url')
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-link-45deg"></i></span>
                                    <input type="url" class="form-control" wire:model="value" placeholder="https://example.com">
                                </div>
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" id="targetBlank" wire:model="url_target_blank">
                                    <label class="form-check-label small fw-bold" for="targetBlank">Open in new tab? (target="_blank")</label>
                                </div>
                                @break
                                @case('email')
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" class="form-control" wire:model="value" placeholder="email@example.com">
                                </div>
                                @break
                                @default <input type="{{ $type }}" class="form-control" wire:model="value">
                                @endswitch
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-bold">Help Text / Description</label>
                                <input type="text" class="form-control" wire:model="description">
                            </div>
                            <div class="col-md-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="isp" wire:model="is_private">
                                    <label class="form-check-label fw-bold" for="isp">Private / Sensitive Field (Masked in list)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 p-3 bg-light">
                        <button type="button" class="btn btn-secondary px-4" wire:click="closeModal">Cancel</button>
                        <button type="submit" class="btn btn-primary px-5 fw-bold">
                            <span wire:loading wire:target="save" class="spinner-border spinner-border-sm me-1"></span>
                            Save Configuration
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>