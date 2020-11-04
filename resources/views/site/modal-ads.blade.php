<!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100 font-weight-bold grey-lighter-hover">Объявления</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        @if(isset($ads))
          <nav>
            <div class="nav nav-tabs md-tabs" id="nav-tab" role="tablist">
              @foreach($ads as $ad)
                <a class="nav-item nav-link" id="nav-{{$ad->slug}}-tab" data-toggle="tab" href="#{{$ad->slug}}">
                  {{$ad->getDate()}}
                </a>
              @endforeach
            </div>
          </nav>
          <div class="tab-content pt-5" id="nav-tabContent">
            @foreach($ads as $ad)
              <div class="tab-pane fade" id="{{$ad->slug}}">
                  <h2>{{$ad->title}}</h2>
                  <p><img src="{{$ad->getImage()}}" alt="" class="img-fluid"></p>
                  <p class="font-weight-bold grey-lighter-hover">{{$ad->getDate()}}</p>
                  {!!$ad->content!!}

                  @if($ad->getImgGallery('/images/ads/'.$ad->folder))
                  <!--Grid row-->
                    <div class="gallery">
                      @foreach($ad->getImgGallery('/images/ads/'.$ad->folder) as $img)
                        <div class=" mb-3 pics animation all 1">
                          <a href="/{{$img}}" data-gal="prettyPhoto[{{$ad->slug}}]">
                            <img src="/{{$img}}" class="img-fluid rounded-0" alt="">
                          </a>
                        </div>
                      @endforeach
                    </div>
                  @endif


                  @if($ad->getImgGallery("/images/simple_users/объявления/".$ad->author->name."/".$ad->folder))
                  <!--Grid row-->
                    <div class="gallery">
                      @foreach($ad->getImgGallery("/images/simple_users/объявления/".$ad->author->name."/".$ad->folder) as $img)
                        <div class=" mb-3 pics animation all 1">
                          <a href="/{{$img}}" data-gal="prettyPhoto[{{$ad->slug}}]">
                            <img src="/{{$img}}" class="img-fluid rounded-0" alt="">
                          </a>
                        </div>
                      @endforeach
                    </div>
                  @endif



                  <p class="mt-3">
                    С уважением <span class="font-weight-bold grey-lighter-hover">{{$ad->author->name}}</span>
                  </p>
              </div>
            @endforeach

          </div>


          {{--@foreach($ads as $ad)
              <h2>{{$ad->title}}</h2>
              <p><img src="{{$ad->getImage()}}" alt="" class="img-fluid"></p>
              <p class="font-weight-bold grey-lighter-hover">{{$ad->getDate()}}</p>
              {!!$ad->content!!}

              @if($ad->getImgGallery('/images/ads/'.$ad->folder))
              <!--Grid row-->
              <div class="gallery">
                  @foreach($ad->getImgGallery('/images/ads/'.$ad->folder) as $img)
                  <div class=" mb-3 pics animation all 1">
                    <a href="/{{$img}}" data-gal="prettyPhoto[{{$ad->slug}}]">
                      <img src="/{{$img}}" class="img-fluid rounded-0" alt="">
                    </a>
                  </div>
                  @endforeach
              </div>
              @endif

              @if($ad->getImgGallery("/images/simple_users/объявления/".$ad->author->name."/".$ad->folder))
              <!--Grid row-->
              <div class="gallery">
                  @foreach($ad->getImgGallery("/images/simple_users/объявления/".$ad->author->name."/".$ad->folder) as $img)
                  <div class=" mb-3 pics animation all 1">
                    <a href="/{{$img}}" data-gal="prettyPhoto[{{$ad->slug}}]">
                      <img src="/{{$img}}" class="img-fluid rounded-0" alt="">
                    </a>
                  </div>
                  @endforeach
              </div>
              @endif
              
              

              <p class="mt-3">С уважением <span class="font-weight-bold grey-lighter-hover">{{$ad->author->name}}</span></p>
          @endforeach--}}

          {{--{{$ads->links()}}--}}
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light-blue btn-sm" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->