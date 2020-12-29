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
            <livewire:base.contact.table />
        </div>
    </div>



@stop


@push('scripts')
    <script>
        $(document).ready(function () {
            var contactsDT = $('#contacts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('base.client.contacts.datatable', $client)}}',
                columns: [
                    {data: 'position', name: 'position'},
                    {data: 'fullName', name: 'fullName'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'created', name: 'created'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: '50px'}
                ]
            });

            window.addEventListener('saved', event => {
                $("#createContactModal").modal('hide');
                contactsDT.draw();
            })

            //Reset bootstrap modal if values and errors messages exists, but cancal modal is executed.
            $('.modal').on('hidden.bs.modal', function () {
                $(this).find('form')[0].reset();
                $(this).find('.help-block').hide();
            });
        });
    </script>

    <script>

    </script>
@endpush
