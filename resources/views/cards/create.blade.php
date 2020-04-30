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
                            <h3>Add Card</h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                            @if($errors->any())
                            <h4>{{$errors->first()}}</h4>
                            @endif
                            <form id="edit-profile" method="POST" action="{{ route('store_card') }}" class="form-horizontal">
                                @csrf
                                <fieldset>
                                    <!-- <div class="row"> -->
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
                                            <!-- <a href="{{ route('create_cards')}}" type="button" class="btn btn-primary">Cards...</a> -->
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->
                                    <div class="control-group">
                                        <label class="control-label" for="name">Select Field for front</label>
                                        <div class="controls">
                                            <select name="field_id" id="field_id" data-live-search="true" class="selectpicker show-tick show-menu-arrow">
                                            </select><!-- /controls -->
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->
                                    <div class="control-group">
                                        <label class="control-label" for="name">Font-Family</label>
                                        <div class="controls">
                                            <input type="text" class="span6" placeholder="arial" name="font_family" id="font_family">
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->
                                    <div class="control-group">
                                        <label class="control-label" for="font_size">Font-size</label>
                                        <div class="controls">
                                            <input type="text" class="span6" placeholder="20" name="font_size" id="font_size">
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->
                                    <div class="control-group">
                                        <label class="control-label" for="text_align">Text-align</label>
                                        <div class="controls">
                                            <input type="text" class="span6" placeholder="center" name="text_align" id="text_align">
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->
                                    <div class="control-group">
                                        <label class="control-label" for="color">Color</label>
                                        <div class="controls">
                                            <input type="text" class="span6" placeholder="black" name="color" id="color">
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->
                                    <div class="control-group">
                                        <label class="control-label" for="background_color">Background-color</label>
                                        <div class="controls">
                                            <input type="text" class="span6" placeholder="white" name="background_color" id="background_color">
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->
                                    <!-- </div> -->
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
</div>
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
                url: '{{ url("cards/get_fields")}}',
                type: "POST",
                data: {
                    'deck_id': deck_id
                }
            })
            .done(function(data) {

                var response = JSON.parse(data);
                console.log(response);
                $('#field_id').find('option').remove().end();
                for (var i = 0; i < response.length; i++) {
                    var option = $('<option></option>').text(response[i].name).val(response[i].id);
                    $('#field_id').append(option);
                }
                $('#field_id').show().closest('div').find('.bootstrap-select').hide();

            });

        $('#deck_id').on('change', function() {
            var deck_id = $(this).val();
            //alert(category_id);
            $.ajax({
                    url: '{{ url("cards/get_fields")}}',
                    type: "POST",
                    data: {
                        'deck_id': deck_id
                    }
                })
                .done(function(data) {

                    var response = JSON.parse(data);
                    console.log(response);
                    $('#field_id').find('option').remove().end();
                    for (var i = 0; i < response.length; i++) {
                        var option = $('<option></option>').text(response[i].name).val(response[i].id);
                        $('#field_id').append(option);
                    }
                    $('#field_id').show().closest('div').find('.bootstrap-select').hide();

                });
        });
    });
</script>
@stop 