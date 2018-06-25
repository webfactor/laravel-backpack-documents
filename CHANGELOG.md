# Changelog

All notable changes to `laravel-backpack-documents` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## NEXT - YYYY-MM-DD

### Added
- Nothing

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing

## 1.0.5 - 2018-06-25

### Added
- config options for customizing fields
- config option for singleLineBreaks in md

### Fixed
- merge config from vendor folder

## 1.0.3 - 2018-02-07

### Added
- append `lang` as parameter to the api route to get the right language

## 1.0.2 - 2018-02-07

We changed the migration instead of providing a new one.
Be sure to delete the old migration and publish the new one or just change the title column type from `string` to `text`.

### Added
- Translatable Document properties
- CRUD-Access config values