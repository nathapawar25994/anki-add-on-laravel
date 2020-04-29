@extends('app')

@section('content')
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Fields</h3>
        <a href="{{ action('FieldsController@create')}}" type="button" class="btn btn-success">Add</a>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
        @if($fields->count() == 0)
        <h4 class="text-center padding-top-15">Sorry! No records found</h4>
        @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Field Name </th>
                    <th> Deck Name </th>
                    <th class="td-actions">Action </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($fields as $field)
                <tr>
                    <td class="text-center">{{ $field->name}}</td>
                    <td class="text-center">{{ $field->deck_name}}</td>
                    <td>
                    <div class="control-group">
                        <div class="controls">
                            <div class="btn-group">
                                <a class="btn btn-primary text-center" href="#"><i class="icon-cog icon-white"></i></a>
                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ action('FieldsController@edit',['id' => $field->id]) }}"><i class="icon-pencil"></i> Rename</a></li>
                                    <li><a href="{{ action('FieldsController@delete',['id' => $field->id]) }}"><i class="icon-trash"></i> Delete</a></li>
                                    <li><a href="#"><i class="icon-ban-circle"></i> Reposition</a></li>
                                </ul>
                            </div>
                        </div> <!-- /controls -->
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    <!-- /widget-content -->
</div>
@stop 