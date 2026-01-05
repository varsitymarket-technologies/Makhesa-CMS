# Docker VM.MAKHESA Installation

## Docker Installation
If you have docker installed the following installation will work for you. 

## About This Installation

Setting up a reverse proxy with Nginx and Docker is a classic, robust way to manage web traffic. This configuration allows Nginx to handle SSL (if needed) and domain routing while your Docker container focuses on the application logic.

### Steps & Procedure 

Navigate to the root of your project, where the setup folder is located, open that directory. Change the Runing Port if you dont prefer runing on 9000. But for the default it will be port 9000.

### 1. Run The Docker Guide File
This file is an automated file for deploying your websites,  

```bash
sudo ./docker-guide.sh shabang.co.za
```

1. Prepare the Web Application (Docker)
First, ensure your web application is running and accessible on port 9000. If you haven't started it yet, you can run it using this command:


#### 2. Confirm the runing docker container 
```bash
docker ps 
```
Once The container is runing and the ports exposed check for the following 

if this image is the first thing you see, make sure the file system is accessible 
```bash
sudo chmod -R 777 ./
```

Here is a step-by-step guide to getting this running.

Bash

docker run -d \
  --name my-web-app \
  -p 9000:9000 \
  --restart always \
  your-image-name
Note: Even though we are proxying, mapping the port to the host (-p 9000:9000) allows you to test if the app is working locally before involving Nginx.

2. Configure Nginx
You need to create a server block (virtual host) to tell Nginx to send traffic from test.levidoc.co.za to your Docker container.

Create a new configuration file: sudo nano /etc/nginx/sites-available/test.levidoc.co.za

Paste the following configuration:

Nginx

server {
    listen 80;
    server_name test.levidoc.co.za;

    location / {
        proxy_pass http://127.0.0.1:9000;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
    }
}
Enable the configuration and restart Nginx:

Bash

sudo ln -s /etc/nginx/sites-available/test.levidoc.co.za /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
3. Network & Firewall Checklist
To ensure the connection works, verify the following:

DNS: Ensure your test.levidoc.co.za A-record points to the Public IP of this server.

Security Groups/Firewall: Ensure port 80 (and 443 for SSL) is open on your cloud provider or local firewall (UFW).

Loopback: If Docker and Nginx are on the same machine, using 127.0.0.1:9000 works. If Nginx is also in a Docker container, you would typically use the container name and a shared Docker network instead.

4. (Optional) Add SSL with Certbot
Since this is a live domain, it is highly recommended to use HTTPS. You can do this easily with Let's Encrypt:

Bash

sudo apt install python3-certbot-nginx
sudo certbot --nginx -d test.levidoc.co.za
This will automatically update your Nginx file with the necessary SSL certificates and redirect all HTTP traffic to HTTPS.

Would you like me to show you how to combine both Nginx and the Web App into a single docker-compose.yml file for easier management?

