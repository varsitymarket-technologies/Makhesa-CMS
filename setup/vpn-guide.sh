#!/bin/bash

# Check if user is root
if [ "$EUID" -ne 0 ]; then 
  echo "Please run as root (use sudo)"
  exit
fi

# Parameters
DOMAIN=$1          # e.g., example.co.za
TUNNEL_PORT=$2    # e.g., 8080
OFFLINE_PORT=$3   # e.g., 8081
OFFLINE_PATH=$4   # e.g., /var/www/html/offline/

if [ -z "$DOMAIN" ] || [ -z "$TUNNEL_PORT" ] || [ -z "$OFFLINE_PORT" ] || [ -z "$OFFLINE_PATH" ]; then
    echo "Usage: ./vpn-guide.sh <domain> <tunnel_port> <offline_port> <offline_path>"
    echo "Example: ./vpn-guide.sh example.co.za 8080 8081 /var/www/html/offline/"
    exit 1
fi

echo "Setting up configuration for $DOMAIN..."

# 1. Create Offline Directory and a dummy index file if it doesn't exist
mkdir -p "$OFFLINE_PATH"
if [ ! -f "$OFFLINE_PATH/index.html" ]; then
    echo "<html><body><h1>System Offline</h1><p>The local tunnel is currently disconnected.</p></body></html>" > "$OFFLINE_PATH/index.html"
fi
chown -R www-data:www-data "$OFFLINE_PATH"

# 2. Generate Nginx Config
NGINX_CONF="/etc/nginx/sites-available/$DOMAIN"

cat <<EOF > "$NGINX_CONF"
upstream tunnel_backend {
    server 127.0.0.1:$TUNNEL_PORT max_fails=1 fail_timeout=10s;
    server 127.0.0.1:$OFFLINE_PORT backup;
}

server {
    listen 80;
    server_name $DOMAIN;

    location / {
        proxy_pass http://tunnel_backend;
        proxy_set_header Host \$host;
        proxy_set_header X-Real-IP \$remote_addr;
        proxy_set_header X-Forwarded-For \$proxy_add_x_forwarded_for;
        proxy_next_upstream error timeout invalid_header http_502 http_504;
    }
}

server {
    listen 127.0.0.1:$OFFLINE_PORT;
    server_name localhost;

    location / {
        root $OFFLINE_PATH;
        index index.html;
    }
}
EOF

# 3. Enable site and restart Nginx
ln -sf "$NGINX_CONF" "/etc/nginx/sites-enabled/"
nginx -t && systemctl reload nginx

echo "Setup complete! Domain $DOMAIN is now routing to :$TUNNEL_PORT with fallback to :$OFFLINE_PORT"