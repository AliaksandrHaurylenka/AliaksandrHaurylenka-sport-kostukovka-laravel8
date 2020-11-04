<!--Archive-->
<section class="section mb-5 wow fadeIn">

    <!-- Card -->
    <div class="card card-body pb-0">
        <div class="single-post">

            <h6 class="h6-responsive font-weight-bold dark-grey-text text-center spacing grey lighten-4 py-2 mb-4">
                <strong>АРХИВ</strong>
            </h6>

            <ul class="list-group my-4">
                @forelse ($yearArchive as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="/archive/{{$item->year}}" class="elegant-darker-hover">
                            <span class="mb-0">{{$item->year}}</span>
                        </a>
                        <span class="badge teal badge-pill font-small">{{$item->number}}</span>
                    </li>
                @empty
                    <li>Здесь пока ничего нет.</li>
                @endforelse
            </ul>


            {{--<div class="accordion" id="accordionExample275">
                @foreach ($yearArchive as $key => $item)
                    <div class="card z-depth-0 bordered">
                        <div class="card-header d-flex justify-content-between align-items-center" id="heading{{$key}}">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                    data-target="#collapse{{$key}}"
                                    aria-expanded="true" aria-controls="collapse{{$key}}">
                                {{$item->year}}
                            </button>
                            <span class="badge teal badge-pill font-small">{{$item->number}}</span>
                        </div>
                        <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}"
                             data-parent="#accordionExample275">
                            <div class="card-body">
                                <ul class="list-group my-4">
                                    @if($item = ['1978'])
                                        @forelse ($monthYearArchive as $item)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <a href="/archive_month_year/{{$item->month}}/{{$item->year}}"
                                                   class="elegant-darker-hover">
                                                    <span class="mb-0">{{$item->monthRU}}</span>
                                                </a>
                                                <span class="badge teal badge-pill font-small">{{$item->number}}</span>
                                            </li>
                                        @empty
                                            <li>Здесь пока ничего нет.</li>
                                        @endforelse
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>--}}


        </div>

    </div>

</section>
<!--/Archive-->