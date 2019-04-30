@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")



<!-- FAQ -->
<div class="container jumbotron mt-3">
  <div class="row">
      <div class="col-sm-12">
        <h3 class="font-weight-bold text-center text-uppercase">Notificacions</h3>
      </div>
  </div>
  @for($i=0; $i <= count($incidencies); $i++)

  <div class="col-sm-12 accordion" id="accordion">

    <div class="card">
      <div class="card-header" id="headingOne">
        <p class="mb-0">
          <a href="#" class="card-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            {{ $incidencies[$i]->titol }}
          </a>
          <p>
        </p>
      </div>
      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body text-justify">
          </div>
      </div>
    </div>

    <p>no hi han notificacions d'incidencies</p>



  </div>
  @endfor

</div>
<!--  FI FAQ -->

@endsection

@section("footer")
@endsection
