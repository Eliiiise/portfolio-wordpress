@extends('layouts.app')

@include('partials.header')

@section('content')
  @includeIf('partials.responsive')

  <div class="projets resp">

  @foreach ( $projects as $project )

    <div class="content-projects">
      <div class="content-projects__circle"></div>

      <div class="projet js-projet">
        <div class="scroll">
          <img src="{{ $project->thumb }}"  alt="{{ $project->alt }}" title="{{ $project->title }}" class="image-presentation-projet js-image-presentation-projet">

          <span class="js-span-title-project span-title-project">
            <h1>
              @php
              $cpt = 0
              @endphp
              @foreach ( $project->name_split as $letter )
                @php
                  $cpt += 50
                @endphp
                <span>
                  <h1 class="js-letter-project">
                    {{ $letter }}
                  </h1>
                </span>
              @endforeach
            </h1>

            <div class="miniInfo js-miniInfo">

              <p>
                {{ $project->date }}

                @foreach ( $project->type_split as $word )
                  <br>
                  {{ $word }}
                @endforeach
              </p>

              @includeIf('components.buttons', ['buttonsLink' => $project->link])
            </div>
          </span>
        </div>
      </div>
    </div>
  @endforeach
@endsection
