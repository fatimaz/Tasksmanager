
<!-- Modal -->
<div class="modal fade" id="update_status{{ $task->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Change status</h5>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('update_status') }}" method="post" autocomplete="off">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <p id="currentStatusMessage">
                            @if ($task->status)
                                The task is currently "In Progress". Do you want to change the status?
                            @else
                                The task is "Completed". Do you want to change the status?
                            @endif
                        </p>
                        <label for="status">Status</label>
                       
                        <select class="form-control" id="status" name="status" required>
                            <option value="0" {{ old('status', isset($task) ? $task->status : 0) == 0 ? 'selected' : '' }}>
                                In Progress
                            </option>
                            <option value="1" {{ old('status', isset($task) ? $task->status : 0) == 1 ? 'selected' : '' }}>
                                Completed
                            </option>
                        </select>
                        
                        
                    </div>

                    <input type="hidden" name="id" value="{{ $task->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
