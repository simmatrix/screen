<?php

return [

	/**
	 * You can change the where the PhantomJS binary file is.
	 */
	'bin_location' 		=> '/usr/local/share/phantomjs-2.1.1-linux-x86_64/bin/',

	/**
	 * You can also Change the jobs location
	 */
	'jobs_location' 	=> storage_path('app/public/screen-capture/jobs/'),

	/**
	 * This set a location, of which the screenshot images can be obtained
	 */
	'output_location' 	=> storage_path('app/tmp/screen-capture/'),

];
