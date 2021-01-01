<?php

namespace App\Http\Livewire\Base\Contact;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Table extends TableComponent
{
    use HtmlComponents;

    protected $options = [
        // The class set on the table when using bootstrap
        'bootstrap.classes.table' => 'table table-striped',

        // The class set on the table's thead when using bootstrap
        'bootstrap.classes.thead' => null,

        // The class set on the table's export dropdown button
        'bootstrap.classes.buttons.export' => 'btn btn-default',

        // Whether or not the table is wrapped in a `.container-fluid` or not
        'bootstrap.container' => false,

        // Whether or not the table is wrapped in a `.table-responsive` or not
        'bootstrap.responsive' => true,
    ];

    public $exports = ['csv','xls','xlsx','pdf'];

    public $sortDefaultIcon = '<i class="text-muted fa fa-sort"></i>';

    public $ascSortIcon = '<i class="fa fa-sort-up"></i>';

    public $descSortIcon = '<i class="fa fa-sort-down"></i>';

    public $paginationTheme = 'bootstrap';

    public function query(): Builder
    {
        return Contact::query();
    }

    public function columns(): array
    {
        return [
            Column::make('ID')
                ->searchable()
                ->sortable(),
            Column::make('E-mail', 'email')
                ->searchable()
                ->sortable()
                ->format(function (Contact $model) {
                    return $this->mailto($model->email, null, ['target' => '_blank']);
                }),
            Column::make('Actions')
                ->format(function (Contact $model) {
                    return view('livewire.base.contact.actions', [
                        'model' => $model
                    ]);
                })
            ,
        ];
    }
}
