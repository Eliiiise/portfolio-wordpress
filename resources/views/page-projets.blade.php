@extends('layouts.app')

@include('partials.header')

@section('content')
  @includeIf('partials.responsive')

  <div class="projets resp">

  @php
    $nbProjet = 0;
  @endphp

  @foreach ( $projects as $project )
    @php
      $nbProjet++;
    @endphp

    <div class="content-projects">
      <div class="content-projects__circle"></div>

      <div class="projet js-projet" data-link="{{ $project->link }}">
        <div class="scroll">
          <img src="{{ $project->thumb }}"  alt="{{ $project->alt }}" title="{{ $project->title }}" class="image-presentation-projet js-image-presentation-projet">

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

          <p class="miniInfo js-miniInfo">
            {{ $project->date }}

            @foreach ( $project->type_split as $word )
               <br>
               {{ $word }}
            @endforeach
          </p>

          <p class="nbProjet js-npProjet">
            0{{ $nbProjet }}
          </p>
        </div>
      </div>
    </div>
  @endforeach
@endsection
