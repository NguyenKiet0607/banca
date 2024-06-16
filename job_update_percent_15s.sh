#!/bin/bash

while true; do
    cd /hackbcr/tool_slot && php artisan app:update-percent
    sleep 15
done
