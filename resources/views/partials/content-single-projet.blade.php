<article class="resp" @php post_class() @endphp>
  <header class="{{ $project->couleur }} project">
    <h1 class="entry-title js-entry-title">{{ $project->titre }}</h1>

    <img src="{{ $project->image->url }}" alt="{{ $project->image->alt }}" title="{{ $project->image->titre }}" class="image-presentation-projet js-image-presentation-projet">
  </header>

  <div class="entry-content">
    <div class="bloc-2">
      <div class="bloc-left">
        <p>PROJET<p>
        <ul>
          <li>{{ $project->date }}</li>
          @foreach ( $project->type_split as $word )
            <li>
              {{ $word }}
            </li>
          @endforeach
        </ul>
      </div>

      <div class="bloc-right">
        <p>{{ $project->description }}</p>

        <div class="see">
          @includeIf('components.buttons', [
            'buttonsLink' => $project->url_projet,
            'buttonsIsExt' => true,
            'buttonsContent' => 'voir le projet'
          ])
        </div>
      </div>
    </div>

    <img src="{{ $project->img1->url }}" alt="{{ $project->img1->alt }}" title="{{ $project->img1->titre }}" class="img-intra" data-aos="zoom-out-up" data-aos-anchor-placement="top-bottom" data-aos-easing="ease-out-cubic"  data-aos-duration="1000">

    <div class="two-image">
      <img src="{{ $project->imgH1->url }}" alt="{{ $project->imgH1->alt }}" title="{{ $project->imgH1->titre }}" data-aos="zoom-out-up" data-aos-anchor-placement="top-bottom" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
      <img src="{{ $project->imgH2->url }}" alt="{{ $project->imgH2->alt }}" title="{{ $project->imgH2->titre }}" data-aos="zoom-out-up" data-aos-anchor-placement="top-bottom" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
      <img src="{{ $project->imgH3->url }}" alt="{{ $project->imgH3->alt }}" title="{{ $project->imgH3->titre }}" data-aos="zoom-out-up" data-aos-anchor-placement="top-bottom" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
    </div>

    <img src="{{ $project->img2->url }}" alt="{{ $project->img2->alt }}" title="{{ $project->img2->titre }}" class="img-intra" data-aos="zoom-out-up" data-aos-anchor-placement="top-bottom" data-aos-easing="ease-out-cubic" data-aos-duration="1000">

    <img src="{{ $project->imgG->url }}" alt="{{ $project->imgG->alt }}" title="{{ $project->imgG->titre }}" class="img-extra" data-aos="zoom-out-up" data-aos-anchor-placement="top-bottom" data-aos-easing="ease-out-cubic" data-aos-duration="1000">

    <div class="bloc-2">
      <div class="bloc-left">
        <p>BILAN</p>
        <ul>
          @foreach ( $project->techno_split as $word )
            <li>
              {{ $word }}
            </li>
          @endforeach
        </ul>
      </div>

      <div class="bloc-right">
        <p>{{ $project->bilan }}</p>
      </div>
    </div>

    <div class="next">
      @includeIf('components.buttons', [
        'buttonsLink' => $project->next->link,
        'buttonsIsExt' => false,
        'buttonsContent' => 'prochain projet'
      ])
    </div>
  </div>
</article>

