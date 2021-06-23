FROM gitpod/workspace-full

RUN sudo apt-get update  && sudo apt-get install -y     tool  && sudo rm -rf /var/lib/apt/lists/*

FROM gitpod/workspace-mysql

FROM gitpod/workspace-full

# Install Redis.
RUN sudo apt-get update  && sudo apt-get install -y   redis-server  && sudo rm -rf /var/lib/apt/lists/*

FROM gitpod/workspace-full-vnc

# Install Electron dependencies.
RUN sudo apt-get update  && sudo apt-get install -y   libasound2-dev   libgtk-3-dev   libnss3-dev  && sudo rm -rf /var/lib/apt/lists/*
