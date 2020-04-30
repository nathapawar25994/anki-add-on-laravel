@extends('app')


@section('content')
<div class="main">

    <div class="main-inner">

        <div class="container">

            <div class="row">

                <div class="span12">

                    <div class="widget">

                        <div class="widget-header">
                            <i class="icon-th-large"></i>
                            <h3>Card Preview</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">

                            <div class="pricing-plans plans-3">

                                <div class="plan-container">
                                    <div class="plan" style="background-color:{{$cards->background_color}}">
                                        <div class="plan-header" style="background-color:{{$cards->background_color}}">
                                            @foreach ($fields as $field)
                                            @if($field->position==1)
                                            <div class="plan-title" style="background-color:{{$cards->background_color}}">
                                                <strong style="color:{{$cards->color}};text-align:Center">{{$field->value}}</strong>
                                            </div> <!-- /plan-title -->
                                            @endif
                                            @endforeach
                                            <!--                                             
                                            <div class="plan-price" style="background-color:{{$cards->background_color}}">
                                                $0<span class="term">For Life</span>
                                            </div> -->

                                        </div> <!-- /plan-header -->

                                        <div class="plan-features">
                                            <ul>
                                                <li>
                                                    @foreach ($fields as $field)
                                                    @if($field->position!=1)
                                                    <strong style="color:{{$cards->color}};text-align:Center">{{$field->value}}</strong><br>
                                                    @endif
                                                    @endforeach

                                                </li>
                                            </ul>
                                        </div> <!-- /plan-features -->

                                        <div class="plan-actions">
                                            <a href="javascript:;" class="btn">Show Answer</a>
                                        </div> <!-- /plan-actions -->

                                    </div> <!-- /plan -->
                                </div> <!-- /plan-container -->
                            </div> <!-- /pricing-plans -->

                        </div> <!-- /widget-content -->

                    </div> <!-- /widget -->

                </div> <!-- /span12 -->


            </div> <!-- /row -->

        </div> <!-- /container -->

    </div> <!-- /main-inner -->

</div> <!-- /main -->
@stop 