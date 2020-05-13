@extends('app')
@section('haider_scripts')

<link href="{{ asset('css/main.css') }}" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet">


@stop
@section('content')
<div class="s130">
    <form>
        @csrf
        <div class="inner-form">
            <div class="input-field first-wrap">
                <div class="svg-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                    </svg>
                </div>
                <input type="text" id="inpu_word" placeholder="What are you looking for?" />
            </div>

            <div class="input-field second-wrap">
                <input type="button" value="Images" name="search_images" class="txt2 btn-search1" id="search1">

            </div>

        </div>
        <span class="info">ex. Game, Music, Video, Photography</span>
        <!-- <div class="inner-form"> -->
        <!-- <div id="picHolder">
            <select id="images" name="images[]" multiple="multiple" class="image-picker">
            </select>
        </div> -->
        <div class="control-group">
            <div class="controls">
                <select class="image-picker limit_callback show-html" data-limit="2" multiple="multiple">
                    
                </select>
            </div>
        </div>

        <input type="hidden" name="ticketFileAttahmentName" id="ticketFileAttahmentName" value=""> <br>

        <div class="input-field second-wrap">
            <!-- <a href="{{ action('SearchController@setSentence')}}" type="button" class="btn btn-primary">Search</a> -->
        </div>


        <!-- </div> -->
    </form>

</div>

@stop

@section('footer_scripts')

<script type="text/javascript">
    $(document).ready(function() {
        // Initialize the object
        $("select").imagepicker();
        // Retrieve the picker


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //   var category_id=$('#category').val();
        //   //alert(category_id);
        //       $.ajax({
        //     url: '{{ url("app_setting/products/get_product_sub_category")}}',
        //                   type: "POST",
        //                   data: {'category_id':category_id}
        //   })
        //     .done(function (data) {

        //                       var response=JSON.parse(data);
        //                       console.log(response);
        //                       $('#sub_category_id').find('option').remove().end();
        //                       for(var i=0;i<response.length;i++){
        //                           var option = $('<option></option>').text(response[i].sub_category_name).val(response[i].id);
        //                           $('#sub_category_id').append(option);
        //                       }
        //                       $('#sub_category_id').show().closest('div').find('.bootstrap-select').hide();

        //                   });
        // $(#set).hide();


        $('#search1').on('click', function() {
            var search = $('#inpu_word').val();
            alert(search);
           
            $.ajax({
                    url: '{{ url("search/get_image")}}',
                    type: "POST",
                    data: {
                        'search': search
                    }
                })
                .done(function(data) {
                    var response = JSON.parse(data);
                    console.log(response);
                    $('#picHolder').empty();
                    $('select').find('option').remove().end();
                    for (i = 0; i < response.length; i++) {
                        var src = response[i].link;
                        // var pic = $('<img class="picNameId" name="picNameId" style="height: 100px; width: 100px; display: ;">');
                        // pic.attr('src', src);
                        var option = $('<option></option>').attr('data-img-src', src).val(src);
                        $('select').append(option);

                    }
                    $('select').show().closest('div').find('.bootstrap-select').hide();
                    $("select").imagepicker();
                });
        });
    });
</script>

@stop 