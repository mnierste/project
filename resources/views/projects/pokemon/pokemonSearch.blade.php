@extends('layouts.layouts')

@section('title', 'Max Nierste API page')

@section('content')

<style>
body{
  color:black;
}
</style>

<div class="py-5 text-center" style="background-color:#eee;" >
  <h2>Pokemon API (For Tito!)</h2>
  <p class="lead">Form built to work with API
    <a href="https://pokeapi.co/" target="_blank" >Pokemon Api</a>
  </p>

</div>
<div style="background-color:#333;">

  <div class="container">



  </div>



  <div class="container" >
    <div class="row">

      <div class="col-12 m-b-md  p-t-md">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center mb-3">Pokemon Search</h4>
            <p class="text-center">Try: ditto or 1</p>
          </div>
          <div class="card-body">
            <form action="{{ url('/pokemonSearch') }}" method="post">
              @csrf
              <div class="row text-center">
                <div class="col-12 m-b-sm">
                  <label class="" id="label1" for="query">Search a Pokémon...</label>
                  <input name="nameOrId" class="form-control text-center" id="nameOrId" placeholder = "Enter name or ID"></input>
                </div>

                <div class="col-12 m-b-sm">
                  <button class="btn btn-primary" type="submit" id="submit">Find Pokemon</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  @if(!$pokemon)
    <p>No Pokemon found</p>
  @else
    <!--when pokemon doesnt have a query it returns multiple -->
    @if(isset($pokemon->count) && $pokemon->count > 1)

      @php
        $count = 1;

        #https://pokeapi.co/api/v2/pokemon/1/

      @endphp
      <div class="container" >

        <div class="row">

        @foreach($pokemon->results as $poke)


          @if($count == 4)
            @php
            $count =1;
            @endphp
            </div>
            <div class="row">

          @else

          @endif

          <div class="col-md-3 col-sm-12 m-b-sm">
            <div class="card" id="pokemonresults">
              <div class="card-header">
                <div class="row">
                  <div class="col-12 text-center">
                    <h5 id="singleName">{{ strtoupper($poke->name) }}</h5>
                  </div>

                </div>
              </div>
              <div class="card-body">

                <div class="row">
                  <div class="col-12">
                    <button class="btn btn-primary btn-block" onclick="getData('{{ $poke->name }}')">See Info</button>

                  </div>
                </div>
              </div>
            </div>
          </div><!--end card-->


        @endforeach
        </div><!--end of final row -->

        <!--pagenation -->
        <div class="row">
          <div class="col-12">
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center pagination-lg ">
                @if(!$pokemon->previous || $pokemon->previous == '')

                @else
                  <li class="page-item"><a class="page-link" href="">Go Back</a></li>

                @endif
                @if(!$pokemon->next || $pokemon->next=='')

                @else
                  @php
                  $url = explode("?", $pokemon->next);
                  $url = $url[1];
                  @endphp
                  <li class="page-item"><a class="page-link" href="{{ url('/pokemonSearch?url='. $url) }}">Next</a></li>
                @endif

              </ul>
            </nav>
          </div>
        </div>
      </div><!-- end of container -->


    @else
      <!-- individual result -->

      <div class="container" >
        <div class="row">

          <div class="col-12 m-b-md  p-t-md">

            <div class="card" id="pokemonresults">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-2 col-sm-12">
                    <h1 id = "number">{{ $pokemon->order }}</h1>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <h1 class="text-center mb-3" id = "name">{{ $pokemon->name }} </h1>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <img src ="{{ url($pokemon->sprites->front_default)  }}" id="poke_pic">
                  </div>
                </div>
              </div>
              <div class="card-body text-center">

                <div class="row text-center m-t-md m-b-md">
                  <div class="col-12">
                    <h2 class="">Type</h2>
                  </div>
                  @php

                    $typeCount = count($pokemon->types);
                    $typeColCount = 12 / $typeCount;

                  @endphp

                  @foreach($pokemon->types as $type)

                  <div class="card col-md-{{ $typeColCount }} col-sm-12">
                    <p>{{ $type->type->name }}</p>
                  </div>
                  @endforeach
                </div>
                <div class="row m-t-md m-b-md">
                  <div class="col-12">
                    <h2 class="text-center">Abilities</h2>
                  </div>

                  @php
                    $abilitiesCount = count($pokemon->abilities);
                    $colCount = 12 / $abilitiesCount;

                  @endphp

                  @foreach($pokemon->abilities as $ability)

                  <div class="card col-md-{{ $colCount }} col-sm-12">
                    <p>{{ $ability->ability->name }}</p>
                  </div>
                  @endforeach
                </div>
                <div class="row m-t-md m-b-md">
                  <div class="col-12">
                    <h2 class="text-center">Stats</h2>
                  </div>
                  @foreach($pokemon->stats as $stats)
                  <div class="card col-md-4 col-sm-12">
                    <p>{{ $stats->stat->name }} : {{ $stats->base_stat }}</p>
                  </div>
                  @endforeach
                  <div class="card col-md-6 col-sm-12">
                    <p>Height: {{ $pokemon->height }}ft</p>
                  </div>
                  <div class="card col-md-6 col-sm-12">
                    <p>Weight: {{ $pokemon->weight }}lbs</p>
                  </div>

                </div>

                <div class="row m-t-md m-b-md">
                  <div class="col-12">
                    <h2 class="text-center">Moves</h2>
                  </div>

                  @php
                  $movesCount = count($pokemon->moves);
                  $movesColCount = floor($movesCount % 4);

                  @endphp

                  @foreach($pokemon->moves as $move)
                  <div class="card col-3">
                    <p>{{ $move->move->name }}</p>
                  </div>
                  @endforeach

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
  @endif
</div>


<!-- Modal for multiple results-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="number" class="modal-title col-4">#:</h4>
        <h4 class="modal-title col-6" id="nameid"></h4>
        <button type="button" class="close col-2" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">

        <div class="row">
           <div class="col-6">
             <h4>Stats</h4>
             <p id="hp">HP:</p>
             <p id="attack">attack:</p>
             <p id="defense">defense:</p>
             <p id="speed">speed:</p>
           </div>
           <div class="col-6">
             <img id="poke_pic" src ="" style="width:100%;">
           </div>
           <div class="col-12">
             <h4>Type</h4>
             <p id="type">HP:</p>
           </div>
           <div class="col-12">
             <h4>Abilities</h4>
             <p id="abilities"></p>
           </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


@endsection

@section('scripts')
<script>
function getData(searchName) {
  let query = searchName.toLowerCase();
  alert(query);
  let url = 'https://pokeapi.co/api/v2/pokemon/' + query;
  alert(url);
  fetch(url)
    .then(response => {
      if(response.ok) {
        return response.json()
      }else {
        alert('Please make sure the Pokémon name or ID is typed correctly.')
      }
    })
    .then((out) => {
      console.log(out)
      let number = out.id;
      let name = out.name;
      let pic = out.sprites.front_default;
      let type = out.types.map((type) => type.type.name).join(', ').toUpperCase();
      let abilities = out.abilities.map((ability) => ability.ability.name).join(', ').toUpperCase();

      let hp = out.stats[5].base_stat;
      let attack = out.stats[4].base_stat;
      let defense = out.stats[3].base_stat;
      let speed = out.stats[0].base_stat;


      $("#myModal").modal()
      document.getElementById("number").innerHTML = "# " + number;
      document.getElementById("poke_pic").src = pic;
      document.getElementById("nameid").innerHTML = name;
      document.getElementById("type").innerHTML = "TYPE: " + type;
      document.getElementById("abilities").innerHTML = "ABILITIES: " + abilities;

      document.getElementById("hp").innerHTML = "HEALTH: " + hp;
      document.getElementById("attack").innerHTML = "ATTACK: " + attack;
      document.getElementById("defense").innerHTML = "DEFENSE: " + defense;
      document.getElementById("speed").innerHTML = "SPEED: " + speed;


    })

  }
</script>
@endsection
