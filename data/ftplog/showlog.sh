#!/bin/bash
dir=${1}/${2}
if [ ! -d $dir ]; then
echo "Directory doesn't  exists"
exit 0
fi
cat ${dir}/log/log.txt | iconv -f koi8-r -t utf8 | tail -n 5000 > ${dir}/log/log1.txt
cat ${dir}/log/log1.txt > ${dir}/log/log.txt
cat ${dir}/log/log.txt | iconv -f koi8-r -t utf8 | tail
exit 0
