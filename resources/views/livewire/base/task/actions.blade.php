<div class="btn-group" x-data="{confirm:false}">

    <form action="{{route('base.tasks.destroy', ['task' => $task])}}" method="POST">
        @csrf
        @method('DELETE')

        <button type="button" onclick="window.livewire.emit('viewTask',  {{$task}});"  data-toggle="modal" data-target="#viewTaskModal" class="btn btn-xs btn-default">
            <i class="fa fa-eye"></i> </button>

        <button type="button" onclick="window.livewire.emit('editTask',  {{$task}});"  data-toggle="modal" data-target="#editClientModal" class="btn btn-xs btn-default">
            <i class="fa fa-edit"></i> </button>

        <button type="button" @click.prevent="confirm=true" x-show="!confirm" class="btn btn-xs btn-danger">
            <i class="fa fa-trash"></i>
        </button>

        <button type="submit" href="#" x-show="confirm" class="btn btn-danger btn-xs">
            <i class="fa fa-check"></i> Sure?
        </button>
    </form>
</div>
