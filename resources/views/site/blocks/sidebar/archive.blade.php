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

        </div>

    </div>

</section>
<!--/Archive-->