@extends('app')

@section('content')
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Cards</h3>
        <a href="{{ action('CardsController@create')}}" type="button" class="btn btn-success">Add</a>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
        @if($cards->count() == 0)
        <h4 class="text-center padding-top-15">Sorry! No records found</h4>
        @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th> Deck Name </th>
                    <th class="td-actions">Action </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($cards as $card)
                <tr>
                    <td class="text-center">{{ $card->deck_name}}</td>
                    <td>
                    <div class="control-group">
                        <div class="controls">
                            <div class="btn-group">
                                <a class="btn btn-primary text-center" href="{{ action('CardsController@show',['id' => $card->id]) }}"><i class=""></i>Preview</a>
                                <!-- <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ action('FieldsController@edit',['id' => $card->id]) }}"><i class="icon-pencil"></i> Rename</a></li>
                                    <li><a href="{{ action('FieldsController@delete',['id' => $card->id]) }}"><i class="icon-trash"></i> Delete</a></li>
                                    <li><a href="#"><i class="icon-ban-circle"></i> Reposition</a></li>
                                </ul>
                    <button class="btn" class="btn ">Preview</button>                  -->

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