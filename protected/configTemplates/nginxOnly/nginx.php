# This is a template for nginx only config

server {
	listen   80; ## listen for ipv4; this line is default and implied
	#listen   [::]:80 default ipv6only=on; ## listen for ipv6
	

	root /home/<?php echo $platform->systemUser;?>/sites/<?php echo $site->name;?>/htdocs;
	index index.php index.html index.htm;

	# configure logs
	access_log /home/<?php echo $platform->systemUser;?>/sites/<?php echo $site->name;?>/logs/access.log;
	error_log /home/<?php echo $platform->systemUser;?>/sites/<?php echo $site->name;?>/logs/error.log notice;

	server_name <?php echo $site->name;?> alias <?php echo $site->aliases;?>;

	# by default forward request to index php
	set $app_bootstrap "index.php";
	location / {

		try_files $uri $uri/ /$app_bootstrap?$args;
		
	}

	# uncomment, if you want non-www to www redirect
	# if ($host !~* ^www\.) {
	#     rewrite ^(.*)$ http://www.$host$1 permanent;
	# }

	# pass the PHP scripts to FastCGI server listening on 127.0.0.1:9009
	#
	location ~ \.php$ {
		fastcgi_index index.php;
		include fastcgi_params;
		fastcgi_param SCRIPT_FILENAME	$document_root$fastcgi_script_name;
	#	fastcgi_read_timeout 600;

		fastcgi_param PATH_INFO	$fastcgi_path_info;
		fastcgi_pass unix:/var/run/php5-fpm/netplant-<?php echo $platform->systemUser;?>.socket;
	#	fastcgi_ignore_client_abort on;
	#	fastcgi_buffers 8 32k;
	#  	fastcgi_buffer_size 64k;

	}

	# serve static files properly
	location ~* \.(jpg|jpeg|gif|png|ico|css|js|txt)$ {
			access_log off;
			expires 30d;
	}
	# deny access to .htaccess files, if Apache's document root
	# concurs with nginx's one
	#
	location ~ /\.ht {
		deny all;
		return 404;
	}
	
	# deny access to vcs-related files, just for sure.
	location ~ /\.git {
	    deny all;
	    return 404;
	}
	location ~ /\.svn {
	    deny all;
	    return 404;
	}
	
}