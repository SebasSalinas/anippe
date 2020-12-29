@extends('base.settings.layout')

@section('title')
    Settings - General
@stop

@section('settings-content')
    <!-- Horizontal Form -->
    <div class="box box-primary ">
        <div class="box-header with-border">
            <h3 class="box-title">General Settings</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Company Domain</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Main Domain">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Allowed File Types</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="png, jpg, doc">
                    </div>
                </div>
            </div>
            <div class="box-footer text-right">
                <button type="submit" class="btn btn-default"><i class="fa fa-close"></i> Cancel</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
            </div>
        </form>
    </div>@stop

