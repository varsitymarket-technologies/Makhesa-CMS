<div class="content" style="align-items: normal; padding: 20px; overflow: hidden; display: blocks;">
    <div class="content-area-wrapper">

        <form action="" method="post">
            <div id="website-template-panel" style="display: ;">
                <div>
                    <h2 style="color: #4d4f60;">Create Web Page</h2>
                    <p>Please fill in the Details required to create your web page </p>
                    <div>
                        <div>
                            <br>
                            <div>
                                <p>Page Title</p>
                                <input name="edt-page-title"
                                    value="<?php $de = $_POST['edt-page-title'] ?? '';
echo $de; ?>" required type="text"
                                    style="width: 100%; padding: 8px; border-radius: 10px; background-color: #373847f5; border: none; color: white;">
                            </div>
                            <br>
                            <div>
                                <p>Description</p>
                                <textarea name="edt-page-description" rows="5"
                                    style="width: 100%; padding: 8px; border-radius: 10px; background-color: #373847f5; border: none; color: white;"><?php $de = $_POST['edt-page-description'] ?? '';
echo $de; ?></textarea>
                            </div>
                            <br>
                            <div>
                                <p>Page URL</p>
                                <input name="edt-page-url" value="<?php $de = $_POST['edt-page-url'] ?? '';
echo $de; ?>"
                                    type="text"
                                    style="width: 100%; padding: 8px; border-radius: 10px; background-color: #373847f5; border: none; color: white;">
                            </div>
                            <br>
                            <div>
                                <p>Page keywords</p>
                                <input name="edt-page-keyword"
                                    value="<?php $de = $_POST['edt-page-keyword'] ?? '';
echo $de; ?>" type="text"
                                    style="width: 100%; padding: 8px; border-radius: 10px; background-color: #373847f5; border: none; color: white;">
                            </div>
                            <br>


                            <script>
                                function toggle_panel() {
                                    let starter_template = document.getElementById('starter-template-panel');
                                    let website_template = document.getElementById('website-template-panel');
                                    if (starter_template.style.display == "none") {
                                        starter_template.style.display = "block";
                                        website_template.style.display = "none";
                                    } else {
                                        starter_template.style.display = "none";
                                        website_template.style.display = "block";
                                    }
                                }
                            </script>
                            <div>
                                <button type="button" onclick="toggle_panel()"
                                    style="PADDING: 8PX; BACKGROUND-COLOR: aliceblue; border-radius: 10px; border: none;">Select
                                    Template
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div id="starter-template-panel" style="display: none;">
                <h2 style="color: #4d4f60;">Starter Templates</h2>

                <?php 
                $e = "";

# Check Which Theme is installed 
$theme = "2023";
$starter_file = dirname(dirname(dirname(dirname(__FILE__)))) . '\@website\themes\\' . $theme . '\init\pages\pages.json';
$starter_data = json_decode(file_get_contents($starter_file), true) ?? [];

#How The File Would Normally Go 

foreach ($starter_data as $d) {
    # code...
    $file = file_get_contents(dirname($starter_file) . DIRECTORY_SEPARATOR . $d['html']);
    $e .= '{
                                    title: "' . $d['title'] . '",
                                    html: `<iframe style="height: calc(100vh  + calc(100vh * 1)) !important; max-width: calc(400vw - 25px); width: 195%; transform: scale(0.5); transform-origin: 0 0; transition: .3s; border-radius: 13px; " src="/@preview/' . $d['html'] . '/" frameborder="0"></iframe>`},';
} 
                ?>
                <!-- Load Tailwind CSS -->
                <script src="https://cdn.tailwindcss.com"></script>
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

                    /* Custom styling for the iframe */
                    .preview-frame {
                        width: 100%;
                        height: 100%;
                        border: none;
                        /* Disable interactions for static design view */
                        pointer-events: none;
                        /* The embedded content is loaded instantly via JS, so a placeholder isn't needed */
                    }

                    /* Grid container for the 3x3 layout */
                    .grid-container {
                        display: grid;
                        grid-template-columns: repeat(3, 1fr);
                        gap: 1.5rem;
                        /* Gap-6 in Tailwind */
                    }

                    /* Ensure the iframe container fills the cell and has nice styling */
                    .grid-cell {
                        background-color: white;
                        border-radius: 1rem;
                        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.06);
                        overflow: hidden;
                        /* Important for the iframe border-radius */
                        transition: transform 0.2s;
                        aspect-ratio: 4/3;
                        /* Maintain aspect ratio for design views */
                        display: flex;
                        flex-direction: column;
                    }

                    .grid-cell:hover {
                        transform: translateY(-4px);
                        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                    }

                    @media (max-width: 768px) {
                        .grid-container {
                            grid-template-columns: repeat(1, 1fr);
                        }
                    }
                </style>



                <div class="max-w-7xl mx-auto">
                    <!-- 3x3 Grid Container -->
                    <div id="design-grid" class="grid-container">
                    </div>
                    <br>
                    <input type="hidden" name="edt-page-theme" value="<?php echo $theme; ?>">
                    <input type="hidden" name="edt-page-template" value="shop-page">

                    <div>
                        <button onclick="toggle_panel()"
                            style="PADDING: 8PX; BACKGROUND-COLOR: aliceblue; border-radius: 10px; border: none;">
                            Back
                        </button>

                        <button name="action-new-page" type="submit"
                            style="PADDING: 8PX; BACKGROUND-COLOR: aliceblue; border-radius: 10px; border: none;">Create
                            Page</button>
                    </div>

                </div>

                <script>
                    // Array of 9 unique HTML snippets to be displayed in the grid.
                    // Each snippet includes basic styling to demonstrate a 'design view'.
                    const snippets = [
                        <?php echo $e ?>
                    {
                            title: "Blank Page",
                            html: `
                        <div style="background:#eff6ff; padding:20px; border-radius:8px;">
                        </div>
                    `
                        },
                    ];

                    const designGrid = document.getElementById('design-grid');

                    // Function to create a cell and inject the HTML snippet
                    function createPreviewCell(data, index) {
                        // 1. Create the outer cell container
                        const cell = document.createElement('div');
                        cell.className = 'grid-cell';

                        // 2. Add the title bar
                        const titleBar = document.createElement('div');
                        titleBar.className = 'p-3 border-b border-gray-100 text-sm font-semibold text-gray-700 rounded-t-xl';
                        titleBar.textContent = data.title;
                        cell.appendChild(titleBar);

                        // 3. Create the iframe element
                        const iframe = document.createElement('iframe');
                        iframe.className = 'preview-frame flex-grow';
                        iframe.title = data.title;
                        iframe.id = `preview-${index}`;

                        // Add an onload listener to inject content once the iframe is ready
                        iframe.onload = function () {
                            try {
                                // Get the iframe's document object
                                const doc = iframe.contentDocument;

                                // Write the full HTML structure, including a fixed-size body and font settings
                                // This ensures the embedded content looks consistent and non-interactive
                                const fullHtml = `
                            <!DOCTYPE html>
                            <html>
                            <head>
                                <style>
                                    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
                                    body { 
                                        margin: 0; 
                                        padding: 0; 
                                        font-family: 'Inter', sans-serif;
                                        /* This is critical for non-interactive views to prevent scrolling issues */
                                        height: 100%;
                                        width: 100%;
                                        box-sizing: border-box;
                                        overflow: hidden; /* Hide scrollbars within the preview */
                                    }
                                </style>
                            </head>
                            <body>
                                ${data.html}
                            </body>
                            </html>
                        `;

                                doc.open();
                                doc.write(fullHtml);
                                doc.close();

                            } catch (e) {
                                console.error("Could not inject content into iframe:", e);
                            }
                        };

                        cell.appendChild(iframe);
                        designGrid.appendChild(cell);
                    }

                    // Initialize the grid on page load
                    document.addEventListener('DOMContentLoaded', () => {
                        snippets.forEach((snippet, index) => {
                            createPreviewCell(snippet, index);
                        });
                    });
                </script>
            </div>

        </form>
    </div>
    <?php
# Recieve The Page Scripts 
$script = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "scripts/create.page.php";
if (isset($_POST['action-new-page'])) {
    @include_once $script;
} 
    ?>