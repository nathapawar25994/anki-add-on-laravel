
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <title>{{ config('app.name', 'Anki-Web') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />


    <!-- <link rel="shortcut icon" type="image/x-icon" href="https://d27ucmmhxk51xv.cloudfront.net/external/images/favicon.ico?version=1.2.1" /> -->
    <link rel="stylesheet" href="https://d27ucmmhxk51xv.cloudfront.net/common.css?version=1.2.1" />
    <link rel="stylesheet" href="https://d27ucmmhxk51xv.cloudfront.net/external/fonts/font-awesome/5.12.0/css/font-awesome.min.css?version=1.2.1" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>
    /* .container  {
  display: flex;
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}

.container .row {
  margin: 0 auto;
} */
</style>
    <!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js"></script> -->
    </head>

<body>
    <!-- navigation bar -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">

                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ action('HomeController@index')}}">Back To Homepage</a>
                    </li>
                   
                </ul>

            </div>
        </div>
    </div>
    <!-- navigation bar ends here -->


    <!-- <main class="py-4"> -->
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
                <input type="text" id="inpu_word"placeholder="What are you looking for?" />
            </div>
            <div class="input-field second-wrap">
                <input type="button" value="Longman" name="search_images" class="txt2 btn-search1" id="search">
            </div>
            <div class="input-field second-wrap">
                <input type="button" value="Images" name="search_images" class="txt2 btn-search" id="search1">

            </div>
        </div>
        <span class="info">ex. Game, Music, Video, Photography</span>
        <!-- <div class="inner-form"> -->
        <div id="picHolder"></div>
        <input type="hidden" name="ticketFileAttahmentName" id="ticketFileAttahmentName" value=""> <br>

        <div class="input-field second-wrap">
            <!-- <a href="{{ action('SearchController@setSentence')}}" type="button" class="btn btn-primary">Search</a> -->
        </div>

        <!-- </div> -->
    </form>

</div>
    <!-- </main> -->

    
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


  <script src="{{ asset('js/extention/choices.js') }}"></script>
  
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->

<script type="text/javascript">
    $(document).ready(function() {
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

        $('#search').on('click', function() {
            var search = $('#inpu_word').val();
            //alert(category_id);
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
                    // $('#sub_category_id').find('option').remove().end();
                    // for(var i=0;i<response.length;i++){
                    //     // var oldSrc = 'http://example.com/smith.gif';
                    //     // var newSrc = 'http://example.com/johnson.gif';
                    //     // $('img[src="' + response[i].Image + '"]').attr('src', response[i].Image );
                    //     $('#set').attr('src', response[i].Image);

                    // }

                    $('#picHolder').empty();
                    // for (i = 0; i < response.length; i++) {
                    //     // var file = ticketFileAttahmentName1[i];
                    //     //  alert(response['i']);
                    //     var src = response[i].link;
                    //     // var pic = $('<img class="picNameId" name="picNameId" style="height: 100px; width: 100px; display: ;">');
                    //     // pic.attr('src', src);
                    //     $('#picHolder').append(src);
                    // }
                    $('#picHolder').append(response);
                });

            // $(#set).show();
        });
        $('#search1').on('click', function() {
            var search = $('#inpu_word').val();
            //alert(category_id);
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
                    // $('#sub_category_id').find('option').remove().end();
                    // for(var i=0;i<response.length;i++){
                    //     // var oldSrc = 'http://example.com/smith.gif';
                    //     // var newSrc = 'http://example.com/johnson.gif';
                    //     // $('img[src="' + response[i].Image + '"]').attr('src', response[i].Image );
                    //     $('#set').attr('src', response[i].Image);
                    // }
                    $('#picHolder').empty();
                    for (i = 0; i < response.length; i++) {
                        // var file = ticketFileAttahmentName1[i];
                        //  alert(response['i']);
                        var src = response[i].link;
                        var pic = $('<img class="picNameId" name="picNameId" style="height: 100px; width: 100px; display: ;">');
                        pic.attr('src', src);
                        $('#picHolder').append(pic);
                    }
                });
            // $(#set).show();
        });
        // $('#search1').on('click', function() {
        //     var search = $('#highlight_word').val();
        //     //alert(category_id);
        //     $.ajax({
        //             url: '{{ url("home/get_image")}}',
        //             type: "POST",
        //             data: {
        //                 'search': search
        //             }
        //         })
        //         .done(function(data) {

        //             var response =data;
        //             console.log(response);
        //             // $('#sub_category_id').find('option').remove().end();
        //             // for(var i=0;i<response.length;i++){
        //             //     // var oldSrc = 'http://example.com/smith.gif';
        //             //     // var newSrc = 'http://example.com/johnson.gif';
        //             //     // $('img[src="' + response[i].Image + '"]').attr('src', response[i].Image );
        //             //     $('#set').attr('src', response[i].Image);

        //             // }

        //             $('#picHolder').empty();
        //             for (i = 0; i < response.length; i++) {
        //                 // var file = ticketFileAttahmentName1[i];
        //                 //  alert(response['i']);
        //                 var src = response[i].link;
        //                 var pic = $('<img class="picNameId" name="picNameId" style="height: 100px; width: 100px; display: ;">');
        //                 pic.attr('src', src);
        //                 $('#picHolder').append(pic);
        //             }
        //             // $('#picHolder').append(response);
        //         });
        //     // $(#set).show();
        // });
    });
</script>

</body>

</html> 




