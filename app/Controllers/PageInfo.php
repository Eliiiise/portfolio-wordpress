<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PageInfo extends Controller
{
    public function info() {

        return (object) [
            'titre' => get_field('mot_du_debut'),
            'titre_split' => str_split(get_field('mot_du_debut')),
            'presentation' => get_field('presentation'),
            'competence' => get_field('competence'),
            'formation_1' => get_field('formation_1'),
            'date_formation_1' => get_field('date_formation_1'),
            'lieu_formation_1' => get_field('lieu_formation_1'),
            'formation_2' => get_field('formation_2'),
            'date_formation_2' => get_field('date_formation_2'),
            'lieu_formation_2' => get_field('lieu_formation_2'),
            'formation_3' => get_field('formation_3'),
            'date_formation_3' => get_field('date_formation_3'),
            'lieu_formation_3' => get_field('lieu_formation_3'),
            'formation_4' => get_field('formation_4'),
            'date_formation_4' => get_field('date_formation_4'),
            'lieu_formation_4' => get_field('lieu_formation_4'),
        ];
    }
}
