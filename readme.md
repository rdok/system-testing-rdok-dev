# system-testing-rdok-dev
[![Build Status](https://jenkins.rdok.dev/buildStatus/icon?job=system-testing-rdok-dev)](https://jenkins.rdok.dev/job/system-testing-rdok-dev/)

[Server tests executed by Jenkins](https://code-quests.rdok.dev/2019/03/server-testing-ci/)

docker-compose run -v $(pwd):/app workbench

## Locally
- Copy .env.example to .env, and fill accordingly
    - id -u to get the APP_UID/GID
- docker run -i --rm -v $(pwd):/app -w /app codeception/codeception build
- docker run -i --rm -v $(pwd):/app -w /app codeception/codeception run
