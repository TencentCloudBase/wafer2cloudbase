FROM ccr.ccs.tencentyun.com/tcb_prd/tcb_wafer

COPY ./src/node-weapp-demo /data/release/node-weapp-demo
COPY ./nginx/* /etc/nginx/conf.d/

EXPOSE 80
CMD ["sh", "-c", "nginx; cd /data/release/node-weapp-demo ; npm start"]
