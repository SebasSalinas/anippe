<?php
/**
 * Project: anippe
 * File: WithDispatchBrowserEvents.php
 * Author: Luka
 * Date: 01.01.2021
 * Time: 10:51
 */

namespace App\Http\Livewire;


trait WithDispatchBrowserEvents
{
    /**
     * @param $modal
     * @param null $message
     * @param $severity
     */
    public function dispatchSaved($modal, $message = null, $severity = null)
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();

        $this->dispatchBrowserEvent('formSaved', $modal);
        $this->dispatchFlashMessage($message, $severity);
    }

    /**
     * @param $message
     * @param null $severity
     */
    protected function dispatchFlashMessage($message = null, $severity = null): void
    {
        $this->dispatchBrowserEvent('flashMessage', [
            'severity' => $severity,
            'message' => $message
        ]);
    }
}
