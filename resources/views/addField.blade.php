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

                                    <?php $decks = App\Decks::find(20);
                                    ?>
                                    <div class="control-group">
                                        <label class="control-label" for="name"><strong>Deck Name</strong></label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="deck_name" id="deck_id1" value="{{$decks->name}}" readonly></input>
                                            <input type="hidden" class="span10" name="deck_id" id="deck_id" value="{{$decks->id}}">

                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->


                                    <?php $fields = App\Fields::select('name', 'id')->where('deck_id', 20)->get();
                                    // print_r($fields);die;
                                    ?>
                                    @foreach($fields as $field)

                                    @if($field->id==8)
                                    <div class="control-group">
                                        <label class="control-label" for="name"><strong>Images</strong></label>
                                        <div class="controls" id="picHolder" contentEditable="true">

                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->
                                    @else
                                    <div class="control-group">
                                        <label class="control-label" for="name"><strong>{{$field->name}}</strong></label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="{{$field->id}}" id="{{$field->id}}">
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->
                                    @endif
                                    @endforeach

                                    <div class="control-group">
                                        <label class="control-label" for="name">[X] Activate New Word Card (insert 'x' to activate)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="active_word_card" id="name1">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">[X] Activate Word-sentence Card (insert 'x' to activate)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="active_word_sentence_card" id="active_word_sentence_card">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">[X] Activate Picture-word Card (insert 'x' to activate)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="active_picture_word_card" id="active_picture_word_card">
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="name">[X] Activate Listening/Reading Card (insert 'x' to activate)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="active_listening_reading_card" id="active_listening_reading_card">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">Word-Translation</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="active_word_translation_card" id="active_word_translation_card">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">Sentence-Translation</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="active_sentence_translation_card" id="active_sentence_translation_card">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">Sentence-Translation</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="active_sentence_translation_card" id="active_sentence_translation_card">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">Extra Card 1 Instructions  (Front, large white text)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="extra_card1_instruction" id="extra_card1_instruction">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">Extra Card 1 (Front, Sentence with a __)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="extra_card1_front" id="extra_card1_front">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">Extra Card 1 Answer(Back, Yellow Text)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="extra_card1_back" id="extra_card1_back">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">Extra Card 2 Instructions  (Front, large white text)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="extra_card2_instruction" id="extra_card2_instruction">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">Extra Card 2 (Front, Sentence with a __)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="extra_card2_front" id="extra_card2_front">
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="name">Extra Card 2 Answer(Back, Yellow Text)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="extra_card2_back" id="extra_card2_back">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">Extra Card 3 Instructions  (Front, large white text)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="extra_card3_instruction" id="extra_card3_instruction">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">Extra Card 3 (Front, Sentence with a __)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="extra_card3_front" id="extra_card3_front">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">Extra Card 3 Answer(Back, Yellow Text)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="extra_card3_back" id="extra_card3_back">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">Extra Card 4 Instructions  (Front, large white text)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="extra_card4_instruction" id="extra_card4_instruction">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">Extra Card 4 (Front, Sentence with a __)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="extra_card4_front" id="extra_card4_front">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">Extra Card 4 Answer(Back, Yellow Text)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="extra_card4_back" id="extra_card4_back">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">[X] Activate Inflected Form Card (insert 'x' to activate)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="active_inflected_form_card" id="active_inflected_form_card">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">[X] Activate Pronunciation Card (insert 'x' to activate)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="active_pronunciation_card" id="active_pronunciation_card">
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="name">[X] Activate Spelling Card (insert 'x' to activate)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="active_spelling_card" id="active_spelling_card">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">[X] Activate Translation-word Card (insert 'x' to activate)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="active_translation_word_card" id="active_translation_word_card">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">[X] Activate Sentence-Translation-Sentence Card (insert 'x' to activate)</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="active_translation_sentence_card" id="active_translation_sentence_card">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="name">Sort Order</label>
                                        <div class="controls">
                                            <input type="text" class="span10" name="sort_order" id="sort_order">
                                        </div>
                                    </div>


                                    <!-- <div id="picHolder" contentEditable="true"></div>
                                    <input type="hidden" name="ticketFileAttahmentName" id="ticketFileAttahmentName" value=""> <br> -->

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

        $('#4').change(function() {
            var search = $('#4').val();

            $.ajax({
                    url: '{{ url("home/get_word")}}',
                    type: "POST",
                    data: {
                        'search': search
                    }
                })
                .done(function(data) {

                    var response = data;
                    console.log(response);
                    $('#7').val(response);
                });

            $.ajax({
                    url: '{{ url("home/get_PronCodes")}}',
                    type: "POST",
                    data: {
                        'search': search
                    }
                })
                .done(function(data) {

                    var response = data;
                    console.log(response);
                    $('#5').val(response);
                });
            $.ajax({
                    url: '{{ url("home/get_image")}}',
                    type: "POST",
                    data: {
                        'search': search
                    }
                })
                .done(function(data) {
                    var response = JSON.parse(data);
                    console.log(response);
                    $('#picHolder').empty();
                    for (i = 0; i < response.length; i++) {
                        // var file = ticketFileAttahmentName1[i];
                        //  alert(response['i']);
                        var src = response[i].link;
                        var pic = $('<img  name=\'pic' + i + '\' class="picNameId" style="height: 100px; width: 100px; padding-right: 20px; display: ;">');

                        pic.attr('src', src);
                        $('#picHolder').append(pic);
                        var style = 'height: 100px; width: 100px; padding-right: 20px;';
                        var src1 =' <img src = \''+src+'\' style =\'' +style+'\' >';
                  
                            $('#picHolder').append("<input type='hidden' name=\"pic" + i + "\" value=\"" + src1 + "\" >");

                    }
                });


        });


    });
</script>
@stop 