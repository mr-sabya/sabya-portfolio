<div class="row">
    <!-- Add Controls -->
    <div class="col-md-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header fw-bold">Add Milestone</div>
            <div class="card-body">
                <input type="text" wire:model="m_title" class="form-control mb-2" placeholder="Milestone Title">
                <input type="date" wire:model="m_due_date" class="form-control mb-2">
                <button wire:click="addMilestone" class="btn btn-primary btn-sm w-100">Add Phase</button>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header fw-bold">Add Task</div>
            <div class="card-body">
                <input type="text" wire:model="t_title" class="form-control mb-2" placeholder="Task Name">
                <select wire:model="t_priority" class="form-select mb-2">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                    <option value="urgent">Urgent</option>
                </select>
                <select wire:model="t_milestone_id" class="form-select mb-2">
                    <option value="">No Milestone</option>
                    @foreach($milestones as $m) <option value="{{ $m->id }}">{{ $m->title }}</option> @endforeach
                </select>
                <button wire:click="addTask" class="btn btn-info btn-sm w-100 text-white">Create Task</button>
            </div>
        </div>
    </div>

    <!-- Task List -->
    <div class="col-md-8">
        @foreach($milestones as $m)
        <div class="card mb-3 border-start border-4 border-primary shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold">{{ $m->title }}</h6>
                <span class="badge bg-light text-dark border">{{ $m->due_date?->format('d M') ?? 'No Date' }}</span>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    @foreach($m->tasks as $task)
                    <tr>
                        <td width="50"><input type="checkbox" wire:click="updateTaskStatus({{ $task->id }}, 'done')" {{ $task->status == 'done' ? 'checked' : '' }}></td>
                        <td class="{{ $task->status == 'done' ? 'text-decoration-line-through text-muted' : '' }}">
                            {{ $task->title }}
                        </td>
                        <td class="text-end">
                            <span class="badge bg-{{ $task->priority == 'urgent' ? 'danger' : 'info' }}">{{ $task->priority }}</span>
                            <button wire:click="deleteTask({{ $task->id }})" class="btn text-danger btn-sm p-0 ms-2"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @endforeach
    </div>
</div>