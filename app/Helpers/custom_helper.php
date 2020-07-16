<?php

if (! \function_exists('get_last_segment')) {
    /**
     * Get last URI segment
     *
     * @return string
     */
    function get_last_segment()
    {
        $uri = \Config\Services::uri();
        $last = $uri->getSegments();

        return end($last);
    }
}

if (! \function_exists('get_latest_news')) {
    /**
     * Get latest news
     *
     * @return array
     */
    function get_latest_news()
    {
        $news = new App\Models\NewsModel;

        return $news->getNews('latest');
    }
}