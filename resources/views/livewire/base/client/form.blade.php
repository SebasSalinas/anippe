<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="exampleInputEmail1">Name *</label>
            <input type="text" class="form-control" wire:model.defer="name" placeholder="Client name" required>
            @error('name')
            <p class="help-block text-red text-bold">{{$message}}</p>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Street</label>
            <input type="text" class="form-control" wire:model.defer="street" placeholder="Street">
            @error('street')
            <p class="help-block text-red text-bold">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Place</label>
            <input type="text" class="form-control" wire:model.defer="place" placeholder="Place">
            @error('place')
            <p class="help-block text-red text-bold">{{$message}}</p>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Postal Code</label>
            <input type="text" class="form-control" wire:model.defer="postalCode" placeholder="Postal Code">
            @error('postal_code')
            <p class="help-block text-red text-bold">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Country</label>
            <div class="form-group">
                <select wire:model.defer="countryId" class="form-control">
                    <option>Select country</option>
                    @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
                @error('countryId')
                <p class="help-block text-red text-bold">{{$message}}</p>
                @enderror
            </div>
        </div>
    </div>
</div>
