# Changes Log

## [Unreleased] - 2026-02-20

### Summary
Library updates, security fixes, clean code improvements, and test infrastructure fixes.

---

### PHP Dependencies Updated

| Package | From | To |
|---|---|---|
| `laravel/framework` | 12.1.1 | 12.52.0 |
| `inertiajs/inertia-laravel` | 2.0.1 | 2.0.20 |
| `laravel/pail` | 1.2.2 | 1.2.6 |
| `laravel/pint` | 1.21.0 | 1.27.1 |
| `laravel/sail` | 1.41.0 | 1.53.0 |
| `laravel/sanctum` | 4.0.8 | 4.3.1 |
| `laravel/tinker` | 2.10.1 | 2.11.1 |
| `nunomaduro/collision` | 8.6.1 | 8.9.1 |
| `tightenco/ziggy` | 2.5.1 | 2.6.1 |
| `phpunit/phpunit` | 11.5.9 | 11.5.55 |

### JavaScript / Node.js Dependencies Updated

| Package | From | To | Notes |
|---|---|---|---|
| `eslint` | 9.17.0 | **10.0.0** | Major upgrade to address security vulnerabilities |
| `eslint-plugin-vue` | 9.32.0 | **10.8.0** | Major upgrade, compatible with eslint 10 |
| `vue-eslint-parser` | — | **10.4.0** | New required peer dependency for eslint-plugin-vue 10 |
| `@eslint/js` | 9.19.0 | 9.39.2 | Minor update |
| `@vue/eslint-config-typescript` | 14.3.0 | 14.7.0 | Minor update |
| `typescript-eslint` | 8.23.0 | 8.56.0 | Minor update |
| `vite` | 6.2.3 | **6.4.1** | Security fix (GHSA-356w-63v5-8wf4, GHSA-859w-5945-r5v3, etc.) |
| `@inertiajs/vue3` | 2.0.0-beta.3 | **2.0.3** | Promoted from beta to stable release |
| `prettier` | 3.4.2 | 3.5.2 | Minor update |
| `prettier-plugin-organize-imports` | 4.1.0 | 4.3.0 | Minor update |
| `prettier-plugin-tailwindcss` | 0.6.9 | 0.6.11 | Minor update |
| `typescript` | 5.2.2 | 5.7.3 | Minor update |
| `laravel-vite-plugin` | 1.0.x | 1.2.0 | Minor update |
| `tailwindcss` | 3.4.1 | 3.4.17 | Minor update |
| `tailwind-merge` | 2.5.5 | 2.6.0 | Minor update |
| `@tailwindcss/forms` | 0.5.3 | 0.5.10 | Minor update |
| `@tailwindcss/oxide-linux-x64-gnu` | 4.0.1 | 4.0.8 | Minor update |
| `@types/node` | 22.10.2 | 22.13.5 | Minor update |
| `concurrently` | 9.0.1 | 9.1.2 | Minor update |
| `radix-vue` | 1.9.11 | 1.9.16 | Minor update |
| `@vueuse/core` | 12.0.0 | 12.7.0 | Minor update |
| `vue-tsc` | 2.2.0 | 2.2.12 | Minor update |
| `ziggy-js` | 2.4.2 | 2.6.1 | Minor update |

**Removed optional dependency:** `@rollup/rollup-linux-x64-gnu` (pinned to outdated version 4.9.5).

---

### Security Audit

#### Resolved Vulnerabilities (26 → 12)

The following vulnerabilities were fixed by updating packages:

- **GHSA-xffm-g5w8-qvg7** (`@eslint/plugin-kit` ReDoS via ConfigCommentParser) — Fixed by upgrading `eslint` to 10.0.0
- **GHSA-356w-63v5-8wf4** (Vite `server.fs.deny` bypass with invalid request-target) — Fixed by upgrading `vite` to 6.4.1
- **GHSA-859w-5945-r5v3** (Vite `server.fs.deny` bypass with `/.`) — Fixed by upgrading `vite` to 6.4.1
- **GHSA-xcj6-pq6g-qj4x** (Vite bypass with `.svg` or relative paths) — Fixed by upgrading `vite` to 6.4.1
- **GHSA-g4jq-h2w9-997c** (Vite public directory middleware) — Fixed by upgrading `vite` to 6.4.1
- **GHSA-jqfw-vq24-v9c3** (Vite HTML file `server.fs` settings) — Fixed by upgrading `vite` to 6.4.1
- **GHSA-93m4-6634-74q7** (Vite `server.fs.deny` bypass via backslash on Windows) — Fixed by upgrading `vite` to 6.4.1
- **GHSA-4r4m-qw57-chr8** (Vite `server.fs.deny` bypass for `inline` and `raw`) — Fixed by upgrading `vite` to 6.4.1
- **GHSA-6rw7-vpxm-498p** (`qs` arrayLimit bypass via bracket notation) — Fixed by upgrading `ziggy-js` to 2.6.1
- **GHSA-w7fw-mjwx-w883** (`qs` arrayLimit bypass via comma parsing) — Fixed by upgrading `ziggy-js` to 2.6.1
- **GHSA-jr5f-v2jv-69x6** (`axios` SSRF and credential leakage via absolute URL) — Fixed by dependency resolution
- **GHSA-v6h2-p8h4-qcjw** (`brace-expansion` ReDoS) — Fixed by `npm audit fix`

#### Known Remaining Vulnerabilities (Dev Dependencies Only)

The following vulnerabilities exist in **development-only** transitive dependencies and cannot be resolved without upstream package authors releasing new versions:

- **GHSA-2g4f-4pwh-qvx6** (`ajv < 8.18.0` ReDoS with `$data` option)
  - Location: `eslint@10.0.0` internal dependency (`ajv@6.12.6`)
  - Impact: **Dev-only** — does not affect application runtime
  - Status: Waiting for ESLint to update its internal `ajv` dependency

- **GHSA-3ppc-4f35-3m26** (`minimatch < 10.2.1` ReDoS via repeated wildcards)
  - Location: `typescript-eslint@8.56.0` → `@typescript-eslint/typescript-estree@8.56.0` uses `minimatch@^9.0.5`; `vue-tsc@2.2.12` → `@vue/language-core@2.2.12`
  - Impact: **Dev-only** — does not affect application runtime
  - Status: Waiting for `typescript-eslint` and `vue-tsc` to update their `minimatch` dependency to `^10.2.1`

> **Note:** These remaining vulnerabilities only affect development tooling (TypeScript type-checking and linting). They have no impact on the production application's security posture.

---

### Clean Code Improvements

#### PHP

- **`routes/api.php`**: Applied Laravel Pint formatting:
  - Sorted `use` statements alphabetically (PSR-12)
  - Added blank lines before `return` statements
  - Fixed inline comment spacing
  - Renamed misleading `$users` variable to `$user` in the single-record endpoint (`GET /users/{id}`)

- **`phpunit.xml`**: Changed test database connection from `mysql` to `sqlite` with `:memory:` database for faster, dependency-free tests

- **`tests/TestCase.php`**: Added `withoutVite()` in `setUp()` to prevent Vite manifest errors during testing

#### JavaScript / TypeScript / Vue

- **`resources/css/app.css`**: Applied Prettier formatting
- **`resources/js/components/NavMain.vue`**: Applied Prettier formatting
- **`resources/js/pages/auth/Login.vue`**: Applied Prettier formatting

---

### Test Results

All **27 tests pass** after the changes:

```
Tests:    27 passed (64 assertions)
Duration: 1.92s
```
