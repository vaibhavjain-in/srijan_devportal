#!/bin/bash

# Exit immediately on errors, and echo commands as they are executed.
set -ex

# Run configuration import.
# Change directory from /web/profiles/contrib/srijan_devportal/ to /web.
cd ../../..
# Create new /libraries folder inside /web folder.
mkdir -p libraries
echo "Running coniguration import (slider libraries download)"

# Change directory form libraries folder, create new folder and inside that folder download file.
cd libraries && mkdir -p jquery.cycle && cd jquery.cycle && curl -O https://raw.githubusercontent.com/malsup/cycle/3.0.3/jquery.cycle.all.js
cd ../../libraries && mkdir -p json2 && cd json2 && curl -O https://raw.githubusercontent.com/douglascrockford/JSON-js/master/json2.js
cd ../../libraries && mkdir -p jquery.hoverIntent && cd jquery.hoverIntent && curl -O https://raw.githubusercontent.com/briancherne/jquery-hoverIntent/master/jquery.hoverIntent.js
cd ../../libraries && mkdir -p jquery.pause && cd jquery.pause && curl -O https://raw.githubusercontent.com/tobia/Pause/master/jquery.pause.js
