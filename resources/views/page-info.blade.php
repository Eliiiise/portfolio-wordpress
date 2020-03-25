@extends('layouts.app')

@include('partials.header')

@section('content')

<div class="transition"></div>
<div class="info">
      <div class="bloc">
            <div class="bloc-left">
            </div>
            <div class="bloc-right">
              <div class="title">
                @foreach ( $info->titre_split as $letter )
                  <span>
                    <h1 class="js-letter-project">
                      {{ $letter }}
                    </h1>
                  </span>
                @endforeach
              </div>
            </div>
      </div>
      <div class="bloc">
            <div class="bloc-left">
              <p>Qui suis-je ?</p>
            </div>
            <div class="bloc-right">
              <p>{{ $info->presentation }}</p>
            </div>
      </div>
      <div class="bloc">
            <div class="bloc-left">
              <p>Compétences</p>
            </div>
            <div class="bloc-right">
              <p>{{ $info->competence }}</p>
            </div>
      </div>
      <div class="bloc">
            <div class="bloc-left">
              <p>{{ $info->date_formation_1 }}<br><b>{{ $info->lieu_formation_1 }}</b></p>
            </div>
            <div class="bloc-right">
              <p>{{ $info->formation_1 }}</p>
            </div>
      </div>
      <div class="bloc">
            <div class="bloc-left">
              <p>{{ $info->date_formation_2 }}<br><b>{{ $info->lieu_formation_2 }}</b></p>
            </div>
            <div class="bloc-right">
              <p>{{ $info->formation_2 }}</p>
            </div>
      </div>
       <div class="bloc">
             <div class="bloc-left">
               <p>{{ $info->date_formation_3 }}<br><b>{{ $info->lieu_formation_3 }}</b></p>
             </div>
             <div class="bloc-right">
               <p>{{ $info->formation_3 }}</p>
             </div>
       </div>
       <div class="bloc">
             <div class="bloc-left">
               <p>{{ $info->date_formation_4 }}<br><b>{{ $info->lieu_formation_4 }}</b></p>
             </div>
             <div class="bloc-right">
               <p>{{ $info->formation_4 }}</p>
             </div>
       </div>
</div>


@endsection
