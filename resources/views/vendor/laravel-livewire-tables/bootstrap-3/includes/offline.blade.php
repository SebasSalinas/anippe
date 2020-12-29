@if ($offlineIndicator)
    <div wire:offline.class="d-block" wire:offline.class.remove="hidden" class="alert alert-danger hidden">
        @lang('laravel-livewire-tables::strings.offline')
    </div>
@endif
