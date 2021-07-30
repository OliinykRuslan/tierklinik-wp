<?php
/**
 * Template name: Vocabulary Template
 */

$query = new WP_Query;

$q_args = array(
    'post_per_page' => -1,
    'post_type' => 'vocabulary',
    'orderby'   => 'name',
    'order'     => 'ASC'
);
$vocabulary_q = $query->query($q_args);
get_header(); ?>


<section>
    <div class="container mx-auto">

        <!-- alphabet  -->
        <ul class="alphabet">
            <li>A</li>
            <li>B</li>
            <li>C</li>
            <li>D</li>
            <li class="disabled">E</li>
            <li>F</li>
            <li class="disabled">G</li>
            <li>H</li>
            <li>I</li>
            <li>J</li>
            <li>K</li>
            <li>L</li>
            <li>M</li>
            <li class="disabled">N</li>
            <li>O</li>
            <li>P</li>
            <li>Q</li>
            <li>R</li>
            <li>S</li>
            <li class="disabled">T</li>
            <li>U</li>
            <li>V</li>
            <li>W</li>
            <li class="disabled">X</li>
            <li>Y</li>
            <li>Z</li>
        </ul>
        


        <?php
        function get_fist_letter($str){
            return strtolower(substr($str, 0, 1));
        }


        $container_id = null;
        $before = '</div>';
        $next_post = false;
        $prev_post = false;
        $previous_letter = null;
        $cont = count($vocabulary_q);
        foreach($vocabulary_q as $key => $item){
            $current_title = $item->post_title;
            $first_letter = substr($current_title, 0, 1);
            $container_id = 'let_'.get_fist_letter($current_title);
            $after = sprintf('<div class="vocabulary_single_group" id="%s">', $container_id);
            $letter_container = sprintf('<div class="letter_container">%s</div>', $first_letter);
            $cont = '<div class="vocabulary_item"><h3 class="vocabulary_item_title">'.$current_title.'</h3>'.$item->post_content.'</div>';
            if (is_null($previous_letter)) {
                $previous_letter = get_fist_letter($current_title);
                echo $after;
                echo $letter_container;
                echo '<div class="voc_items">';
                echo $cont;
            }elseif($previous_letter !== get_fist_letter($current_title)){
                    $previous_letter = get_fist_letter($current_title);
                    echo $before;
                    echo $before;
                    echo $after;
                    echo $letter_container;
                    echo '<div class="voc_items">';
                    echo $cont;
            }elseif($previous_letter == get_fist_letter($current_title)){
                echo $cont;
            }
            if($cont == $key+1){
                echo $before;
            }
        } ?>
    </div>
</section>
    <?php
get_footer();