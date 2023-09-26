<?php


namespace App\Assistants\Calculators;


use App\Models\Elements\Art;
use App\Models\Elements\Post;

class ViewsCalculator
{
    public static function calculateViews($posts, $arts)
    {
        $viewsCount = 0;

        foreach ($posts as $post) {
            $viewsCount += $post->getViews();
        }

        foreach ($arts as $art) {
            $viewsCount += $art->getViews();
        }

        return $viewsCount;
    }
}
