<?php

if (! function_exists('get_last_segment'))
{
	/**
	 * Get last URI segment
	 *
	 * @param array  $array
	 *
	 * @return mixed|null
	 */
	function get_last_segment() {
        $uri = service('uri');
        $last = $uri->getSegments();

        return end($last);
	}
}