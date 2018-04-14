#!/bin/sh

#

SNOOZE=1

PHP="/usr/bin/php5"

DIRECTORY="/var/www/html/pr@tct"

LOGOFF="$DIRECTORY/logoff.php"

MATCHING="$DIRECTORY/matching.php"

CREATINGTABLE="$DIRECTORY/creating_table.php"

LOG=/var/log/gameserver/runtime.log

echo `date` "starting..." >> ${LOG} 2>&1

while true

do

 $PHP $LOGOFF >> ${LOG} 2>&1

 $PHP $MATCHING >> ${LOG} 2>&1

 $PHP $CREATINGTABLE >> ${LOG} 2>&1

 echo `date` "sleeping..." >> ${LOG} 2>&1

 sleep ${SNOOZE}

done