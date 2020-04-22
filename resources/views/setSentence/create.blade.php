<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        form_main {
    width: 100%;
}
.form_main h4 {
    font-family: roboto;
    font-size: 20px;
    font-weight: 300;
    margin-bottom: 15px;
    margin-top: 20px;
    text-transform: uppercase;
}
.heading {
    border-bottom: 1px solid #fcab0e;
    padding-bottom: 9px;
    position: relative;
}
.heading span {
    background: #9e6600 none repeat scroll 0 0;
    bottom: -2px;
    height: 3px;
    left: 0;
    position: absolute;
    width: 75px;
}   
.form {
    border-radius: 7px;
    padding: 6px;
}
.txt[type="text"] {
    border: 1px solid #ccc;
    margin: 10px 0;
    padding: 10px 0 10px 5px;
    width: 100%;
}
.txt_3[type="text"] {
    margin: 10px 0 0;
    padding: 10px 0 10px 5px;
    width: 100%;
}
.txt2[type="submit"] {
    background: #242424 none repeat scroll 0 0;
    border: 1px solid #4f5c04;
    border-radius: 25px;
    color: #fff;
    font-size: 16px;
    font-style: normal;
    line-height: 35px;
    margin: 10px 0;
    padding: 0;
    text-transform: uppercase;
    width: 30%;
}
.txt2:hover {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    color: #5793ef;
    transition: all 0.5s ease 0s;
}

    </style>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>

</body>
@if(!empty($someArray))
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="form_main">
                <h4 class="heading"><strong>Quick </strong> Search <span></span></h4>
                <div class="form">
                    <form>
                        @csrf
                        <input type="text" required="" placeholder="Please input your Sentence" value="" name="sentence" class="txt">
                        <input type="text" required="" placeholder="Please input Highlight Word" value="" name="highlight_word" class="txt">
                        <input type="submit" value="Images" name="search_images" class="txt2">
                    </form>
                </div>
            </div>
            @foreach($someArray as $page)
            <tr>
                <img src="{{$page['Image']}}" alt="Smiley face" height="50" width="50" padding-right="50" ;>

            </tr>
            @endforeach
        </div>

    </div>
</div>
@else
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="form_main">
                <h4 class="heading"><strong>Quick </strong> Search <span></span></h4>
                <div class="form">
                    <form>
                        @csrf
                        <input type="text" required="" placeholder="Please input your Sentence" value="" name="sentence" class="txt">
                        <input type="text" required="" placeholder="Please input Highlight Word" value="" name="highlight_word" class="txt">
                        <input type="button" value="Images" name="search_images" class="txt2" id="search">
                    </form>
                </div>
            </div>
            <div id="picHolder"></div>
            <input type="hidden" name="ticketFileAttahmentName" id="ticketFileAttahmentName" value=""> <br>
        </div>

    </div>
</div>
@endif
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

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
            var search = $(this).val();
            //alert(category_id);
            $.ajax({
                    url: '{{ url("search/get_images")}}',
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
                        var src = response[i].Image;
                        var pic = $('<img class="picNameId" name="picNameId" style="height: 100px; width: 100px; display: ;">');
                        pic.attr('src', src);
                        $('#picHolder').append(pic);
                    }
                });
            // $(#set).show();
        });
    });
</script>

</html> 