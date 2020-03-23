<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleProjet extends Controller
{
    public function project() {


        return (object) [
            'titre' => get_field('titre_du_projet', get_the_ID()),
            'titre_split' => str_split(get_field('titre_du_projet', get_the_ID())),
            'image' => $this->getImage(get_the_ID(),'image_du_projet'),
            'img1' => $this->getImage(get_the_ID(),'img_1'),
            'img2' => $this->getImage(get_the_ID(),'img_2'),
            'imgH1' => $this->getImage(get_the_ID(),'img_haut_1'),
            'imgH2' => $this->getImage(get_the_ID(),'img_haut_2'),
            'imgH3' => $this->getImage(get_the_ID(),'img_haut_3'),
            'imgG' => $this->getImage(get_the_ID(),'g_img'),
            'date' => get_field('date_du_projet', get_the_ID()),
            'type' => get_field('type_de_projet', get_the_ID()),
            'description' => get_field('description_du_projet', get_the_ID()),
            'techno' => get_field('technologie_du_projet', get_the_ID()),
            'couleur' => get_field('couleur', get_the_ID()),
            'bilan' => get_field('bilan_du_projet', get_the_ID()),
            'url-projet' => get_field('url_du_projet', get_the_ID()),
            'retour' => get_field('projets', get_the_ID()),
            'next' => $this->getNextProject(get_field('titre_du_projet', get_the_ID()))
        ];
    }

    protected function getImage($id,$nom) {

        $image = get_field($nom, $id);
         // vars
        $url =  $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];

        // thumbnail, medium, large
        $size = 'large';
        $thumb = $image['sizes'][$size];
        $width = $image['sizes'][$size. '-width'];
        $height = $image['sizes'][$size. '-height'];

        return (object) [
            'url' => $url,
            'title' => $title,
            'alt' => $alt,
            'thumb' => $thumb,
            'width' => $width,
            'height' => $height
        ];
    }

    protected function getNextProject($nameAct) {

          $args = [
             'posts_per_page' => -1,
             'offset' => 0,
             'orderby' => 'date',
             'order' => 'DESC',
             'post_type' => 'projet'
          ];

          $the_query = new \WP_Query($args);
          $projects = [];
          $cpt = 0;
          $nbProject = 0;

          if ( $the_query->post_count > 0 )
          {
               $projects = array_map(function($project){
                   $name = get_field('titre_du_projet', $project);
                   $link = get_post_permalink($project);

                   return (object)[
                       'name' => $name,
                       'link' => $link
                   ];


               }, $the_query->posts);

               wp_reset_postdata();
          }

       foreach ($projects as $project){
            if ( $cpt == 1 ) {
                   return $project;
            }
           if ( $project->name == $nameAct ) {
                $cpt = 1;
           }
       }
    return $projects[0];
    }
}
