<div class="form-group">
    <label for="exampleInputEmail1">Name *</label>
    <input type="text" class="form-control" wire:model.defer="name" placeholder="Task title" required>
    @error('name')
    <p class="help-block text-red text-bold">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Description *</label>
    <textarea  class="form-control" wire:model.defer="description" rows="3" placeholder="Task description" required></textarea>
    @error('description')
    <p class="help-block text-red text-bold">{{$message}}</p>
    @enderror
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Start At</label>
            <input type="date" class="form-control datetimepicker" wire:model.defer="startDate" placeholder="Start Date">
            @error('startDate')
            <p class="help-block text-red text-bold">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Start At</label>
            <input type="date" class="form-control datetimepicker" wire:model.defer="deadlineDate" placeholder="Deadline Date">
            @error('deadlineDate')
            <p class="help-block text-red text-bold">{{$message}}</p>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Users</label>
    <div class="form-group">
        <select wire:model.defer="users" class="form-control" multiple>
            @foreach($usersList as $user)
                <option value="{{$user->id}}">{{$user->fullName}}</option>
            @endforeach
        </select>
        @error('users')
        <p class="help-block text-red text-bold">{{$message}}</p>
        @enderror
    </div>

</div>
