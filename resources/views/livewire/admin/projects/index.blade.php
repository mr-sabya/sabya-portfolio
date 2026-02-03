<div>
    <div class="row">
        <div class="col-12 mb-3 d-flex justify-content-between">
            <input wire:model.live="search" type="text" class="form-control w-25" placeholder="Search Projects...">

            <!-- Notice: we dispatch the load-project event here -->
            <a class="btn btn-info" href="{{ route('admin.projects.create') }}" wire:navigate>
                <i class="ri-add-line"></i> Add Project
            </a>
        </div>

        <div class="col-12">
            <div class="card shadow-sm">
                <div class="table-responsive">
                    <table class="table align-middle table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Thumbnail</th>
                                <th>Title & Client</th>
                                <th>Date</th>
                                <th>Tracking</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($projects as $p)
                            <tr>
                                <td><img src="{{ asset('storage/'.$p->thumbnail) }}" width="60" height="40" class="rounded border object-fit-cover"></td>
                                <td>
                                    <div class="fw-bold">{{ $p->title }}</div>
                                    <small class="text-muted">{{ $p->client->name ?? 'No Client' }}</small>
                                </td>
                                <td>{{ $p->project_date->format('M d, Y') }}</td>
                                <td>
                                    @php $colors = ['planned' => 'secondary', 'in-progress' => 'primary', 'completed' => 'success', 'on-hold' => 'warning']; @endphp
                                    <span class="badge rounded-pill bg-{{ $colors[$p->progress] ?? 'dark' }}">{{ ucfirst($p->progress) }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $p->status ? 'success' : 'danger' }}-subtle text-{{ $p->status ? 'success' : 'danger' }} border border-{{ $p->status ? 'success' : 'danger' }}">
                                        {{ $p->status ? 'Active' : 'Hidden' }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <button wire:click="$dispatchTo('admin.projects.manage', 'load-project', { id: {{ $p->id }} })"
                                        data-bs-toggle="modal" data-bs-target="#projectModal"
                                        class="btn btn-sm btn-soft-primary me-1">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button wire:confirm="Are you sure?" wire:click="delete({{ $p->id }})" class="btn btn-sm btn-soft-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="avatar-lg mx-auto mb-3">
                                        <div class="avatar-title bg-light text-primary rounded-circle display-5">
                                            <i class="ri-folder-open-line"></i>
                                        </div>
                                    </div>
                                    <h5 class="text-muted">No Projects Found</h5>
                                    <p class="text-muted mb-0">Try adjusting your search or add a new project to get started.</p>
                                    <a class="btn btn-primary btn-sm mt-3" href="{{ route('admin.projects.create') }}" wire:navigate>
                                        <i class="ri-add-line align-bottom"></i> Add Your First Project
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>