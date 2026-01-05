<html>
    <head>
        <title>Code Editor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php @include "module.engine.php" ; ?>
        <style>
            pre {
                width: 100%;
                height: max-content;
                background-color: #1f1f1f;
                outline:none;
                padding:1rem;
                font-size: 15px;
            }

            code{
                color: #b0c8ed;
                outline: none;
            }

            .anchor{
                width: fit-content;
                padding: 5px;
                background: #000000 !important;
                color: #14a12d !important;
                margin: 3rem 10px;
            }
        </style>
        <pre>
        <div class="anchor">&lt;code&gt;</div><code id="vs-editor" contenteditable="true"><br><?php e(construct_editor_code()); ?></code><div class="anchor">&lt;/code&gt;</div>
        </pre>
        <script>
            const editor = document.getElementById("vs-editor");
            editor.addEventListener('input',function(){
                save_session();
            });

            async function save_session(){
                // Script Will Save Everytime There Is Changes To The Editor
                const code_data = document.getElementById("vs-editor").innerHTML;
                const action = "";
                const page_id = "";

                const data = new URLSearchParams();
                data.append('request', 'register-website');
                data.append('server', server);
                data.append('website', website);
                data.append('domain', domain);

        let registration_confirmation = await xhr_(data, "http://127.0.0.1:3000/@scripts/scripts.php");
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop');
            if (registration_confirmation.success) {
                window.location = "http://127.0.0.1:3000/vm-admin/web-services/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            console.error(error);
            console.log(registration_confirmation);
            error_feedback();
            operate_loader('stop');
        }
    }

            async function xhr_(dataToSend,phpURL){
                  const response = await fetch(phpURL, {
                method: "POST", // Or 'GET'
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded", // Or 'application/json'
                },
                body: dataToSend,
            });

            if (!response.ok) {
                throw new Error(`HTTP error ${response.status}`);
            }
            // Example: Assuming JSON response

            try {
                return response.text();
            } catch (error) {
                return response.json();
            }
            //const data = await response.json(); // Or response.text() for plain text
            //return data;
            }
        </script>
    </body>
</html>