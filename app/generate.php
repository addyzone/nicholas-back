<?php
	
// Convert markdown to HTML
function convert_markdown($content) {
	$markdown = new ParsedownExtra();	
	$content = $markdown->text($content);
	return $content;
}

// Convert array of posts into JSON
function generate_json($posts) {
    return json_encode($posts, JSON_PRETTY_PRINT);
}

// Convert array of posts into RSS
function generate_rss($posts) {
    $feed = new Suin\RSSWriter\Feed();
    $channel = new Suin\RSSWriter\Channel();

    $channel
        ->title(BLOG_NAME)
        ->description(BLOG_DESCRIPTION)
        ->appendTo($feed);

    foreach($posts as $p){
        $item = new Suin\RSSWriter\Item();
        $item
            ->title($p->title)
            ->description($p->body)
            ->appendTo($channel);
    }

    return $feed;
}