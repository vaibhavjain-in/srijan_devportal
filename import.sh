#!/bin/bash

# Exit immediately on errors, and echo commands as they are executed.
set -ex

# Run configuration import.
# Change directory from /web/profiles/contrib/srijan_devportal/ to /web.
cd ../../..
# Create new /libraries folder inside /web folder.
mkdir -p libraries
echo "Running coniguration import (slider libraries download)"
../vendor/bin/drush dl-cycle-lib

# Clear Cache.
../vendor/bin/drush cr
