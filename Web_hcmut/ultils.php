<?php

function displayStar($avg)
{
    for ($i = $avg; $i > $avg - 5; $i--) {
        if ($i >= 1) {
            echo '<i class="fa fa-star"></i>';
        } elseif ($i >= 0.5) {
            echo '<i class="fa fa-star-half-o"></i>';
        } else {
            echo '<i class="fa fa-star-o"></i>';
        }
    }
}
