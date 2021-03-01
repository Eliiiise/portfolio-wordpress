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
        <a href="{{ $project->url_projet }}" target="_blank">Voir le projet
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"width="268.832px" height="268.832px" viewBox="0 0 268.832 268.832" style="enable-background:new 0 0 268.832 268.832;"xml:space="preserve">
           <g>
            <path d="M265.171,125.577l-80-80c-4.881-4.881-12.797-4.881-17.678,0c-4.882,4.882-4.882,12.796,0,17.678l58.661,58.661H12.5
              c-6.903,0-12.5,5.597-12.5,12.5c0,6.902,5.597,12.5,12.5,12.5h213.654l-58.659,58.661c-4.882,4.882-4.882,12.796,0,17.678
              c2.44,2.439,5.64,3.661,8.839,3.661s6.398-1.222,8.839-3.661l79.998-80C270.053,138.373,270.053,130.459,265.171,125.577z"/>
           </g>
         </svg>
        </a>
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

    <a href="{{ $project->next->link }}" class="next" >prochain projet
      <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"width="268.832px" height="268.832px" viewBox="0 0 268.832 268.832" style="enable-background:new 0 0 268.832 268.832;"xml:space="preserve">
        <g>
         <path d="M265.171,125.577l-80-80c-4.881-4.881-12.797-4.881-17.678,0c-4.882,4.882-4.882,12.796,0,17.678l58.661,58.661H12.5
           c-6.903,0-12.5,5.597-12.5,12.5c0,6.902,5.597,12.5,12.5,12.5h213.654l-58.659,58.661c-4.882,4.882-4.882,12.796,0,17.678
           c2.44,2.439,5.64,3.661,8.839,3.661s6.398-1.222,8.839-3.661l79.998-80C270.053,138.373,270.053,130.459,265.171,125.577z"/>
        </g>
      </svg>
    </a>
  </div>
</article>
