<div class="btn-group" x-data="{confirm:false}">

    <form action="{{route('admin.organisations.destroy', ['organisation' => $organisation])}}" method="POST">
        @csrf
        @method('DELETE')

        <button type="button" onclick="window.livewire.emit('editOrganisation',  {{$organisation}});"  data-toggle="modal" data-target="#editOrganisationModal" class="btn btn-xs btn-default">
            <i class="fa fa-edit"></i> </button>

        <button type="button" @click.prevent="confirm=true" x-show="!confirm" class="btn btn-xs btn-danger">
            <i class="fa fa-trash"></i>
        </button>

        <button type="submit" href="#" x-show="confirm" class="btn btn-danger btn-xs">
            <i class="fa fa-check"></i> Sure?
        </button>
    </form>
</div>
