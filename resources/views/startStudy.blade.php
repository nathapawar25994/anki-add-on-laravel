@extends('app')


@section('content')
<div class="main">

    <div class="main-inner">

        <div class="container">

            <div class="row">

                <div class="span12">

                    <div class="info-box" id="flashcards">
                        <div class="row-fluid stats-box ">
                            <div id='current-question' style="color:{{$cards->color}};text-align:Center" class="main"></div>
                            <div id='current-answer' style="color: #33173e;text-align:Center"></div>

                            <ul>

                                @foreach ($alls as $all)
                                <li class='cards_list'>
                                    @foreach ($questions as $question)
                                    @if($question->number_id ==$all->number_id)

                                    @if($question->field_id == 8)
                                    <div class="plan-title question">
                                        {{$question->value}}

                                    </div> <!-- /plan-title -->
                                    @else
                                    <div class="plan-title question">
                                        {{$question->value}}
                                    </div> <!-- /plan-title -->
                                    @endif
                                    @endif
                                    @endforeach
                                    @foreach ($answers as $answer)
                                    @if($answer->number_id ==$all->number_id)
                                    <div class="answer"><span>{{$answer->value}}</span></div>
                                    @endif
                                    @endforeach
                                </li>
                                @endforeach
                            </ul>
                            <div class="plan-actions">
                                <a id='show-answer' href='#' class="btn">Show answer</a>
                                <a id="correct" class="btn" href="#">Correct</a>
                                <a id="wrong" class="btn" href="#">Wrong</a>
                            </div> <!-- /plan-actions -->
                            <!-- <div class="span4">
                                <div class="stats-box-title">Vizitor</div>
                                <div class="stats-box-all-info"><i class="icon-user" style="color:#3366cc;"></i> 555K</div>
                                <div class="wrap-chart">
                                    <div id="visitor-stat" class="chart" style="padding: 0px; position: relative;"><canvas id="bar-chart1" class="chart-holder" height="150" width="325"></canvas></div>
                                </div>
                            </div>

                            <div class="span4">
                                <div class="stats-box-title">Likes</div>
                                <div class="stats-box-all-info"><i class="icon-thumbs-up" style="color:#F30"></i> 66.66</div>
                                <div class="wrap-chart">
                                    <div id="order-stat" class="chart" style="padding: 0px; position: relative;"><canvas id="bar-chart2" class="chart-holder" height="150" width="325"></canvas></div>
                                </div>
                            </div>

                            <div class="span4">
                                <div class="stats-box-title">Orders</div>
                                <div class="stats-box-all-info"><i class="icon-shopping-cart" style="color:#3C3"></i> 15.55</div>
                                <div class="wrap-chart">

                                    <div id="user-stat" class="chart" style="padding: 0px; position: relative;"><canvas id="bar-chart3" class="chart-holder" height="150" width="325"></canvas></div>

                                </div>
                            </div> -->
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('footer_scripts')
<script>
    $(function() {
        $('#flashcards').ouicards();
        $('#correct').first().hide();
        $('#wrong').first().hide();
        $('#searchL').first().hide();
        $('#searchI').first().hide();

    });

    function picture() {

        // document.getElementsByClassName('open_img').style.display='block';
        var elems = document.getElementsByClassName('open_img');
        for (var i = 0; i < elems.length; i += 1) {
            elems[i].style.display = 'block';
        }
        $("#show_img").hide();



    }

    //     window.onload=function(){
    //         // $('#audio_record')[0].play();
    //         document.getElementById('#audio_record').play();
    // } function picture(){ 
    // var pic = "http://img.tesco.com/Groceries/pi/118/5000175411118/IDShot_90x90.jpg"
    // document.getElementById('bigpic').src = pic.replace('90x90', '225x225');
    // document.getElementsByClassName('open_img').style.display='block';

    // }
    $(document).ready(function() {
        // $('#audio_record').parent().children('current-question').get(0).play();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#show-answer').on('click', function() {
            var count = $('#custId').val() - 1;
            var deck_id = $('#deck_id').val();
            // alert(deck_id);
            $.ajax({
                    url: '{{ url("home/update_count")}}',
                    type: "POST",
                    data: {
                        'count': count,
                        'deck_id': deck_id
                    }
                })
                .done(function(data) {
                    var response = JSON.parse(data);
                    console.log(response);


                });
        });

        $(document).on('click', '#correct', function(e) {
            e.preventDefault();
            // alert();
            ouicards.next();
            // $(this).parentsUntil('.row-fluid').children('ul').find('li.cards_list').remove();
            // $(this).parent().closest('.cards_list').remove();
        });

        $(document).on('click', '#wrong', function(e) {
            e.preventDefault();
            $(this).closest('#current-question').remove();
            $(this).closest('#current-answer').remove();
        });
    });
</script>
@stop 