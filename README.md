This is yii2 framework learn cookbook tests

 hosts:
 	api.dev
 	frontend.dev
 	backend.dev
 
 ubuntu 15.10:
 	touch api.dev
 	/etc/nginx/sites-available/api.dev 
 	cd /etc/nginx/sites-enabled
 	sudo ln -s /etc/nginx/sites-available/api.dev api.dev
 	sudo systemctl restart nginx
 	
 nginx api.dev:
 	server {
        listen       80;
        server_name  api.dev ;
        root   "/home/liner/Develop/windows_mount/xampp/htdocs/advanced/api/web";
	index  index.html index.htm index.php;
	
        location / {
            try_files $uri $uri/ /index.php?_url=$uri&$args;
	    #autoindex  on;
        }
        location ~ \.php(.*)$ {
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_index  index.php;
	    #fastcgi_split_path_info       ^(.+\.php)(/.+)$;
            fastcgi_split_path_info  ^((?U).+\.php)(/?.+)$;
            fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
            fastcgi_param  PATH_INFO  $fastcgi_path_info;
            fastcgi_param  PATH_TRANSLATED  $document_root$fastcgi_path_info;
            include        fastcgi_params;
        }
	}