Acme
====

Acme is selling widgets

To run the shop just execute `./acme.bash up` or `./acme up`

To remove the shop run `./acme.bash remove` or `./acme remove`

Assumptions
-----------
* Lowest basket total calculation wins
* Empty basket with delivery cost is correct

Quick description
-----------------
* `application` directory contains application's source, tests and dependencies
  * `BasketTest` should serve as good starting point for analysis
* `infrastructure` directory contains simple docker image and docker compose configuration
* `orechstration` directory contains go program meant to automate interactions with this demo
* `acme` is a precompiled go program and `acme.bash` is meant to be its bash alternative
  * go program can be recompiled with simple `go build -o acme acme.go`
  * should be working on Ubuntu 20.04 x86_64

Notes
-----
* if I could, I would use `attributes` instead of `docblocks` (i.e. PHPUnit will ship them in version 10)
* ideally I would build images and push them to a private registry
* it is important to properly configure `BCMath` or use some more sophisticated solution on production
* basket could use some UID to more closely resemble concept of `entity` (also `ULID` might help with remarketing dropped baskets)
* `final` keyword is just meant to prompt developers about potentially unnecessary inheritance and just slight personal preference
* `acme` scripts/programs are generally idempotent
