<?php
    // GitHub Configuration
    define('GITHUB_PERSONAL_ACCESS_TOKEN', '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'); // Replace with your PAT
    define('GITHUB_OWNER', 'varsitymarket-technologies'); // e.g., 'my-org' or 'john-doe'
    define('GITHUB_REPO', 'web_agency');      // e.g., 'project-sync'
    define('GITHUB_BRANCH', 'main');                    // Target branch

    // Local Project Path
    define('PROJECT_LOCAL_PATH', dirname(__DIR__)); #Consider Backing Up Everything

    // Remote MySQL Configuration
    define('DB_HOST', '');
    define('DB_USER', '');
    define('DB_PASS', '');
    define('DB_NAME', '');
    define('DB_PORT',''); 

    // Log file for local operations
    define('LOG_FILE', 'C:\levidoc\htdocs\patch_bin\local_sync.log'); // Use the defined constant

    // --- DO NOT EDIT BELOW THIS LINE ---
    // GitHub API Base URL
    define('GITHUB_API_URL', 'https://api.github.com');
    ?>