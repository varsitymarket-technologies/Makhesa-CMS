#!/bin/bash

# --- Configuration ---
CUSTOM_IMAGE="sigblue/apache-php:83-full" # <-- REPLACE THIS with your application's Docker image name
COMPOSE_DIR="./../"
PROXY_NETWORK="vm-proxy" # The name of the network created by the nginx-proxy-automation setup
# ---------------------

# 1. Input Validation
if [ -z "$1" ]; then
    echo "Usage: $0 <DOMAIN_NAME>"
    echo "Example: $0 example.com"
    exit 1
fi

DOMAIN=$1
SERVICE_NAME=$(echo "$DOMAIN" | tr '.' '-' | tr '[:upper:]' '[:lower:]') # Converts domain to a safe container/service name (e.g., levidoc-co-za)
COMPOSE_FILE="$COMPOSE_DIR/$SERVICE_NAME.yml"

echo "--- Starting Automated Deployment for $DOMAIN ---"

# 2. Prepare Directory
mkdir -p "$COMPOSE_DIR"
echo "Creating deployment file: $COMPOSE_FILE"

# 3. Dynamic Docker Compose File Generation (The core automation step)
cat <<EOF > "$COMPOSE_FILE"
version: '3.8'

services:
  $SERVICE_NAME:
    image: $CUSTOM_IMAGE
    container_name: app-$SERVICE_NAME
    restart: always
    environment:
      # NGINX PROXY AUTOMATION VARIABLES
      - VIRTUAL_HOST=$DOMAIN
      - LETSENCRYPT_HOST=$DOMAIN
      - LETSENCRYPT_EMAIL=admin@$DOMAIN # Use a common admin email or set one specifically
      # If your custom app needs a specific port (e.g., 8080 instead of 80):
      # - VIRTUAL_PORT=8080
      # gd is already included here, along with other specified extensions
      PHP_EXTENSIONS: pgsql gettext imap sockets zip curl dom gd exif intl mbstring bcmath opcache soap xml xmlrpc fileinfo pdo_sqlite pdo_mysql pdo_pgsql
      PECL_EXTENSION: sodium
      STARTUP_COMMAND_1: composer install

    networks:
      - $PROXY_NETWORK

networks:
  $PROXY_NETWORK:
    external: true

EOF

# 4. Deployment Execution
echo "Deploying container using Docker Compose..."
# Using 'docker compose' (the new syntax) instead of 'docker-compose' (old syntax)
docker compose -f "$COMPOSE_FILE" up -d

if [ $? -eq 0 ]; then
    echo ""
    echo "Success! Website $DOMAIN is being deployed."
    echo "    - Service Name: $SERVICE_NAME"
    echo "    - Compose File: $COMPOSE_FILE"
    echo "    - The Nginx Proxy will automatically provision HTTPS (might take a minute)."
else
    echo "ERROR: Docker Compose deployment failed."
fi