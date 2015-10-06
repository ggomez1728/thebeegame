# The Bee Game

## Objective

The objective of this exercise is to create a PHP application that performs the following tasks:

* A web page must be produces as the interface to play the game. Styling is not expected nor
necessary.
* A button must be present to kick off step process of hitting a random bee
* All code must be submitted to work in a local environment. Hosted solutions will not be
accepted.
* The game must adhere to the rules and constraints listed below.

## Specification

### The Bees

There are three types of bees in this game:

#### Queen Bee
* The Queen Bee has a lifespan of 100 hit points
* When the Queen Bee is hit, 8 hit points are deducted from her lifespan
* If/When the Queen Bee has run out of Hit Points, all remaining alive bees
automatically run out of hit points
* There is only 1 Queen Bee

#### Worker Bee

* Worker Bees have a lifespan of 75 hit points
* When a Worker Bee is hit, 10 hit points are deducted from his lifespan
* There are 5 Worker Bees

#### Drone Bee

* Drone Bees have a lifespan of 50 hit points
* When a Drone Bee is hit, 12 hit points are deducted from his lifespan
* There are 8 Drone Bees

### Gameplay

To play, there needs to be a button that enables a user to “hit” a random bee. The selection of a
bee must be random. When the bees are all dead, the game must be able to reset itself with full life
bees so to allow playing another round.

### Constraints

* The application must run through a browser
* The application should be done in PHP, with as little Javascript as possible.

## Solution

Clon this and run

```javascript
php -S localhost:8000
```