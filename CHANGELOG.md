# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 0.3.2 Under development

## 0.3.1 May 06, 2026

- chore: skip `HeredocIndentationFixer` class to preserve heredoc alignment.

## 0.3.0 May 05, 2026

- feat!: ship `ecs.php` and `rector.php` wrappers from `src/config/` via `scaffold.json`; metadata moves to `php-forge/baseline`.
- chore: remove unused `.ecrc` file and update `composer.json` and `scaffold-lock.json` for consistency.

## 0.2.0 May 04, 2026

- docs: add social media badge for following on X in `README.md`.
- feat!: convert into `yii2-extensions/scaffold` provider; centralize ECS, Rector, metadata and super-linter standards under `src/`.
- docs: Adjust logo size in `README.md` for better visibility.

## 0.1.0 January 24, 2026

- feat: add shared configuration files under `config/` for Composer-based reuse.
- docs: update quality code section with `Super-Linter` and `StyleCI` badges.
