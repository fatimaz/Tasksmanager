<!-- Modal for Task Deletion -->
<div class="modal fade" id="Delete_Task{{ $task->id }}" tabindex="-1" aria-labelledby="DeleteTaskLabel{{ $task->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="DeleteTaskLabel{{ $task->id }}">Delete Task</h5>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="id" value="{{ $task->id }}">
                    <h5>Are you sure you want to delete the task: <strong>{{ $task->name }}</strong>?</h5>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>