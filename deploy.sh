#!/bin/bash

echo "Creating version.txt"
now="$(date +'%Y.%m.%d')"
touch ./version.txt
echo "$now" > ./version.txt

echo "Sending files to server"
rsync -arzP --delete --exclude=/\.git/ --exclude 'exclude-me.txt' --exclude-from 'exclude-me.txt'  ./ --chmod=Du=rwx,Dgo=rx,Fu=rw,Fgo=r -e "ssh -p 7822" gnetserv@gnetserver.com:/home/gnetserv/uckkr.org/testing

echo "Updating file permissions"
ssh gnetserv@gnetserver.com -p 7822 'chown -R gnetserv:gnetserv  /home/gnetserv/uckkr.org/testing'

echo "Done"
