@extends('layouts.app')

@section('content')

      <div class="transition"></div>
      <div class="projets">

      @php
        $nbProjet = 0;
      @endphp



      @foreach ( $projects as $project )
        @php
          $nbProjet++;
        @endphp
          <div class="content-projects">
             <div class="projet js-projet">
              <div class="scroll">
                  <img src="{{ $project->thumb }}" alt="{{ $project->alt }}" title="{{ $project->title }}" data-link="{{ $project->link }}"class="image-presentation-projet js-image-presentation-projet">
                  <span class="js-span-title-project span-title-project">
                    <h1>
                     @foreach ( $project->name_split as $letter )
                      <span>
                        <h1 class="js-letter-project">
                          {{ $letter }}
                        </h1>
                      </span>
                     @endforeach
                    </h1>
                  </span>
                  <p class="miniInfo js-miniInfo">{{ $project->type }} - {{ $project->date }}<br>Projet 0{{ $nbProjet }}</p>
                  <p class="nbProjet js-npProjet">0{{ $nbProjet }}</p>
                </div>
             </div>
          </div>


       @endforeach

@endsection
