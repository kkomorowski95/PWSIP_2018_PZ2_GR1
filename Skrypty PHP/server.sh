#!/bin/sh

#

SNOOZE=1

PHP="/usr/bin/php5"

DIRECTORY="/var/www/html/pr@tct"

LOGOFF="$DIRECTORY/logoff.php"

MATCHING="$DIRECTORY/matching.php"

CREATINGTABLE="$DIRECTORY/creating_table.php"

ATTACKTURN="$DIRECTORY/do_attack_turn.php"

#LOG=/var/log/gameserver/runtime.log

#echo `date` "starting..." >> ${LOG} 2>&1

while true

do

 $PHP $LOGOFF

 $PHP $MATCHING

 $PHP $CREATINGTABLE
 
 $PHP $ATTACKTURN

 #echo `date` "sleeping..." >> ${LOG} 2>&1

 sleep ${SNOOZE}

done