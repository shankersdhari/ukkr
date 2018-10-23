#!/bin/bash

echo "Creating version.txt"
now="$(date +'%Y.%m.%d')"
touch ./version.txt
echo "$now" > ./version.txt

echo "Sending files to server"
rsync -arzP --delete --exclude=/\.git/ --exclude 'exclude-live-me.txt' --exclude-from 'exclude-live-me.txt'  ./ --chmod=Du=rwx,Dgo=rx,Fu=rw,Fgo=r -e "ssh -p 7822" gnetserv@gnetserver.com:/home/gnethost.com/uckkr/testing

echo "Updating file permissions"
ssh gnetserv@gnetserver.com -p 7822 'chown -R gnetserv:gnetserv  /home/gnetserv/gnethost.com/uckkr/testing'

echo "Done"
