# fmh
## Nginx
如果你使用的是 Nginx，在你的站点配置中加入以下内容，它将会将所有请求都引导到 index.php 前端控制器：  

``
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
``
# test
