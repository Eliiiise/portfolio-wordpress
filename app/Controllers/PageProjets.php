<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PageProjets extends Controller
{
    public function projects()
    {
          $args = [
              'posts_per_page' => -1,
              'offset' => 0,
              'orderby' => 'date',
              'order' => 'DESC',
              'post_type' => 'projet'
           ];

           $the_query = new \WP_Query($args);
           $projects = [];

           if ( $the_query->post_count > 0 )
           {
                $projects = array_map(function($project){
                    $name = get_field('titre_du_projet', $project);
                    $name_split = str_split(get_field('titre_du_projet', $project));
                    $type = get_field('type_de_projet', $project);
                    $date = get_field('date_du_projet', $project);
                    $image = get_field('image_du_projet', $project);
                    $link = get_post_permalink($project);

                    // vars

                    $url =  $image['url'];
                    $title = $image['title'];
                    $alt = $image['alt'];

                    // thumbnail, medium, large

                    $size = 'large';
                    $thumb = $image['sizes'][$size];
                    $width = $image['sizes'][$size. '-width'];
                    $height = $image['sizes'][$size. '-height'];

                    return (object)[
                        'url' => $url,
                        'title' => $title,
                        'alt' => $alt,
                        'thumb' => $thumb,
                        'width' => $width,
                        'height' => $height,
                        'name' => $name,
                        'name_split' => $name_split,
                        'type' => $type,
                        'date' => $date,
                        'link' => $link
                    ];

                }, $the_query->posts);

                wp_reset_postdata();

           }

            return $projects;

    }
}
