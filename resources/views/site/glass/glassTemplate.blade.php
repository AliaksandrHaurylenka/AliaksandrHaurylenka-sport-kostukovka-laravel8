@if(isset($num, $sport, $sp))
    <div class="card">
        <div class="card-header blue lighten-3 z-depth-1">
            <h5 class="text-uppercase mb-0 py-1">
                <a class="white-text font-weight-bold" data-toggle="collapse" href="#collapse{{$num}}">
                    {{$sport}}
                    <i class="fas fa-plus-circle"></i>
                </a>
            </h5>
        </div>
        <div id="collapse{{$num}}" class="collapse {{$show}}" data-parent="#accordionEx23">
            <div class="card-body row">
                @foreach($$sp as $sport)
                    <!-- Card -->
                    <div class="card col-md-4 mb-3">
                        <!-- Card image -->
                        <div class="view overlay">
                            <img class="card-img-top" src="/images/gomelglasses/{{$sport->photo}}" alt="">
                            <a href="/images/gomelglasses/{{$sport->photo}}" data-gal="prettyPhoto[{{$sport->sport}}]">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <!-- Card content -->
                        <div class="card-body" style="padding: 0;">
                            {!! $sport->description !!}
                        </div>
                    </div>
                    <!-- Card -->
                @endforeach
            </div>
        </div>
    </div>
@endif