@extends('layouts.app')

@include('partials.header')

@section('content')
  @includeIf('partials.responsive')

  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single-'.get_post_type())
  @endwhile
@endsection
