<section class="single-comment-form">
    <?php
    $html_req = ( $req ? " required='required'" : '' );
    $commenter = wp_get_current_commenter();
    $fields = array(
        'author' => '<div class="row">'
        . '<div class="col-md-6 comment-form-author">'
        . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $html_req . ' placeholder="نام (الزامی)" >'
        . '</div>',
        'email' => '<div class="col-md-6 comment-form-email">'
        . '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $html_req . ' placeholder="ایمیل (الزامی)">'
        . '</div>'
        . '</div>'
    );
    $comment_args = array(
        'fields' => $fields,
        'comment_field' => '<div class="comment-form-comment" >'
        . '<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required" placeholder="متن دیدگاه" ></textarea>'
        . '</div>'
    );
    comment_form($comment_args, get_the_ID());
    ?>
</section>
<!--.single-comment-form-->