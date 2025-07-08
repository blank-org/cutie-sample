### Documentation: Cutie architecture

#### Project Context
- **Website:** `cutie.com`
  - A personal project by Ujjwal Singh, hosting notes on life and technology.
  - Built using a custom PHP-based framework called **Cutie** and a shell script-based toolset called **Tiggu**.
- **Goal:** Implement a Notion-based Content Management System (NCMS) to manage articles, replacing or supplementing a manual process previously defined in `/config/id.tsv`.

#### Frameworks and Tools
1. **Cutie Framework:**
   - **Description:** A custom PHP-based framework you designed for rendering dynamic content.
   - **Git URL:** `https://github.com/blank-org/cutie-framework`
   - **Role:** Processes PHP templates to generate HTML pages for `cutie.com`.
   - **Article Structure Example:** From `HTML/Component/World/Philosophy/God/index.php`:
     - Uses PHP includes (e.g., `require('../HTML/Fragment/Component_cover.php')`) for reusable components.
     - Embeds variables like `$desc` and `$alt` for dynamic content.
     - Outputs HTML with headings (`<h3>`), paragraphs (`<p>`), tables, and lists styled with classes (e.g., `center`, `list-bullet`).

2. **Tiggu Toolset:**
   - **Description:** A shell script-based framework for rendering and saving static pages.
   - **Git URL:** `https://github.com/blank-org/tiggu`
   - **Role:** Generates static HTML files from Cutie’s PHP output, likely used in your build process.

3. **Directory Structure:**
   - Root directory of `cutie` includes:
     ```
     ├───Config (e.g., id.tsv)
     ├───CSS (styles for components)
     ├───Framework (Cutie core files: API, CSS, HTML, JS)
     ├───HTML (content files)
     │   ├───Component (articles like World/Philosophy/God/)
     │   ├───Fragment (reusable components like Component_cover.php)
     │   └───Template
     ├───JS (JavaScript files, e.g., Base/page.js)
     ├───Resource (supporting files)
     └───Site (possibly static output)
     ```
   - Articles are organized hierarchically (e.g., `HTML/Component/World/Philosophy/God/index.php`).

#### CI/CD Pipeline
- **GitHub Actions:** Already set up to render the website and trigger builds.
- **Firebase:** Used for deployment via CI/CD, indicating a hosted static site.
- **NCMS Integration:** The system generates PHP files, commits them to Git, and pushes to trigger this pipeline.

#### Notion Database Setup
- **Database Name:** “Articles”
- **Purpose:** Centralized content management for `cutie.com` articles, replacing manual file edits and `id.tsv`.
- **Structure:**
  - **Headers/Properties:**
    - `Status` (Select): Workflow status (e.g., `Draft`, `Published`, `Archived`).
    - `Id` (Text): Unique identifier and slug (e.g., `world-philosophy-god`), used for directory paths.
    - `Label` (Text): Short name (e.g., `God`), not used in PHP output but preserved.
    - `Title` (Title type): Article title and page link (e.g., “God”).
    - `JS` (Select): Indicates if JavaScript should render post-load (`0` = No, `1` = Yes).
    - `Description` (Text): Brief summary, maps to `$desc` in Cutie (e.g., “Meaning of God”).
  - **Content:** Stored as blocks within each entry’s page (e.g., headings, paragraphs, tables).
- **Database ID:** `1a2bbfdb472981ca9482000c98618eb8`
  - Confirmed as the 32-character string before `?v=` in the URL (e.g., `https://www.notion.so/yourworkspace/1a2bbfdb472981ca9482000c98618eb8?v=view_id`).
  - Initially caused confusion due to hyphenated display (`1a2bbfdb-4729-81ca-9482-000c98618eb8`), but API requires hyphen-free format.
- **Sharing:**
  - Shared with an integration (e.g., “NCMS”) via the database’s “Share” button in its main view.
  - Permissions set to “Can view” or “Can edit” to allow API access.

#### Integration Details
- **Notion Integration:**
  - Created at [Notion Integrations](https://www.notion.so/my-integrations).
  - Token: Stored as `NOTION_API_KEY` in `.env` (e.g., `secret_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx`).
  - Purpose: Enables API access to fetch database content.

#### NCMS Implementation
- **Script:** `ncms_fetch.py` (Python-based)
  - **Dependencies:** `notion-client`, `python-dotenv`.
  - **Functionality:**
    1. **Fetch:** Queries the “Articles” database for `Published` entries using the Notion API.
    2. **Extract:** Pulls metadata (`Id`, `Title`, `JS`, `Description`) and content blocks (e.g., `<h3>`, `<p>`, tables).
    3. **Transform:** Generates Cutie-compatible `index.php` files in `HTML/Component/{category_path}/`.
       - Uses `Id` for directory paths (e.g., `world-philosophy-god` → `World/Philosophy/God/`).
       - Includes `$desc`, conditional JS (e.g., `require('../JS/Base/page.js')` if `JS=1`), and fragments (`Component_cover.php`, `Component_bottom.php`).
- **Environment:** `.env` file:
  ```
  NOTION_API_KEY=secret_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
  NOTION_DATABASE_ID=1a2bbfdb472981ca9482000c98618eb8
  ```
- **Next Step:** Add Git commit/push logic to trigger CI/CD.

#### Data Migration
- **Source:** `/config/id.tsv`
  - TSV file with columns: `Id`, `Label`, `Title`, `JS`, `Description`.
  - Example: `world/philosophy/god    God    God    0    Meaning of God`.
- **Conversion:** Exported to CSV for Notion import, mapping `Id` to slug and splitting for `Categories` (later simplified to use `Id` directly).

#### Challenges Resolved
- **Database ID Confusion:**
  - Initially unclear where to find the ID; resolved by identifying it as the 32-character string before `?v=` in the URL.
- **Sharing Issues:**
  - Difficulty locating the “Share” option due to inline database context or view menus.
  - Fixed by opening the database as a full page and sharing with the integration.

---

### Summary of Your Setup
- **Content Management:** Transitioning from static files and `id.tsv` to a Notion database (“Articles”) with API-driven updates.
- **Tech Stack:** Custom Cutie (PHP) and Tiggu (shell) frameworks, Python for NCMS, GitHub Actions/Firebase for CI/CD.
- **Current State:** NCMS fetches and transforms Notion data into PHP files; Git push pending to complete the pipeline.
- **Notion:** Database ID `1a2bbfdb472981ca9482000c98618eb8` shared with an integration, using token-based API access.

This reflects everything I’ve gathered from our discussions. Let me know if I’ve missed anything or if you’d like to expand on specific sections (e.g., adding Git push details once implemented)! Now that it’s working, would you like help with the Git integration or testing the output files?