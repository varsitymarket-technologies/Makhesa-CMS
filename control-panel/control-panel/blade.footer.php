<style>
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid transparent;
        background-color: white;

    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none !important;
        border-radius: unset !important;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        color: black;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #765da1ff;
        color: white;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #6c2bd9;
        color: white;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border-top: none;
    }

    div.gallery {}

    div.gallery:hover {
        border: 1px solid #777;
    }

    div.gallery img {
        width: 100%;
        height: auto;
    }

    div.desc {
        padding: 15px;
        text-align: center;
    }

    * {
        box-sizing: border-box;
    }

    .responsive {
        padding: 0 6px;
        float: left;
        width: 24.99999%;
    }

    @media only screen and (max-width: 700px) {
        .responsive {
            width: 49.99999%;
            margin: 6px 0;
        }
    }

    @media only screen and (max-width: 500px) {
        .responsive {
            width: 100%;
        }
    }

    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }




    #imagePreviewContainer {
        margin-top: 20px;
        border: 1px dashed #ccc;
        padding: 10px;
        text-align: center;
        min-height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #previewImage {
        max-width: 100%;
        max-height: 200px;
        /* Adjust as needed */
        display: none;
        /* Hidden by default until an image is selected */
    }

    /* Hide the default file input visually */
    #hiddenFileInput {
        display: none;
        /* You could also use:
            position: absolute;
            left: -9999px;
            opacity: 0;
            */
    }

    .custom-file-upload {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 10px;
    }

    .custom-file-upload:hover {
        background-color: #0056b3;
    }
</style>

<script>
    // For all the times that class "add_media_data" is used, it will be replaced with the actual media path
    document.querySelectorAll('.add_media_data').forEach(function (element) {
        element.addEventListener('click', function () {
            request_media_container(element);
        });
    });

    function open_TAB(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function select_media_query(path) {
        let id = image_container_query;
        let e = image_container_query;
        e.src = path;
        document.getElementById('media_container').innerHTML = "";
    }
    let image_container_query;
    async function request_media_container(e) {
        // Check if the container exists, if not, create it and append to body
        let container = document.getElementById('media_container');
        image_container_query = e;
        if (!container) {
            container = document.createElement('div');
            container.id = 'media_container';
            document.body.appendChild(container);
        }

        try {
            const response = await fetch('<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . "/@scripts/gui/media/" ?>', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            if (response.ok) {
                const html = await response.text();
                container.innerHTML = html;



                // Get references to HTML elements
                const hiddenFileInput = document.getElementById('hiddenFileInput');
                const previewImage = document.getElementById('previewImage');
                const noImageSelectedText = document.getElementById('noImageSelectedText');
                const submitButton = document.getElementById('submitButton');

                // Function to handle image selection and preview
                hiddenFileInput.addEventListener('change', function () {
                    const file = this.files[0]; // Get the first selected file

                    if (file) {
                        // Check if the selected file is an image
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader(); // Create a FileReader object

                            reader.onload = function (e) {
                                // When the file is loaded, set the image source to the result
                                previewImage.src = e.target.result;
                                previewImage.style.display = 'block'; // Show the image
                                noImageSelectedText.style.display = 'none'; // Hide the "No image selected" text
                            };

                            // Read the file as a Data URL (base64 encoded string)
                            reader.readAsDataURL(file);
                        } else {
                            error_feedback('Please select an image file (e.g., JPEG, PNG, GIF).');
                            // Clear the file input if a non-image is selected
                            hiddenFileInput.value = '';
                            previewImage.style.display = 'none';
                            noImageSelectedText.style.display = 'block';
                        }
                    } else {
                        // No file selected, reset preview
                        previewImage.src = '';
                        previewImage.style.display = 'none';
                        noImageSelectedText.style.display = 'block';
                    }
                });

                // Optional: Simulate submission to show the file is indeed in the input
                submitButton.addEventListener('click', function () {
                    if (hiddenFileInput.files.length > 0) {
                        const selectedFile = hiddenFileInput.files[0];
                        //alert(`Image "${selectedFile.name}" (${selectedFile.type}, ${selectedFile.size} bytes) is ready for submission!`);
                        // In a real application, you would now send this file to a server
                        // using FormData and an XMLHttpRequest or Fetch API.
                        console.log("File ready for upload:", selectedFile);

                        const formData = new FormData();
                        formData.append('uploadedImage', selectedFile);

                        try {
                            const response = fetch('<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/control-panel/?request=media-upload' ?> ', {
                                method: 'POST',
                                body: formData, // FormData automatically sets 'Content-Type: multipart/form-data'
                            });

                            // Check if the request was successful (HTTP status 2xx)
                            alert('Image Saved On Server');
                            open_TAB(event, 'media_contents_files_tab');
                        } catch (error) {
                            console.error('Network or client-side error:', error);
                            uploadStatus.textContent = `An error occurred: ${error.message}`;
                            uploadStatus.className = 'error';
                            error_feedback("Failed To Upload Image To Server");
                        }

                    } else {
                        error_feedback('No image has been selected yet.');
                    }
                });

            } else {
                //container.innerHTML = 'Failed to load media content.';
                error_feedback('Failed to load media content');
            }
        } catch (error) {
            error_feedback('Error fetching media content: ' + error.message);
            //container.innerHTML = 'Error loading media content.';
        }
    }
</script>

</div>

<script>

    function validateSignInData(data) {
        const {
            username,
            password,
            email,
            ...others
        } = data;
        const errors = {};

        // Validate username
        const usernameRegex = /^[a-zA-Z0-9]{3,15}$/;
        if (!username || !usernameRegex.test(username)) {
            errors.username = 'Username must be 3-15 characters long and contain only letters and numbers.';
            error_feedback('Username must be 3-15 characters long and contain only letters and numbers.');

            return false;
        }

        // Validate password
        const passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;
        if (!password || !passwordRegex.test(password)) {
            errors.password = 'Password must be at least 8 characters long and include at least one number and one special character.';
            error_feedback('Password must be at least 8 characters long and include at least one number and one special character.');

            return false;
        }

        // Validate email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email || !emailRegex.test(email)) {
            errors.email = 'Email must be a valid email address.';
            error_feedback('Email must be a valid email address.');

            return false;
        }

        // Validate additional fields if necessary
        for (const key in others) {
            if (others.hasOwnProperty(key)) {
                if (!others[key]) {
                    errors[key] = `${key} cannot be empty.`;
                    return false;
                }
            }
        }

        return true;
        //return {
        //    isValid: Object.keys(errors).length === 0,
        //    errors
        //};
    }

    async function authenticate_website() {

        let edt_username = document.getElementById('edt_username').value;
        let edt_password = document.getElementById('edt_password').value;

        // Example usage
        const signInData = {
            username: edt_username,
            password: edt_password,
            email: 'levidoc@levidoc.com',
        };

        if (validateSignInData(signInData)) {
            operate_loader();
            const data = new URLSearchParams();
            data.append('mode', 'authenticate');
            data.append('authenticate_username', edt_username);
            data.append('authenticate_email', edt_email);
            data.append('authenticate_server', edt_server);
            data.append('authenticate_password', edt_password);
            data.append('authenticate_code', edt_server_code);
            let registration_confirmation = await sendAndReceiveData(data, server_endpoint);

            console.log(registration_confirmation);
            try {

            } catch (error) {
                console.error(error);
                error_feedback();
                operate_loader('stop');
            }
        };
    }

    async function sendAndReceiveData(dataToSend, phpURL) {
        try {
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
        } catch (error) {
            error_feedback('Failed To Commuincate With Service');
            console.error("Error:", error);
            // Handle the error (e.g., re-throw, return a default value, show an error message)
            throw error; // Re-throwing allows the calling function to handle the error as well.
        }
    }


    <?php #_script("implementation.js") 
    ?>
</script>

</body>

</html>