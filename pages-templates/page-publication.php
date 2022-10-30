<?php
/**
 * Template Name: Publication page
 */

get_header('home');
?>

<div class="cards">
    <?php
        $cards_posts = get_posts( array(
            'numberposts' => 0, //без ограничения кол-во постов
            'category'    => 0,
            'post_type'   => 'publication',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ) );

        global $post;

        foreach( $cards_posts as $post ){
            setup_postdata( $post );
            ?>
            <a class="card cadr_firstcard">
                <div class="card-header">
                <h3 class="title"><?php echo the_title(); ?></h3>
                </div>
                <div class="card-hero">
                    <?php echo the_post_thumbnail(); ?>
                </div>
            </a>
            <?php
        }

        wp_reset_postdata(); // сброс
    ?>
</div>

<?php
get_footer('home');?>