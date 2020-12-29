<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;

class NotificationsDropdown extends Component
{
    public $notifications;

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications()->update(['read_at' => now()]);
    }

    public function render()
    {
        $this->notifications = auth()->user()->unreadNotifications()->get();

        return view('livewire.common.notifications-dropdown');
    }
}
