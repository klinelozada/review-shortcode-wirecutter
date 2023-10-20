<?php

function rp__review_sc($atts, $content = null) {

    static $count = 0; // Initialize and increment the count

    $count++; // Increment the count for each instance

    $atts = shortcode_atts(
        array(
            'item_label' => 'Our Pick',
            'item_title' => 'Nest Bedding Easy Breather Pillow',
            'item_tags' => 'A high-quality layered-foam pillow',
            'item_button_1' => '$179 from Tempur-Pedic, queen size, https://www.nytimes.com/wirecutter/out/link/32745/154073/4/109235?merchant=Tempur-Pedic',
            'item_button_2' => '',
            'item_image' => 'https://d1b5h9psu9yexj.cloudfront.net/32745/Tempur-Pedic-Tempur-Adapt-Pro---Cooling-Pillow--mid-density-_20190603-155806_full.jpeg',
            'item_link' => 'https://www.nytimes.com/wirecutter/out/link/32745/154073/4/109235?merchant=Tempur-Pedic',
        ),
        $atts,
        'rp__review_sc'
    );

    $item_label = $atts['item_label'];
    $item_title = $atts['item_title'];
    $item_tags = explode(', ', $atts['item_tags']);
    $item_button_1 = explode(', ', $atts['item_button_1']);
    $item_button_2 = explode(', ', $atts['item_button_2']);
    $item_image = $atts['item_image'];
    $item_link = $atts['item_link'];

    // Item Review Container with data-count attribute
    $html = '<div class="review-card-container" data-count="' . $count . '">';

    // Header
    $html .= '<div class="review-header">';
    $html .= '<div class="review-winner"><strong>' . esc_html($item_label) . '</strong></div>';
    $html .= '</div>';

    // Item Review
    $html .= '<div class="review-info">';
    $html .= '<div class="review-col review-image">';
    $html .= '<a href="' . esc_url($item_link) . '"><img src="' . esc_url($item_image) . '"></a>';
    $html .= '</div>';

    $html .= '<div class="review-col review-description">';
    $html .= '<div class="review-title"><a href="' . esc_url($item_link) . '">' . esc_html($item_title) . '</a></div>';
    $html .= '<div class="review-tags">';

    foreach ($item_tags as $tag) {
        $html .= '<span class="tag">' . esc_html($tag) . '</span>, ';
    }

    $html .= '</div>';

        $html .= do_shortcode($content);

        $html .= '<div class="review-links">';

        // Check if item_button_1 exists
        if (!empty($item_button_1[0])) {
            $html .= '<a href="' . esc_url($item_button_1[2]) . '" class="review-link">' . esc_html($item_button_1[0]) . '<br/>(' . esc_html($item_button_1[1]) . ')</a>';
        }

        // Check if item_button_2 exists
        if (!empty($item_button_2[0])) {
            $html .= '<a href="' . esc_url($item_button_2[1]) . '" class="review-link">' . esc_html($item_button_2[0]) . '</a>';
        }

        $html .= '</div>';

    $html .= '</div>';

    $html .= '</div>';

    $html .= '</div>';

    return $html;

}

add_shortcode( 'rp__review', 'rp__review_sc' );