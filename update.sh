wget http://tarantool.org/dist/public.key
sudo apt-key add ./public.key
release=`lsb_release -c -s`

# For Ubuntu:

echo "deb http://tarantool.org/dist/ubuntu/ $release main" | sudo tee -a /etc/apt/sources.list.d/tarantool.list
echo "deb-src http://tarantool.org/dist/ubuntu/ $release main" | sudo tee -a /etc/apt/sources.list.d/tarantool.list

sudo apt-get update
