@extends('base.client.layout')

@section('title')
    {{$client->name}} - Contacts
@stop

@section('client-content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Browse Contacts</h3>
            <div class="box-tools pull-right">
                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createContactModal"><i class="fa fa-plus"></i> Add Contact</a>

            </div>
        </div>
        <div class="box-body">
            <table class="table table-striped" id="contacts-table">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <livewire:base.contact.edit/>
    <livewire:base.contact.create :client="$client"/>

@stop

@push('scripts')
    <script>
        $(document).ready(function () {
            var contactsDT = $('#contacts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('base.client.contacts.datatable', $client)}}',
                columns: [
                    {data: 'created', name: 'created'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '50px'}
                ]
            });

            window.addEventListener('formSaved', event => {
                contactsDT.draw();
                $('.modal').modal('hide');
                $('.modal').on('hidden.bs.modal', function () {
                    $(this).find('form')[0].reset();
                    $(this).find('.help-block').hide();
                });
            })


        });
    </script>
@endpush

