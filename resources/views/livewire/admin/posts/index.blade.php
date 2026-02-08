<div>
    <div class="row">
        <!-- Header Actions -->
        <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
            <div class="search-box w-25">
                <input wire:model.live="search" type="text" class="form-control" placeholder="Search posts by title...">
            </div>

            <a class="btn btn-primary" href="{{ route('admin.posts.create') }}" wire:navigate>
                <i class="fas fa-plus-circle me-1"></i> Add New Post
            </a>
        </div>

        <!-- Posts Table -->
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="table-responsive">
                    <table class="table align-middle table-hover mb-0">
                        <thead class="table-light text-muted uppercase small font-weight-bold">
                            <tr>
                                <th style="width: 80px;">Cover</th>
                                <th>Title & Author</th>
                                <th>Published Date</th>
                                <th>Blocks</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                            <tr>
                                <!-- Thumbnail -->
                                <td>
                                    @if($post->thumbnail)
                                    <img src="{{ asset('storage/'.$post->thumbnail) }}" width="60" height="40" class="rounded border object-fit-cover shadow-sm">
                                    @else
                                    <div class="bg-light rounded border text-center text-muted" style="width: 60px; height: 40px; line-height: 40px;">
                                        <i class="fas fa-image"></i>
                                    </div>
                                    @endif
                                </td>

                                <!-- Title & Author -->
                                <td>
                                    <div class="fw-bold text-dark">{{ $post->title }}</div>
                                    <small class="text-muted">
                                        <i class="fas fa-user-edit small me-1"></i> {{ $post->user->name ?? 'Unknown Author' }}
                                    </small>
                                </td>

                                <!-- Date -->
                                <td>
                                    <div class="small">{{ $post->created_at->format('M d, Y') }}</div>
                                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                </td>

                                <!-- Dynamic Content Count -->
                                <td>
                                    <span class="badge bg-info-subtle text-info border border-info">
                                        {{ $post->contents->count() }} Content Blocks
                                    </span>
                                </td>

                                <!-- Status Badge -->
                                <td>
                                    @if($post->status)
                                    <span class="badge bg-success-subtle text-success border border-success px-2 py-1">
                                        <i class="fas fa-check-circle me-1"></i> Published
                                    </span>
                                    @else
                                    <span class="badge bg-warning-subtle text-warning border border-warning px-2 py-1">
                                        <i class="fas fa-pencil-alt me-1"></i> Draft
                                    </span>
                                    @endif
                                </td>

                                <!-- Actions -->
                                <td class="text-end">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.posts.edit', $post->id) }}" wire:navigate
                                            class="btn btn-sm btn-outline-primary me-1 rounded shadow-sm" title="Edit Post">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button wire:confirm="Are you sure? All dynamic blocks will be deleted."
                                            wire:click="delete({{ $post->id }})"
                                            class="btn btn-sm btn-outline-danger rounded shadow-sm" title="Delete Post">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="mb-3">
                                        <i class="fas fa-file-alt text-light display-1"></i>
                                    </div>
                                    <h5 class="text-muted">No Blog Posts Found</h5>
                                    <p class="text-muted mb-3 small">Get started by creating your first dynamic blog entry.</p>
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.posts.create') }}" wire:navigate>
                                        <i class="fas fa-plus me-1"></i> Write Your First Post
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Footer -->
                @if($posts->hasPages())
                <div class="card-footer bg-white border-0 py-3">
                    {{ $posts->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>