<article @php post_class() @endphp>
  <header class="{{ $project->couleur }} project">
    <h1 class="entry-title js-entry-title">{{ $project->titre }}</h1>
    <image src="{{ $project->image->url }}" alt="{{ $project->image->alt }}" title="{{ $project->image->titre }}" class="image-presentation-projet js-image-presentation-projet">
  </header>
  <div class="entry-content">
    <div class="bloc">
      <div class="bloc-left">
        <p>{{ $project->type }}<br>{{ $project->date }}</p>
        <a href="{{ $project->url-projet }}">Visiter le site</a>
      </div>
      <div class="bloc-right">
        <p>{{ $project->description }}</p>
      </div>
    </div>
    <image src="{{ $project->img1->url }}" alt="{{ $project->img1->alt }}" title="{{ $project->img1->titre }}" class="img-intra" data-aos="zoom-out-up" data-aos-anchor-placement="top-bottom" data-aos-easing="ease-out-cubic"  data-aos-duration="1000">
    <div class="two-image">
      <image src="{{ $project->imgH1->url }}" alt="{{ $project->imgH1->alt }}" title="{{ $project->imgH1->titre }}" data-aos="zoom-out-up" data-aos-anchor-placement="top-bottom" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
      <image src="{{ $project->imgH2->url }}" alt="{{ $project->imgH2->alt }}" title="{{ $project->imgH2->titre }}" data-aos="zoom-out-up" data-aos-anchor-placement="top-bottom" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
      <image src="{{ $project->imgH3->url }}" alt="{{ $project->imgH3->alt }}" title="{{ $project->imgH3->titre }}" data-aos="zoom-out-up" data-aos-anchor-placement="top-bottom" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
    </div>
    <image src="{{ $project->img2->url }}" alt="{{ $project->img2->alt }}" title="{{ $project->img2->titre }}" class="img-intra" data-aos="zoom-out-up" data-aos-anchor-placement="top-bottom" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
    <image src="{{ $project->imgG->url }}" alt="{{ $project->imgG->alt }}" title="{{ $project->imgG->titre }}" class="img-extra" data-aos="zoom-out-up" data-aos-anchor-placement="top-bottom" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
    <div class="bloc">
        <div class="bloc-left">
          <p>Technologies<br>{{ $project->techno }}</p>
        </div>
        <div class="bloc-right">
          <p>{{ $project->bilan }}</p>
        </div>
      </div>
      <a href="{{ $project->next->link }}" class="next" >suite > {{ $project->next->name }}</a>
  </div>

</article>
