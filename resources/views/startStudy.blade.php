@extends('app')


@section('content')
<div class="main">

    <div class="main-inner">

        <div class="container">
            <div class="pricing-plans plans-3">

                <div class="plan-container">
                    <div class="plan" style="background-color:{{$cards->background_color}}">
                        <div id='flashcards'>
                            <div class="plan-header" id='flashcards' style="background-color:{{$cards->background_color}}">
                                <div id='current-question' style="color:{{$cards->color}};text-align:Center"></div>
                            </div>
                            <div class="plan-features">
                                <div id='current-answer' style="color:{{$cards->color}};text-align:Center"><br></div>
                                <a type="button" href="{{ route('browser') }}"  name="search_images" class="btn btn-danger" id="searchL">Longman</a>
                                <a type="button" href="{{ route('browser') }}" name="search_images" class="btn btn-warning" id="searchI">Images</a>
                            </div>
                            <input type="hidden" id="custId" name="custId" value="{{$count}}">

                            <ul>
                                @foreach ($questions as $question)
                                <?php
                                $count_de = App\Decks::where('id', 2)->first();
                                // print_r($count_de);die;
                                ?>
                                <li>
                                    <div class="plan-title question">
                                        {{$question->value}}
                                        <input type="hidden" id="deck_id" name="custId" value="{{$question->deck_id}}">

                                    </div> <!-- /plan-title -->
                                    @foreach ($answers as $answer)
                                    @if($answer->number_id ==$question->number_id)
                                    <div class="answer">{{$answer->value}}</div>
                                    @endif
                                    @endforeach
                                </li>
                                @endforeach
                            </ul>
                            <!-- /plan-features -->
                            <div class="plan-actions">
                                <a id='show-answer' href='#' class="btn">Show answer</a>
                                <a id="correct" class="btn" href="#">Correct</a>
                                <a id="wrong" class="btn" href="#">Wrong</a>
                            </div> <!-- /plan-actions -->
                        </div>
                    </div> <!-- /plan -->
                </div> <!-- /plan-container -->
            </div> <!-- /pricing-plans -->

        </div> <!-- /container -->

    </div> <!-- /main-inner -->

</div> <!-- /main -->
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