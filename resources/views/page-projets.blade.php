@extends('layouts.app')

@section('content')

      <div class="projets">

      @php
        $nbProjet = 0;
      @endphp



      @foreach ( $projects as $project)
        @php
          $nbProjet++;
        @endphp
          <div class="content-projects">
           <div class="projet js-projet">
            <div class="scroll">
              <div class="content-project">
                  <a href="{{ $project->link }}">
                    <img src="{{ $project->thumb }}" alt="{{ $project->alt }}" title="{{ $project->title }}" class="image-presentation-projet js-image-presentation-projet">
                  </a>
                  <span class="js-span-title-project">
                    <h1 class="js-title-project js-hidden no-hidden">{{ $project->name }}</h1>
                  </span>
                  <p class="miniInfo js-miniInfo">{{ $project->type }} - {{ $project->date }}<br>Projet 0{{ $nbProjet }}</p>
                  <p class="nbProjet js-npProjet">0{{ $nbProjet }}</p>
                </div>
              </div>
           </div>
          </div>


       @endforeach


       </div>

@endsection
