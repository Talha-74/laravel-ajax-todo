{{-- Add Task Modal --}}
<div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add Task</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3" style="position: relative;">
                        <label class="control-label mb-2" for="title">Title <code>*</code></label>
                        <input type="text" class="form-control rounded-2" name="title" id="title"
                            placeholder="task title" required>
                        {{-- <i class="bi bi-list-check"
                            style="position: absolute; top:37px; right:10px; font-size:24px;"></i> --}}
                    </div>
                    <div class="form-group mt-2">
                        <label class="control-label mb-2" for="description">Description <code>*</code></label>
                        <textarea type="text" class="form-control rounded-2" name="description" id="description"
                            placeholder="Task Description" required></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label class="control-label mb-2" for="due_date">Due Date <code>*</code></label>
                        <input type="date" class="form-control rounded-2" name="due_date" id="due_date"
                            placeholder="Due Date" required>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="reset" class="btn btn-warning">
                <button class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
