@extends('app')
@section('haider_scripts')

<!-- <link href="{{ asset('css/main.css') }}" rel="stylesheet" /> -->
@stop
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


                            <form id="edit-profile" method="POST" action="{{ route('store_addField_form') }}" enctype="multipart/form-data" class=" form-horizontal">
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
                                        <label class="control-label"><strong>Images</strong></label>
                                        <div class="controls">
                                            <a href="#myModal" role="button" class="btn btn-success" data-toggle="modal">Get Images</a>
                                            <div id="myModal" class="modal hide fade modal_box_for_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h3 id="myModalLabel">Select Images</h3>
                                                    </div>
                                                    <div class="modal-body ">
                                                        <div class="inner-form">
                                                            <div class="input-field first-wrap">
                                                                <div class="svg-wrapper">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                                        <!-- <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path> -->
                                                                    </svg>
                                                                </div>
                                                                <input type="text" class="search-query" id="inpu_word" placeholder="What are you looking for?" />
                                                                <input type="button" value="Search" name="search_images" class="btn btn-success" id="search1">
                                                            </div>
                                                        </div>
                                                        <span class="info">ex. Game, Music, Video, Photography</span>
                                                        <!-- <div class="inner-form"> -->
                                                        <div class="control-group">
                                                            <div class="controls">
                                                                <select class="image-picker limit_callback show-html" data-limit="4" multiple="multiple" id="picker">

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label"><strong>Selected Images</strong></label>

                                                            <div class="controls selected_images">
                                                                <select class="image-picker limit_callback show-html" name="images[]" data-limit="4" multiple="multiple" id="selected_picker">

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Save changes</button>
                                                </div>
                                            </div>
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                    @elseif($field->id==9)
                                    <div class="control-group">
                                        <label class="control-label" for="name"><strong>{{$field->name}}</strong></label>
                                        <div class="controls" id="">
                                            <div id="controlsss">

                                                <button id="recordButton" class="rec_button">Record</button>
                                                <button id="pauseButton" class="rec_button" disabled>Pause</button>
                                                <button id="stopButton" class="rec_button" disabled>Stop</button>
                                            </div>
                                            <h3>Recordings</h3>
                                            <ol id="recordingsList"></ol>

                                        </div>


                                    </div> <!-- /control-group -->
                                    <input class="span10" name="{{$field->id}}" id="word_audio" type="hidden">
                                    @elseif($field->id==10)
                                    <div class="control-group">
                                        <label class="control-label" for="name"><strong>{{$field->name}}</strong></label>
                                        <div class="controls">
                                            <!-- <div class="row"> -->
                                            <!-- <div class="span6"> -->
                                            <div id="controlsss">
                                                <button id="recordButton2" class="rec_button">Record</button>
                                                <button id="pauseButton2" class="rec_button" disabled>Pause</button>
                                                <button id="stopButton2" class="rec_button" disabled>Stop</button>
                                            </div>
                                            <!-- <div class="span6"> -->
                                            <h3>Recordings</h3>
                                            <ol id="recordingsList2"></ol>
                                            <!-- </div>
                                            </div> -->
                                        </div>
                                    </div> <!-- /control-group -->
                                    <input class="span10" name="{{$field->id}}" id="sentence_audio" type="hidden">
                                    @elseif($field->id == 7)
                                    <div class="control-group">
                                        <label class="control-label" for="name"><strong>{{$field->name}}</strong></label>
                                        <div class="controls">
                                            <select id="def_arr" class="span10" name="def_arr[]" multiple="multiple">

                                            </select>
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

                                    <!-- <div class="control-group">
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
                                    </div> -->

                                    <div class="control-group">
                                        <label class="control-label" for="name">Extra Card 1 Instructions (Front, large white text)</label>
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
                                        <label class="control-label" for="name">Extra Card 2 Instructions (Front, large white text)</label>
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
                                        <label class="control-label" for="name">Extra Card 3 Instructions (Front, large white text)</label>
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
                                        <label class="control-label" for="name">Extra Card 4 Instructions (Front, large white text)</label>
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
            </div> <!-- /widget-content -->
        </div> <!-- /widget -->
    </div> <!-- /span8 -->


    <div class="modal fade" id="demo-2" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal"><i class="icon-xs-o-md"></i></button>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title caps"><strong>Edit Image</strong></h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="form-group span6">
                            <div class="input-group">
                                <img class="img-thumbnail zoom" id="editImage" src="images/04.png" style="height: 100px;  padding-right: 20px;" alt="dental">
                            </div>
                        </div>
                        <div class="control-group span6">
                            <label class="control-label">Add Logo</label>
                            <div class="controls">
                                <label class="radio inline">
                                    <input type="radio" name="radiobtns"> Cross mark on Image
                                </label>

                                <label class="radio inline">
                                    <input type="radio" name="radiobtns"> Circular mark on Image
                                </label>
                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop

    @section('footer_scripts')
    <!-- <script src="{{asset('js/jquery-1.7.2.min.js')}}"></script> -->
    <!-- <script id="example">
        require(['bootstrap-multiselect'], function(purchase) {
           
        });
        
    </script> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.4/select2-bootstrap.min.css" integrity="sha256-NAWFcNIZdH+TS1xpWujF/EB/Y8gwBbEOCoaK/eqaer8=" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" integrity="sha256-Zlen06xFBs47DKkjTfT2O2v/jpTpLyH513khsWb8aSU=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js" integrity="sha256-WO6QcQSEM5vwHL4eANUd/mzxRqRyxP3RWj+r6FS5qXk=" crossorigin="anonymous"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            // $('#def_arr').select2();

            $("picker").imagepicker();
            $("select").imagepicker({
                hide_select: true,
                show_label: false
            })
            $("selected_picker").imagepicker();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#def_arr').select2({
                tags: true
            });
            var deck_id = $('#deck_id').val();

            $('#3').change(function() {

                var search= $('#3').val();
                $.ajax({
                        url: '{{ url("home/get_conjugate")}}',
                        type: "POST",
                        data: {
                            'search': search
                        }
                    })
                    .done(function(data) {

                        var response = data;
                        console.log(response);

                        $('#4').val(response);
// alert($('#4').val())
                        var search =  $('#4').val();
                        $.ajax({
                        url: '{{ url("home/get_word")}}',
                        type: "POST",
                        data: {
                            'search': search
                        }
                    })
                    .done(function(data) {

                        var response = data;
                        var arr = response.split("\n");
                        arr = arr.filter(v => v != '');
                        console.log(arr);

                        $('#def_arr').find('option').remove().end();
                        for (var i = 0; i < arr.length; i++) {
                            var option = $('<option></option>').text(arr[i]).val(arr[i]);
                            $('#def_arr').append(option);
                        }
                        // $('#def_arr').show().closest('div').find('.bootstrap-select').hide();
                        // $('#7').val(response);
                    });
                $.ajax({
                        url: '{{ url("home/get_sound")}}',
                        type: "POST",
                        data: {
                            'search': search
                        }
                    })
                    .done(function(data) {

                        var response = data;
                        console.log(response);

                        $('#getSound').append(response);
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
                        url: '{{ url("home/get_POS")}}',
                        type: "POST",
                        data: {
                            'search': search
                        }
                    })
                    .done(function(data) {

                        var response = data;
                        console.log(response);
                        $('#6').val(response);
                        $.ajax({
                                url: '{{ url("home/get_GRAM")}}',
                                type: "POST",
                                data: {
                                    'search': search
                                }
                            })
                            .done(function(data) {

                                var response = data;
                                console.log(response);
                                // if()
                                var pos_value = $('#6').val();
                                var set_value = pos_value + " " + response;
                                $('#6').val(set_value);
                            });
                    });



                    });

            });

            // $('#4').change(function() {

            //    var search= $('#4').val();
              

            // });



            // $('body').on('click', 'img', function() {
            //     if ($(this).val() == 2) {

            //         var picid = $(this).attr("id");
            //         $('#' + picid).css({
            //             'border': '',
            //         });

            //         $(this).val(1);


            //     } else {

            //         var picid = $(this).attr("id");
            //         $('#' + picid).val(2);
            //         // alert($(this).val());
            //         $('#' + picid).css({
            //             'border': '5px solid rgb(20, 20, 17)',
            //         });


            //     }

            // });

            $('#search1').on('click', function() {
                var search = $('#inpu_word').val();
                // alert(search);

                $.ajax({
                        url: '{{ route("get_img")}}',
                        type: "POST",
                        data: {
                            'search': search
                        }
                    })
                    .done(function(data) {
                        var response = JSON.parse(data);
                        console.log(response);
                        $('#picHolder').empty();
                        $('#picker').find('option').remove().end();
                        for (i = 0; i < response.length; i++) {
                            var src = response[i].link;
                            // var pic = $('<img class="picNameId" name="picNameId" style="height: 100px; width: 100px; display: ;">');
                            // pic.attr('src', src);
                            var option = $('<option></option>').attr('data-img-src', src).val(src);
                            $('#picker').append(option);

                        }
                        $('#picker').show().closest('div').find('.bootstrap-select').hide();
                        $('#picker').imagepicker();
                    });
            });

            $('#picker1').on('change', function() {
                // var imageValue = $('#picker').find(":selected:last").val();
                var imageValue = $(this).val();

                console.log(imageValue);
                var option = $('<option></option>').attr('data-img-src', imageValue).val(imageValue);
                $('#selected_picker').append(option);
                // $('#').imagepicker();
                // $("#selected_picker").data('picker').sync_picker_with_select();
                $("#selected_picker").imagepicker();

                // alert(imageValue);


            });

            var img_arr = [];
            $(document).on('click', '.image_picker_image', function(e) {

                e.preventDefault();


                // var imageValue = $('#picker').find(":selected:last").val();
                var imageValue = $(this).attr('src');
                if (jQuery.inArray(imageValue, img_arr) == -1) {
                    console.log(imageValue);
                    var option = $('<option></option>').attr('data-img-src', imageValue).val(imageValue).attr('selected', true);
                    $('#selected_picker').append(option);
                    // $('#').imagepicker();
                    // $("#selected_picker").data('picker').sync_picker_with_select();
                    $("#selected_picker").imagepicker();
                    img_arr.push(imageValue);
                    // setEditButton();
                    setCancelButton();

                }


            });


            // create cancel button on Image
            function setCancelButton() {

                $(".selected_images .thumbnail").each(function() {
                    $('<span class="cancel_button_hover">x</span>').prependTo(this);
                });


            }


            // // create edit button on Image
            // function setEditButton() {

            //     $(".selected_images .thumbnail").each(function() {
            //         $('<a hrf="#second" data-toggle="modal" data-target="#demo-2" class="cancel_button second-popup-link icon-large icon-pencil"></a>').prependTo(this);
            //     });


            // }

            $(document).on('click', '.cancel_button_hover', function(e) {
                e.preventDefault();
                var imagePath = $(this).parent().children('.image_picker_image').attr('src');
                $(this).closest('li').remove();
                console.log(img_arr);
                $(".image-picker option[value=\"" + imagePath + "").remove();

                img_arr.splice($.inArray(imagePath, img_arr), 1);
                console.log(img_arr);

            });

            $(document).on('click', '.cancel_button', function(e) {
                e.preventDefault();
                var imagePath = $(this).parent().children('.image_picker_image').attr('src');

                // alert(imagePath);
                $('#editImage').attr("src", imagePath);

            });

            // $('#second-popup, #myModal').magnificPopup({
            //     closeBtnInside: true
            // });


        });
        // $(function () {
        //     $('#def_arr').multiselect({
        //         includeSelectAllOption: true
        //     });

        // });
    </script>
    @stop 