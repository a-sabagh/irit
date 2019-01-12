<?php

function rng_admin_load_posts() {
    $search = $_POST['s'];
    $current = $_POST['current'];
    $selected = $_POST['selected'];
    $author = $_POST['author'];
    if (isset($search)) {
        $query_args = array(
            'post_type' => 'post',
            's' => $search,
            'author' => $author,
            'post__not_in' => array_merge(array($current), $selected),
            'posts_per_page' => 10
        );
        $posts = get_posts($query_args);
        if (!empty($posts) and isset($posts)) {
            $data = array();
            foreach ($posts as $post) {
                $data[] = array('id' => $post->ID, 'text' => $post->post_title);
            }
            echo json_encode($data);
        }
    }
    wp_die();
}

add_action("wp_ajax_rngadmin_related_posts", "rng_admin_load_posts");

