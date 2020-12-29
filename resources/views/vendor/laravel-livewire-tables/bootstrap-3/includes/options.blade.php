@if ($paginationEnabled || $searchEnabled)
    <div class="row" style="margin-bottom:20px;">
        @if ($paginationEnabled && count($perPageOptions))
            <div class="col-md-1 form-inline">
                <select wire:model="perPage" class="form-control">
                    @foreach ($perPageOptions as $option)
                        <option>{{ $option }}</option>
                    @endforeach
                </select>
            </div><!--col-->
        @endif

        @if ($searchEnabled)
            <div class="col-md-10 ">
                @if ($clearSearchButton)
                    <div class="input-group">
                        @endif
                        <input
                            @if (is_numeric($searchDebounce) && $searchUpdateMethod === 'debounce') wire:model.debounce.{{ $searchDebounce }}ms="search" @endif
                            @if ($searchUpdateMethod === 'lazy') wire:model.lazy="search" @endif
                            @if ($disableSearchOnLoading) wire:loading.attr="disabled" @endif
                            class="form-control"
                            type="text"
                            placeholder="{{ __('laravel-livewire-tables::strings.search') }}"
                        />
                        @if ($clearSearchButton)
                            <div class="input-group-append">
                                <button class="btn btn-default" type="button" wire:click="clearSearch">@lang('laravel-livewire-tables::strings.clear')</button>
                            </div>
                    </div>
                @endif
            </div>
        @endif

        <div class="col-md-1 text-right">
            @include('laravel-livewire-tables::'.config('laravel-livewire-tables.theme').'.includes.export')
        </div>
    </div>
@endif
