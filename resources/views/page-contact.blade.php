@extends('layouts.app')

@include('partials.header')

@section('content')
  @includeIf('partials.responsive')

  <div class="contact resp">
    <div class="title">
      @foreach ( $contact->titre_split as $letter )
        <span>
          <h1 class="js-letter-project">
            {{ $letter }}
          </h1>
        </span>
      @endforeach
    </div>

    <div class="link-contact">
      @if ( $contact->email )
        <p>-</p><a href="mailto:{{ $contact->email }}">Email</a><p>-</p>
      @endif

      @if ( $contact->linkedin )
        <a href="{{ $contact->linkedin }}" target="_blank">Linkedin</a><p>-</p>
      @endif

      @if ( $contact->tel )
        <a href="{{ $contact->tel }}">T.E.L</a><p>-</p>
      @endif

      @if ( $contact->github )
        <a href="{{ $contact->github }}" target="_blank">Github</a><p>-</p>
      @endif

      @if ( $contact->instagram )
        <a href="{{ $contact->instagram }}" target="_blank">Insta</a><p>-</p>
      @endif
    </div>
  </div>
@endsection
