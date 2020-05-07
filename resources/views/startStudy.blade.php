@extends('app')


@section('content')
<div class="main">

    <div class="main-inner">

        <div class="container">

            <div class="row">

                <div class="span12">

                    <div class="info-box" id="flashcards">
                        <div class="row-fluid stats-box ">
                            <div id='current-question' style="color:{{$cards->color}};text-align:Center" class="main"><br></div>
                            <div id='current-answer' style="color:{{$cards->color}};text-align:Center"><br></div>

                            <ul>

                            @foreach ($alls as $all)
                                <li>
                                    @foreach ($questions as $question)
                                    @if($question->number_id ==$all->number_id)
                                   
                                    @if($question->field_id == 8)
                                    <div class="plan-title question">
                                        {{$question->value}}

                                    </div> <!-- /plan-title -->
                                    @else
                                    <div class="plan-title question">
                                        {{$question->value.'<br>'}}
                                    </div> <!-- /plan-title -->
                                    @endif
                                    @endif
                                    @endforeach
                                    @foreach ($answers as $answer)
                                    @if($answer->number_id ==$all->number_id)
                                    <div class="answer"><span>{{'<br>'.$answer->value}}</span></div>
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
    $(document).ready(function() {
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
    });
</script>
@stop 