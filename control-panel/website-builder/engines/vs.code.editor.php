<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Code Editor</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.27.0/min/vs/loader.min.js"></script>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            margin: 0;
            background-color: #1e1e1e;
            /* Dark background like VS Code */
            color: #cccccc;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        header {
            background-color: #333333;
            padding: 10px 20px;
            font-size: 1.2em;
            font-weight: 500;
            border-bottom: 1px solid #007acc;
            /* Accent color */
        }

        .container {
            display: flex;
            flex-grow: 1;
            overflow: hidden;
        }

        /* The editor needs a defined height/width for Monaco to work */
        #editor {
            flex: 2;
            /* Takes up 2/3 of the space */
            min-width: 400px;
            height: 100%;
            border-right: 1px solid #444444;
        }

        #output {
            flex: 1;
            /* Takes up 1/3 of the space */
            padding: 10px;
            background-color: #252526;
            display: flex;
            flex-direction: column;
        }

        #output h2 {
            margin-top: 0;
            color: #007acc;
            font-size: 1.1em;
        }

        #console {
            flex-grow: 1;
            background-color: #1e1e1e;
            padding: 10px;
            overflow: auto;
            white-space: pre-wrap;
            /* Preserve formatting and wrap long lines */
            border: 1px solid #444444;
        }

        button {
            margin-top: 10px;
            padding: 8px 15px;
            background-color: #6130a8;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            transition: background-color 0.2s;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
        }

        button:hover {
            background-color: #91a4afff;
        }

        svg {
            width: 15px;
            padding: 0px 5px;
        }
    </style>
</head>

<body>
    <div style="display: flex; padding: 5px;">
        <button onclick="saveEditorContent()">
            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M128.1 0c-35.3 0-64 28.7-64 64l0 384c0 35.3 28.7 64 64 64l146.2 0 10.9-54.5c4.3-21.7 15-41.6 30.6-57.2l132.2-132.2 0-97.5c0-17-6.7-33.3-18.7-45.3L322.8 18.7C310.8 6.7 294.5 0 277.6 0L128.1 0zM389.6 176l-93.5 0c-13.3 0-24-10.7-24-24l0-93.5 117.5 117.5zM332.3 466.9l-11.9 59.6c-.2 .9-.3 1.9-.3 2.9 0 8 6.5 14.6 14.6 14.6 1 0 1.9-.1 2.9-.3l59.6-11.9c12.4-2.5 23.8-8.6 32.7-17.5l118.9-118.9-80-80-118.9 118.9c-8.9 8.9-15 20.3-17.5 32.7zm267.8-123c22.1-22.1 22.1-57.9 0-80s-57.9-22.1-80 0l-28.8 28.8 80 80 28.8-28.8z"/></svg>

            Save Page
        </button>
    </div>
    <div class="container">
        <div id="editor"></div>
    </div>

    <?php
    function extract_file()
    {
        $file = dirname(__FILE__) . DIRECTORY_SEPARATOR . "code.residue";
        $output = "";
        $lines = file($file); // Reads file into an array
        foreach ($lines as $line) {
            $code = (str_replace(["\n", "\v", "\r", "\x00"], "", $line));
            $code = str_ireplace(["`"], ["\`"], $code);
            $output .= "`" . ($code) . "`, \n"; // Process each line
        }
        return $output;
    }
    ?>

    <script>
        // A variable to hold the editor instance globally
        let editor;

        async function saveEditorContent() {
            const contentToSave = editor.getValue();
            const data = new URLSearchParams();
            data.append('file_content', contentToSave);





            data.append('file_path', "page-code"); // Send the file path to the server
            let phpURL = "http://localhost:8080/control-panel/website-builder/engines/code.editor.php";

                const response = await fetch(phpURL, {
                    method: "POST", // Or 'GET'
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded", // Or 'application/json'
                    },
                    body: data,
                });

                let output = await response.text();
                console.log(output);

                
                // Example: Assuming JSON response

                return response.text;
                
                //const data = await response.json(); // Or response.text() for plain text
                //return data;

        }


        // Configure the path for Monaco Editor modules
        require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.27.0/min/vs' } });

        // Initialize the editor once the loader script is ready
        require(['vs/editor/editor.main'], function () {
            editor = monaco.editor.create(document.getElementById('editor'), {
                value: [
                    <?php echo extract_file(); ?>
                ].join('\n'),
                language: 'php', // Set the default language for syntax highlighting
                theme: 'vs-dark',       // Set the VS Code dark theme for aesthetics
                automaticLayout: true,  // Automatically resize the editor
                minimap: { enabled: true } // Enable the minimap on the side
            });
        });


        /**
         * Function to run the code in the editor
         */
        function runCode() {
            // Get the current code content
            const code = editor.getValue();
            const consoleElement = document.getElementById('console');

            // Clear previous output
            consoleElement.textContent = 'Running...\n';

            // === Custom Console Overrides ===
            // This captures console.log output and redirects it to the #console element
            let originalConsoleLog = console.log;
            console.log = function (...args) {
                const message = args.map(arg => typeof arg === 'object' ? JSON.stringify(arg) : String(arg)).join(' ');
                consoleElement.textContent += message + '\n';
                // You can still call the original log if you want it in the browser console too
                // originalConsoleLog.apply(console, args); 
            };

            // === Code Execution ===
            try {
                // Use a function constructor to run the code in an isolated scope
                new Function(code)();
            } catch (error) {
                // Display any runtime errors
                consoleElement.textContent += `\n--- ERROR ---\n${error.message}`;
            } finally {
                // Restore original console.log after execution
                console.log = originalConsoleLog;
            }
        }
    </script>
</body>

</html>