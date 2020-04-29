@extends('app')

@section('content')

<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget ">
                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3>Edit Field</h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <form id="edit-profile" method="POST" action="{{ action('FieldsController@update',['id' => $fields->id]) }}" class="form-horizontal">
                                @csrf
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label" for="name">Deck</label>
                                        <div class="controls">
                                            <?php $decks = App\Decks::all();
                                            ?>
                                            <select name="deck_id" id="filter" data-live-search="true" class="selectpicker show-tick show-menu-arrow">
                                                <option value="">Select Deck</option>
                                                @foreach($decks as $deck)
                                                <option value="{{ $deck->id}}" {{ $deck->id == $fields->deck_id ? 'selected' : '' }}>{{ $deck->name }}</option>
                                                @endforeach
                                            </select><!-- /controls -->
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->
                                    <div class="control-group">
                                        <label class="control-label" for="name">Field Name</label>
                                        <div class="controls">
                                            <input type="text" class="span6" name="name" value="{{$fields->name}}" id="name">
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button class="btn">Cancel</button>
                                    </div> <!-- /form-actions -->
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /widget-content -->
    </div> <!-- /widget -->
</div> <!-- /span8 -->

@stop 