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
                            <form id="edit-profile" method="POST" action="{{ route('store_deck') }}" class="form-horizontal">
                                @csrf
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label" for="name">Deck Name</label>
                                        <div class="controls">
                                            <input type="text" class="span6" name="name" id="name">

                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    <div class="control-group">
                                        <label class="control-label">Progress Bar</label>
                                        <div class="controls">
                                            <!-- Button to trigger modal -->
                                            <!-- <a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a> -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="de">
                                                Launch demo modal
                                            </button>
                                            <!-- Modal -->

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

@section('footer_scripts')
<script type="text/javascript">
    $(document).ready(function() {
        // This WILL work because we are listening on the 'document', 
        // for a click on an element with an ID of #test-element


        // // This will NOT work because there is no '#test-element' ... yet
        // $("#test-element").on("click",function() {
        //     alert("click bound directly to #test-element");
        // });

        // // Create the dynamic element '#test-element'
        // $('body').append('<div id="test-element">Click mee</div>');
    });
    // $(document).on("click", "#de", function(e) {
    //     e.preventDefault();
    //     alert();
    //     $("#myModal").modal("show");
    // });
</script>
@stop 