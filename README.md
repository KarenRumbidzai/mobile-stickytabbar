# Vectra Mobile Stick Tab bar module

`vectra/stickytabbar`

- [Vectra Mobile Stick Tab bar](#vectra-stickytabbar)
    - [Main Functionalities](#main-functionalities)
    - [Installation](#installation)
    - [Configuration](#configuration)

## Main Functionalities

Brief description of what the module does.

```bash
A module to manage the sticky tab bar displayed at the bottom of each screen for MOBILE ONLY.
```

## Installation

Add the following to your main composer.json file:

```json
    "repositories": [
        ...
        {
            "type": "vcs",
            "url": "https://bitbucket.org/artcev/mobile-sticky-tab-bar.git"
        }
    ]
```

Next, install the module via composer as follows:

```bash
$ composer require vectra/stickytabbar:1.0.0
$ composer update -vvv
```

After the composer installation has finished, activate the module by running the following commands from your Magento 2 root directory:

```bash
$ php bin/magento module:enable Vectra_StickyTabBar
$ php bin/magento setup:upgrade;
$ php bin/magento di:compile;
```

## Configuration

Configuration needed for module to work.

```bash
Module can be enabled/disabled in admin. It display under Stores > Configuration > Vectra > Mobile sticky tab bar
```