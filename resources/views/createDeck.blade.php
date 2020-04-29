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
                            <h3>Create Deck</h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            <form id="edit-profile" method="POST" action="{{ route('store') }}" class="form-horizontal">
                            @csrf
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label" for="name">Deck Name</label>
                                        <div class="controls">
                                            <input type="text" class="span6" name="name" id="name">
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