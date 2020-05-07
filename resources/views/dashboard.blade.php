@extends('app')

@section('content')
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Decks</h3>
        <a href="{{ action('HomeController@create')}}" type="button" class="btn btn-success">Add</a>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
        @if($decks->count() == 0)
        <h4 class="text-center padding-top-15">Sorry! No records found</h4>
        @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th> Name </th>
                    <th> Due </th>
                    <th> New </th>
                    <th class="td-actions">Action </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($decks as $deck)
                <tr>
                    <td class="text-center"> <a class="text-center" href="{{ action('HomeController@startStudy',['id' => $deck->id]) }}">{{ $deck->name}}</a></td>
                    <td class="text-center">{{ $deck->learn_count}}</td>
                    <td class="text-center">{{ $deck->rem_count}}</td>
                    <td>
                        <div class="control-group">
                            <div class="controls">
                                <div class="btn-group">
                                    <a class="btn btn-primary text-center" href="#"><i class="icon-cog icon-white"></i></a>
                                    <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ action('HomeController@edit',['id' => $deck->id]) }}"><i class="icon-pencil"></i> Rename</a></li>
                                        <li><a href="{{ action('HomeController@delete',['id' => $deck->id]) }}"><i class="icon-trash"></i> Delete</a></li>
                                        <li><a href="#"><i class="icon-ban-circle"></i> Export</a></li>
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