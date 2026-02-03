<?php

namespace App\Livewire\Admin\Projects;

use Livewire\Component;
use App\Models\ProjectMilestone;
use App\Models\ProjectTask;

class TaskHub extends Component
{
    public $project_id;

    // Form fields
    public $m_title, $m_due_date;
    public $t_title, $t_priority = 'medium', $t_milestone_id;

    public function addMilestone()
    {
        $this->validate(['m_title' => 'required']);
        ProjectMilestone::create([
            'project_id' => $this->project_id,
            'title' => $this->m_title,
            'due_date' => $this->m_due_date
        ]);
        $this->reset(['m_title', 'm_due_date']);
        $this->dispatch('task-updated'); // Notify parent
    }

    public function addTask()
    {
        $this->validate(['t_title' => 'required']);
        ProjectTask::create([
            'project_id' => $this->project_id,
            'milestone_id' => $this->t_milestone_id ?: null,
            'title' => $this->t_title,
            'priority' => $this->t_priority,
            'status' => 'todo'
        ]);
        $this->reset(['t_title', 't_priority', 't_milestone_id']);
        $this->dispatch('task-updated'); // Notify parent
    }

    public function updateTaskStatus($id, $status)
    {
        ProjectTask::find($id)->update(['status' => $status]);
        $this->dispatch('task-updated'); // Notify parent
    }

    public function deleteTask($id)
    {
        ProjectTask::find($id)->delete();
        $this->dispatch('task-updated'); // Notify parent
    }

    public function render()
    {
        return view('livewire.admin.projects.task-hub', [
            'milestones' => ProjectMilestone::where('project_id', $this->project_id)->with('tasks')->get(),
            'unassigned_tasks' => ProjectTask::where('project_id', $this->project_id)->whereNull('milestone_id')->get()
        ]);
    }
}
