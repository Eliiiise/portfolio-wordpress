<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')

  <body @php body_class() @endphp>
    {{--<canvas width=32 height=32></canvas>--}}
    @php do_action('get_header') @endphp
    <div role="document" class="document">
      <div class="content">
        <main id="swup" class="main transition-fade">
          @yield('content')
        </main>
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @php wp_footer() @endphp
  </body>
</html>
