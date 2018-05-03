**Plinker-RPC**
=========

Plinker PHP RPC client/server makes it really easy to link and execute PHP component classes on remote systems, while maintaining the feel of a local method call.

Development repository
----------------------

This repository is used to develop the entire project to make it easy to work on many parts at the same time without forgetting what was done,
it contains a bash script which will commit and do semantic versioning for each sub component.

## Installing

 - `git clone git@github.com:plinker-rpc/development.git .`
 - `composer install`

## Committing Changes

Bash scripts have been added to automate this, do not do it manually.

 - `bash ./commit.sh "A really informative commit message, and not just ."`

The above 1 liner will ask:

`Do you wish to [c]ommit, [d]eploy or [e]xit?`

 - If you choose commit, it will push your changes and docs to github.
 - If you choose deploy, it will ask: `Which type of changes has been done: [p]atch, [m]inor, [M]ajor?`, upon choice it will increment the semantic version, tag then push your changes and docs to github.

`bash ./dev_mkdocs.sh` is used to write docs with hot reloading at `http://127.0.0.0:8000`

## Creating Component

To create a new component simply edit the `component-generator.php` file then run it.

It will generate the following structure in vendor, ready to start 
creating your component package.

    component ┐
              ├── src
              │   ├── Component.php
              ├── tests
              │   ├── fixtures
              │   ├── ComponentTest.php
              │   └── bootstrap.php
              ├── .gitignore
              ├── .scrutinizer.yml
              ├── .styleci.yml
              ├── .travis.yml
              ├── CONTRIBUTING.md
              ├── LICENSE
              ├── phpunit.xml
              ├── README.md
              └── composer.json

Upon ready state:

 - Make sure `README.md` conforms to docs structure.
 - Create a github repository in the organisation, push your changes.
 - Add the new component to `commit.sh`, `dev_mkdocs.sh` and `mkdocs.sh` component arrays.
 - Run `bash ./commit.sh "Inital Commit"
 - Add to packagist.
 - Enable on styleCI, travisCI, scrutinizer.
