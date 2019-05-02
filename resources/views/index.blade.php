@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<!-- SLIDER-->
<div id="carousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" >
    <div class="carousel-item active">
      <img class="d-block w-100" src="/img/slider1.jpg" alt="imatge del parc">
      <div class="carousel-caption">
          <h2 class="text-center message"> Bevingut al parc dels teus somnis!</h2>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/img/slider2.jpg" alt="imatge del parc">
      <div class="carousel-caption">
          <h2 class="text-center message"> Bevingut al parc dels teus somnis!</h2>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/img/slider3.jpg" alt="imatge del parc">
      <div class="carousel-caption">
          <h2 class="text-center message"> Bevingut al parc dels teus somnis!</h2>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Prèvia</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Següent</span>
  </a>
</div>
<!-- FI SLIDER -->

<!-- PROMOCIONS -->
<div class="container mt-3">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="font-weight-bold text-center">PROMOCIONS NADAL 2019</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <a href="{{route('promocions')}}"><img src="/img/promocions/promocio1.jpg" class="img-fluid" alt="imatge promoció 1"></a>
    </div>
  </div>
</div>
<!-- FI PROMOCIONS -->

<!-- NOTICIES -->
<div class="container mt-3">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="font-weight-bold text-center text-uppercase">noticies</h1>
    </div>
  </div>
  <div class="row">
    @forelse($noticies as $noticia)
    <div class="col-sm-6">
      <div class="card flex-md-row mb-4 box-shadow h-md-250">
        <img class="card-img-top" alt="imatge de la noticia" style="width: 200px;height: 300px; object-fit: cover;" src="{{$noticia->path_img}}">

        <div class="card-body d-flex flex-column align-items-start">
          <a href="/noticies?catId={{$noticia->catId}}" class="d-inline-block mb-2 text-success" style="background: none;border: none;"> {{$noticia->categoria}}</a>
          <h3 class="mb-0">
            <a class="text-dark">{{$noticia->titol}}</a>
          </h3>
            <p class="card-text mb-auto">{!!html_entity_decode(str_limit($noticia->descripcio, $limit=100, $end = "..."))!!}</p>
            <form action="{{ route('noticia',$noticia->id)}}" method="get">
              <input type="hidden" name="id" value="{{$noticia->id}}">
              <button type="submit" class="btn btn-outline-info">Continuar llegint</button>
            </form>
          </div>
    </div>
  </div>
  @empty
  <p style="background-color: #e05e5e;text-align: center;font-weight: bold;"> No hi han noticies a llistar</p>
  @endforelse
</div>
<!-- FI NOTICIES -->

<!-- LOCALITZA -->
<div class="container mt-3">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="font-weight-bold text-center">ON ESTEM?</h1>
    </div>
  </div>
  <div class="row">
    <!-- Div amb el mapa -->
    <div class="col-12" style="float: none; margin: 0 auto;">
      <div id="myMap" style="position:relative;float:none;width:800px;height:400px;"></div>
    </div>
    </br><h3>Indicacions per arribar</h3></br>
    <div style="overflow-y:scroll; height:240px; margin-top:10%; float:none;position:relative;" id='directionsItinerary'></div>
  </div>
</div>
<!-- FI LOCALITZA -->
</div>

<!-- Script del mapa -->
<script type='text/javascript'>
        var map;
        var directionsManager;

        navigator.geolocation.getCurrentPosition(locationHandler);


          function GetMap()
          {
              map = new Microsoft.Maps.Map('#myMap', {});

              //Request the user's location. PARA QUE FUNCIONE BIEN EL POSITION.ALGO, HAY QUE CERRAR LA FUNCION JUSTO AL FINAL, ANTES DE GETMAP()
              navigator.geolocation.getCurrentPosition(function (position) {

                //Load the directions module.
                Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
                    //Create an instance of the directions manager.
                    directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);

                    //Create waypoints to route between.
                    var actualWaypoint = new Microsoft.Maps.Directions.Waypoint({ address: 'Ubicació actual', location: new Microsoft.Maps.Location(position.coords.latitude, position.coords.longitude) });
                    directionsManager.addWaypoint(actualWaypoint);

                    var univeylandiaWaypoint = new Microsoft.Maps.Directions.Waypoint({ address: 'Univeylandia', location: new Microsoft.Maps.Location(40.709141,0.582608) });
                    directionsManager.addWaypoint(univeylandiaWaypoint);

                    //Specify the element in which the itinerary will be rendered.
                    directionsManager.setRenderOptions({ itineraryContainer: '#directionsItinerary' });

                    //Calculate directions.
                    directionsManager.calculateDirections();
                });
            });
          }
    </script>
    <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AjdLFBRKgbKR0sxu-uDDL_7EEKlat1mtnz71o2ZFD79hUITk14qaGZRYlKRpW8Mz' async defer></script>

<!-- Fi del script del mapa -->
 <style type="text/css">

.fotoFlickr.mr-2 {
    height: 60px;
    width: 100px;

}
</style>

<script type="text/javascript">
    $(document).ready(function(){
            var url = "http://api.flickr.com/services/feeds/photos_public.gne?" +
                      "format=json&jsoncallback=?&tags=parc atraccions";

            $.getJSON(url, function(data){
                var html = "";
                $.each(data.items, function(i, item){


                    html += "<a href="+item.link+"><img src=" + item.media.m + " class='fotoFlickr mr-2 mt-2'></a>";

                    html = html.replace("/>", ">");
                });
                $("#photos").html(html);
            });
        });
    </script>
<main>


	<div class="row">
		<div class="col-4" style="float: none; margin: 0 auto;">
			    <div id="photos"></div>
		</div>


</main>
    </div>
    </div>

<!--El chat-->

<div class="chatbox chatbox--tray chatbox--empty">
    <div class="chatbox__title">
        <h5><a href="#">Chat</a></h5>
        <button class="chatbox__title__tray">
            <span></span>
        </button>
        <button class="chatbox__title__close">
            <span>
                <svg viewBox="0 0 12 12" width="12px" height="12px">
                    <line stroke="#FFFFFF" x1="11.75" y1="0.25" x2="0.25" y2="11.75"></line>
                    <line stroke="#FFFFFF" x1="11.75" y1="11.75" x2="0.25" y2="0.25"></line>
                </svg>
            </span>
        </button>
    </div>
    <div class="chatbox__body">
        <div class="chatbox__body__message chatbox__body__message--left">

         @forelse($chat as $chats)

            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg" alt="Picture">
            <p>{{ $chats->msg }}</p>

            @empty
            <p>sense missatges</p>

            @endforelse


        </div>
    </div>

    <!--login al chat-->
    <form class="chatbox__credentials">
        <div class="form-group">
            <label for="inputName">Nom:</label>
            <input type="text" class="form-control" id="inputName" required>
        </div>
        <div class="form-group">
            <label for="inputEmail">Correu:</label>
            <input type="email" class="form-control" id="inputEmail" required>
        </div>
        <button type="submit" class="btn btn-success btn-block">Accedir </button>
    </form>

    <!--enviar-->
    <input class="chatbox__message" placeholder="Write something interesting"></input>
</div>
@endsection

@section("footer")
@endsection
