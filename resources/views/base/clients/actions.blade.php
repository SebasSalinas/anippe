<div class="btn-group" x-data="{confirm:false}">
    <form action="{{route('base.clients.destroy', $client)}}" method="POST">

        <a href="#" class="btn btn-xs btn-default"><i class="fa fa-edit"></i></a>

        <button @click.prevent="confirm=true" x-show="!confirm" class="btn btn-primary btn-xs">
            <i class="fa fa-trash"></i>
        </button>

        @csrf
        @method('DELETE')
        <button type="submit" href="#" x-show="confirm" class="btn btn-danger btn-xs"><i class="fa fa-check"></i> Sure?</button>
    </form>
</div>
