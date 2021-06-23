FROM gitpod/workspace-full

RUN sudo apt-get update  && sudo apt-get install -y     tool  && sudo rm -rf /var/lib/apt/lists/*

FROM gitpod/workspace-mysql
USER root

# Install MySQL
RUN install-packages mysql-server \
 && mkdir -p /var/run/mysqld /var/log/mysql \
 && chown -R gitpod:gitpod /etc/mysql /var/run/mysqld /var/log/mysql /var/lib/mysql /var/lib/mysql-files /var/lib/mysql-keyring /var/lib/mysql-upgrade

# Install our own MySQL config
COPY mysql.cnf /etc/mysql/mysql.conf.d/mysqld.cnf

# Install default-login for MySQL clients
COPY client.cnf /etc/mysql/mysql.conf.d/client.cnf

COPY mysql-bashrc-launch.sh /etc/mysql/mysql-bashrc-launch.sh

USER gitpod

RUN echo "/etc/mysql/mysql-bashrc-launch.sh" >> ~/.bashrc

FROM gitpod/workspace-full

# Install Redis.
RUN sudo apt-get update  && sudo apt-get install -y   redis-server  && sudo rm -rf /var/lib/apt/lists/*

FROM gitpod/workspace-full-vnc

# Install Electron dependencies.
RUN sudo apt-get update  && sudo apt-get install -y   libasound2-dev   libgtk-3-dev   libnss3-dev  && sudo rm -rf /var/lib/apt/lists/*
