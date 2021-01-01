<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="exampleInputEmail1">Title *</label>
            <input type="text" class="form-control" wire:model.defer="title" placeholder="Note title" required> @error('title')
            <p class="help-block text-red text-bold">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Content *</label>
            <textarea name="content" wire:model.defer="content" cols="30" class="form-control" rows="10" placeholder="Enter note content" required>
            </textarea> @error('content')
            <p class="help-block text-red text-bold">{{$message}}</p>
            @enderror
        </div>
    </div>
</div>
