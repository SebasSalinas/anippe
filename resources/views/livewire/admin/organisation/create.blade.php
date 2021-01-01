<div>
    <div wire:ignore.self class="modal fade" id="createOrganisationModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Organisation</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-info"></i> Info!</h4>
                            Creating organisation will create default admin account with credentials: <br><br>
                            Email: <b><code> admin@subdomain.com</code> </b><br>
                            Password: <b><code> password</code></b>
                        </div>

                        @include('livewire.admin.organisation.form')
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
