FROM ccr.ccs.tencentyun.com/tcb_prd/tcb_wafer

COPY ./nginx/* /etc/nginx/conf.d/
COPY ./src/php-weapp-demo /data/release/php-weapp-demo

EXPOSE 80
CMD ["sh", "-c", "php-fpm ; nginx -g 'daemon off;'"]
