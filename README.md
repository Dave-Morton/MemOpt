# [Geek Cave Creations](http://www.geekcavecreations.com)

Readme info:
- Version: 0.0.1
- Author: Dave Morton
- Date: June 6th, 2017

# MemOpt: Memory Caching Abstraction Layer for PHP

## Introduction

MemOpt is a simple memory caching abstraction layer, designed to use one of many potentially
available memory caching classes/functions in PHP. If no native memory caching functionality
is available, a custom caching class is used.

## System Requirements

MemOpt has been tested successfully on PHP versions from 5.3.0 to 7.0.19, and works with
the following "native" caching extensions:

- Memcached
- Memcache
- APC (where available)
- APCu (where available)
- Redis

## Configuration

Please note that this is currently a "proof of concept" at this stage, and far from functional.
More features and documentation will be added over time. Please feel free to contribute to
the project by forking this repository and submitting pull requests.


