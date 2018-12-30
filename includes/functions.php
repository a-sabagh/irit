<?php

function custom_excerpt($count) {
    $output = get_the_content();
    $output = strip_tags($output);
    $output = mb_substr($output, 0, $count);
    $output = mb_substr($output, 0, mb_strrpos($output, " "));
    $output .= "...";
    return $output;
}

function slider_excerpt() {
    return custom_excerpt(200);
}

function archive_excerpt() {
    return custom_excerpt(200);
}

function title_excerpt() {
    return custom_excerpt(40);
}

function alt_excerpt() {
    return custom_excerpt(100);
}

function related_excerpt() {
    return custom_excerpt(120);
}

function course_excerpt() {
    return custom_excerpt(150);
}

function share_excerpt() {
    return custom_excerpt(140);
}

/**
 * rangraz pagination
 */
if (!function_exists("irtt_pagination")) {

    function irtt_pagination($wp_query = null) {
        if (!isset($wp_query)) {
            global $wp_query;
        }

        $q = (int) $wp_query->max_num_pages;
        $p = 7;
        $n = (get_query_var("paged")) ? get_query_var("paged") : 1;

        if ($n < ($p / 2) || $p > $q) {
            $start = 1;
            $end = (int) ($p > $q) ? $q : $p;
        } elseif ($n + ($p / 2) > $q) {
            $start = (int) $q - $p + 1;
            $end = (int) $q;
        } else {
            $start = (int) ( $n - floor($p / 2));
            $end = (int) ($n + floor($p / 2));
        }
        echo '<ul class="pagination pagination-border">';
        for ($i = $start; $i <= $end; $i++):
            $active = ($i == $n) ? 'class="active"' : '';
            echo '<li><a ' . $active . ' title="' . $i . '" href="' . add_query_arg(array('paged' => $i)) . '">' . $i . '</a></li>';
        endfor;
        echo '</ul>';
    }

}


/*
 * rangraz breadcrumbs
 */

if (!function_exists("irtt_breadcrumbs")) {

    function irtt_breadcrumbs() {
        $bd = array(
            array(
                'title' => get_bloginfo('blogname'),
                'link' => get_home_url()
            )
        );

        if (is_single()) {

            $post = get_queried_object();
            $bd_post = array(
                'title' => $post->post_title,
                'link' => '#'
            );
            $categories = get_the_category($post->ID);
            $category = current($categories);
            $bd_category = array(
                'title' => $category->name,
                'link' => get_category_link($category)
            );
            array_push($bd, $bd_category, $bd_post);
        } elseif (is_archive()) {
            $category = get_queried_object();
            $bd_category = array(
                'title' => $category->name,
                'link' => '#'
            );
            array_push($bd, $bd_category);
        }
        ?>
        <nav class="breadcrumbs-wrapper">
            <ul>
                <?php
                foreach ($bd as $bd_item):
                    if ($bd_item['link'] == '#') {
                        echo '<li class="last-item">' . $bd_item['title'] . '</li>';
                    } else {
                        echo '<li><a titel=" ' . $bd_item['title'] . ' " href="' . $bd_item['link'] . '">' . $bd_item['title'] . '</a></li>';
                    }
                endforeach;
                ?>
            </ul>
        </nav>
        <?php
    }

}

