#!/bin/bash

dir_spool=/var/www/html/sites/default/files/civicrm/lp/spool
dir_store=/var/www/html/sites/default/files/civicrm/lp/store
dir_temp=/var/www/html/sites/default/files/civicrm/lp/tmp
lpstat=/usr/bin/lpstat

for file in `ls $dir_temp/*.dat 2>/dev/null`; do
    id=`cat $file`
    $lpstat -t | grep $id &>/dev/null
    if [[ $? -ne 0 ]]; then
	rm -f $file
	old=`basename $file| sed 's/\.dat//'`
	mv $dir_spool/$old $dir_store
    fi
done
