@extends('app')

@section('content')
<div class="widget widget-table action-table">
    <!-- /widget-header -->
    <div class="widget-content">
        @if($card_types->count() == 0)
        <h4 class="text-center padding-top-15">Sorry! No records found</h4>
        @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th> Name </th>
                    <th> Study </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($card_types as $card_type)
                <tr>
                    <td class="text-center">{{ $card_type->name}}</td>
                    <td> <a class="btn btn-warning text-center" href="{{ action('HomeController@startStudyFromCardType',['id' => $card_type->id]) }}">Study Now</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    <!-- /widget-content -->
</div>
@stop 