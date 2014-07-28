#!/bin/sh

set -u
set -e

FIRST=${1:-""}
DIRNAME=`dirname "$0"`

if [ -f "$DIRNAME/.buildAllLoad.sh.disable" ]
then
    echo "Wash your pants, mr. Prodo."
else
    rm `grep base/ .gitignore` 2>/dev/null || true; # Remove all Base* classes from other branches

    if [ ! -z "$FIRST" ]
    then
        if [ "$FIRST" = "--lite" ] || [ "$FIRST" = "-l" ]
        then
            echo 'Lite build started'
            ./symfony doctrine:build  --all --no-confirmation
            mysql -u root mask < ./test/dump.sql
        fi
    else
        echo 'Full build started'
        ./symfony doctrine:build  --all --and-load --no-confirmation
        ./symfony topic:generateFeedbackTree
        ./symfony bank:updateCache
    fi
    ./symfony cc
fi

