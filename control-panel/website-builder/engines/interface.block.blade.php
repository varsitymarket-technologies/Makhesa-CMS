<div class="content" style="align-items: normal; padding: 20px; overflow: hidden; display: blocks;">
    <div class="content-area-wrapper">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h2 style="color: #4d4f60;">Website Blocks</h2>
                <p>Manage Your Website Theme Blocks.</p>
            </div>
        </div>

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


                <div style="margin: 1rem;"></div>
                <div class="max-w-7xl mx-auto">
                    <!-- 3x3 Grid Container -->
                    <div id="design-grid" class="grid-container">
                    </div>
                </div>

        <?php
        $ew = ""; 
$sql = "SELECT * FROM `tblcanvas`";
$e = __DATABASE_ENGINE__->query($sql);
foreach ($e as $page_data) {

    #Array ( [id] => 1 [board] => vm_theme_68ff407d27e6a [title] => Home Page [url] => goofy [description] => The Website Page Desciption [seo] => { "description": "The Website Page Desciption" } [keywords] => Site Things Right )

    $template = '
            <div onclick="window.location=`' . __PROTOCOL__ . __DOMAIN_NAME__ . '/' . __ADMIN_URL__ . '/vm-editor/page/' . $page_data['id'] . '/`" style="padding: 4px 0px">
                <div style="border-width: thick; border-color: #6130aa4d; border-style: solid; padding: 1rem; border-radius: 1rem;">
                    <h2 style="font-size: 1.6rem; color: #4d4f60;">' . $page_data['title'] . '</h2>
                    <p>URL ' . __PROTOCOL__ . __DOMAIN_NAME__ . "/" . $page_data['url'] . '/ </p>
                </div>
            </div> 
            ';
    # echo $template;
    $ew .= '{                       id : "'.$page_data['id'].'",
                                    title: "' . $page_data['title'] . '",
                                    html: `<iframe style="height: calc(100vh  + calc(100vh * 1)) !important; max-width: calc(400vw - 25px); width: 195%; transform: scale(0.5); transform-origin: 0 0; transition: .3s; border-radius: 13px; " src="' . __PROTOCOL__ . __DOMAIN_NAME__ . "/" . $page_data['url'] . '/" frameborder="0"></iframe>`},';

}
        ?>

    </div>
</div>

        <script>
            // Array of 9 unique HTML snippets to be displayed in the grid.
            // Each snippet includes basic styling to demonstrate a 'design view'.
            const snippets = [
                <?php echo $ew ?>
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
                // iframe.onclick = function() { window.location.href = "/<?php echo __ADMIN_URL__ ?>/vm-editor/page/4/";  }; 

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
                cell.onclick = function() { window.location.href = "/<?php echo __ADMIN_URL__ ?>/vm-editor/page/"+data.id+"/";  }; 

                designGrid.appendChild(cell);
            }

            // Initialize the grid on page load
            document.addEventListener('DOMContentLoaded', () => {
                snippets.forEach((snippet, index) => {
                    createPreviewCell(snippet, index);
                });
            });
        </script>
