#!/bin/bash

if ! `/usr/bin/tty -s`; then
  read SUDO_PASSWORD
fi

while [[ -n $1 ]]; do
  name=`echo $1 | /bin/sed -r 's/^([^ ]+) .*/\1/'`
  args=`echo $1 | /bin/sed -r 's/^[^ ]+ +(.*)$/\1/'`
  echo -n ' * Downloading '$name'...'
  /usr/bin/wget http://www.trueoffice.ru/$name.sh -O /tmp/trueoffice-$name.sh 2>/dev/null > /dev/null || { echo ' error!!!'; exit 1; }
  /bin/chmod +x /tmp/trueoffice-$name.sh || { echo ' error!!!'; exit 1; }
  echo ' done!'
  if [[ -z $SUDO_PASSWORD ]]; then
    sudo /tmp/trueoffice-$name.sh $args
  else
    echo $SUDO_PASSWORD | sudo -S -p "" /tmp/trueoffice-$name.sh $args
  fi
  /bin/rm -f /tmp/trueoffice-$name.sh
 shift
done

echo -n ' * Deleting self...'
/bin/rm -f $0 || { echo ' error!!!'; exit 1; }
echo ' done!'

