<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="email" class="form-control" wire:model.defer="firstName" placeholder="Enter first name">
            @error('firstName')
            <p class="help-block text-red text-bold">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="email" class="form-control" wire:model.defer="lastName" placeholder="Enter last name"> @error('lastName')
            <p class="help-block text-red text-bold">{{$message}}</p>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" wire:model.defer="email" placeholder="Enter email"> @error('email')
            <p class="help-block text-red text-bold">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" class="form-control" wire:model.defer="phone" placeholder="Enter phone"> @error('phone')
            <p class="help-block text-red text-bold">{{$message}}</p>
            @enderror
        </div>
    </div>
</div>
