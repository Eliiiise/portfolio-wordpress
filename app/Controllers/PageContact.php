<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PageContact extends Controller
{
    public function contact() {

        return (object) [
            'titre' => get_field('titre'),
            'titre_split' => str_split(get_field('titre')),
            'instagram' => get_field('instagram'),
            'email' => get_field('email'),
            'github' => get_field('github'),
            'tel' => get_field('tel'),
            'linkedin' => get_field('linkedin')
        ];
    }
}
