<?php

class FCL_Public {
    public function __construct() {
        add_filter('the_excerpt_rss', [$this, 'modify_feed_content']);
        add_filter('the_content_feed', [$this, 'modify_feed_content']);
    }

    public function modify_feed_content($content) {
        $word_limit = get_option('fcl_word_limit', 50);
        $link_text = get_option('fcl_link_text', 'Read More');

        // Split the content into words
        $words = explode(' ', strip_tags($content));

        // If content exceeds the word limit, truncate and add a link
        if (count($words) > $word_limit) {
            $truncated = array_slice($words, 0, $word_limit);
            $content = implode(' ', $truncated) . '... ';
            $content .= '<a href="' . get_permalink() . '">' . esc_html($link_text) . '</a>';
        }

        return $content;
    }
}
