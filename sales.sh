#/bin/bash
for i in `ls /var/ftp/www.mattino.ru-backup/dataexchanger`; do 
    echo $i;
    now=$(date +%s)
    for file in `ls /var/ftp/www.mattino.ru-backup/dataexchanger/$i/sells`;
     do
     if ((($(stat "/var/ftp/www.mattino.ru-backup/dataexchanger/$i/sells/$file" -c '%Z') + ((86400 * 2))) > $now))
     then
        echo "cp /var/ftp/www.mattino.ru-backup/dataexchanger/$i/sells/$file  /var/ftp/www.mattino.ru/dataexchanger/$i/sells/$file";
     fi
    done
done
