#!/bin/bash
if ps -C "php ./artisan serve --port" >/dev/null
then
    echo " is running"
else
    echo " stopped"
    /home2/canadian/studyintheus.online/artisan serve --port 8080 --host studyintheus.online > /dev/null &
fi
