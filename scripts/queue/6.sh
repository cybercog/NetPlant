#!/bin/bash

# autogenerated script of NetPlant
# ExecutionQueue ID: 6

# create new user 
ssh root@127.0.0.1 'useradd -p \`openssl passwd -1 0p9o8i\` johnyD' || exit 1
ssh root@127.0.0.1 'chsh --shell=/bin/false johnyD' || exit 1
# create new user 
ssh root@127.0.0.1 'useradd -p \`openssl passwd -1 Pppp\` yetanother' || exit 1
ssh root@127.0.0.1 'chsh --shell=/bin/false yetanother' || exit 1
