@extends('app')

@section('content')

<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3>Add</h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            @if($errors->any())
                            <h4>{{$errors->first()}}</h4>
                            @endif
                            <form id="edit-profile" method="POST" action="{{ route('store_addField_form') }}" class="form-horizontal">
                                @csrf
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label" for="name">Deck</label>
                                        <div class="controls">
                                            <?php $decks = App\Decks::all();
                                            ?>
                                            <select name="deck_id" id="deck_id" data-live-search="true" class="selectpicker show-tick show-menu-arrow">
                                                <option value="">Select Deck</option>
                                                @foreach($decks as $deck)
                                                <option value="{{ $deck->id}}">{{ $deck->name }}</option>
                                                @endforeach
                                            </select><!-- /controls -->
                                            <a href="{{ route('field_list') }}" type="button" class="btn btn-success">Fields...</a>
                                            <a href="{{ action('HomeController@create')}}" type="button" class="btn btn-primary">Cards...</a>

                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->


                                    <div class="control-group controls" id="mydiv">

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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var deck_id = $('#deck_id').val();
        //alert(category_id);
        $.ajax({
                url: '{{ url("home/get_fields")}}',
                type: "POST",
                data: {
                    'deck_id': deck_id
                }
            })
            .done(function(data) {

                var response = JSON.parse(data);
                console.log(response);
                $('#sub_category_id').find('option').remove().end();
                for (var i = 0; i < response.length; i++) {
                    var option = $('<option></option>').text(response[i].sub_category_name).val(response[i].id);
                    $('#sub_category_id').append(option);
                }
                $('#sub_category_id').show().closest('div').find('.bootstrap-select').hide();

            });

        $('#deck_id').on('change', function() {
            var deck_id = $(this).val();
            //alert(category_id);
            $.ajax({
                    url: '{{ url("home/get_fields")}}',
                    type: "POST",
                    data: {
                        'deck_id': deck_id
                    }
                })
                .done(function(data) {

                    var response = JSON.parse(data);
                    console.log(response);
                    // $('#sub_category_id').find('option').remove().end();
                    $('#mydiv').empty();
                    var fieldSet = $("<fieldset id=\"yourform\"><legend>Your Form</legend></fieldset>");

                    for (var i = 0; i < response.length; i++) {
                        // var id = "input" + response.id);
                        //console.log(response[i].name);
                        var label = $("<label  for=\"" + response[i].name + "\">" + response[i].name + "</label>");
                        var input = $("<input type=\"text\" class=\"span6\" id=\"" + response[i].id + "\" name=\"" + response[i].id + "\" />");
                        // $('#sub_category_id').append(option);
                        $('#mydiv').append(label, input);
                    }
                    // $('#sub_category_id').show().closest('div').find('.bootstrap-select').hide();


                });
        });
    });
</script>
@stop 