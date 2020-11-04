<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade main-carousel" data-ride="carousel">

    @if(isset($slides))
        <!--Indicators-->
        <ol class="carousel-indicators">
            @foreach($slides as $slide)
                <li data-target="#carousel-example-1z" data-slide-to="{{$slide->for_indicators}}" class="{{$slide->class}}"></li>
            @endforeach
        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">

            @foreach($slides as $slide)
                <div class="carousel-item {{$slide->class}}">
                    <div class="view" style="background-image: url('/images/main/{{$slide->photo}}'); background-repeat: no-repeat; background-size: cover; background-position: 0 {{$slide->position}}%;">
                    </div>
                </div>
            @endforeach

        </div>
        <!--/.Slides-->
    @endif
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->

</div>
<!--/.Carousel Wrapper-->