<?php

function rng_admin_load_related_posts() {
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
            'posts_per_page' => 15
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

function rng_admin_load_posts() {
    $search = $_POST['s'];
    $selected = $_POST['selected'];
    if (isset($search)) {
        $query_args = array(
            'post_type' => 'post',
            's' => $search,
            'post__not_in' => $selected,
            'posts_per_page' => 15
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

function rng_admin_load_products() {
    $search = $_POST['s'];
    $selected = $_POST['selected'];
    if (isset($search)) {
        $query_args = array(
            'post_type' => 'product',
            's' => $search,
            'post__not_in' => $selected,
            'posts_per_page' => 15
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

function rng_admin_load_categories() {
    $search = $_POST['s'];
    $selected = $_POST['selected'];
    if(isset($search)){
        $term_args = array(
            'name__like' => $search,
            'exclude' => $selected
        );
        $terms = get_terms('category', $term_args);
        $data = array();
        foreach($terms as $term){
            $data[] = array('id' => $term->term_id,'text' => $term->name);
        }
        echo json_encode($data);
    }
    wp_die();
}

add_action("wp_ajax_rngadmin_related_posts", "rng_admin_load_related_posts");
add_action("wp_ajax_rng_ajax_call_posts", "rng_admin_load_posts");
add_action("wp_ajax_rng_ajax_call_products", "rng_admin_load_products");
add_action("wp_ajax_rng_ajax_call_categories", "rng_admin_load_categories");

