<div>
    <div wire:ignore.self class="modal fade" id="createTaskModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Task</h4>
                    </div>
                    <div class="modal-body">
                        @include('livewire.base.task.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <i class="fa fa-close"></i> Close
                        </button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
