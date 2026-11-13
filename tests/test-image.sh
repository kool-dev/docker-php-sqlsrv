#!/usr/bin/env bash
set -euo pipefail

image="${1:?image required}"
dockerfile="${2:?Dockerfile required}"
parent="$(awk '$1 == "FROM" { print $2; exit }' "$dockerfile")"
docker pull "$parent"
expected="$(docker run --rm --network none --entrypoint php "$parent" -r 'echo PHP_VERSION;')"

docker run --rm -i --network none --entrypoint php \
  -e EXPECTED_PHP_VERSION="$expected" "$image" < tests/smoke.php
