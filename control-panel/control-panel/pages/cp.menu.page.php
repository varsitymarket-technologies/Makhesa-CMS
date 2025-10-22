<?php
$internal_page = map_page()[3] ?? false;
if (empty($internal_page)) {
    $internal_page = "dashboard";
}
?>

<style>
        /* Basic Styling for the Menu and Draggable Items */
        .menu-list {
            list-style-type: none;
            padding: 0;
            border: 1px solid #cccccc00;
        }
        .menu-item {
            padding: 10px;
            margin: 5px 0;
            background-color: #242424;
            border: 1px solid #6934b7;
            cursor: grab; /* Indicates it's draggable */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .menu-item:hover {
            background-color: #f0f0f0;
        }
        /* Style for item being dragged (optional but helpful) */
        .sortable-ghost {
            opacity: 0.4;
            background-color: #c9e2f9;
        }
        .handle {
            font-size: 1.2em;
            margin-right: 10px;
            cursor: grab;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">

        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem; position: inherit;">
            Navigation Menu
        </div>
        <?php
        if ($internal_page == "create-menu") {
            $html = '
            <div style="display: contents;">
                <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                    <div class="video-wrapper"></div>
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                            <span style="font-size:10px; ">New Website Menu</span><br>
                            Create Navigation Menu
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">
                        Menu\'s help users navigate complex pages and sub structures. 
                    </div>
                    <br>
                    <div class="video-view" style="padding: 10px 20px 0px;">Menu Title</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input placeholder="Menu Title" type="text" id="edtmenu_title" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                            Menu Item
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;"> Menu Item Caption</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input value="Menu Item" placeholder="Menu Caption" type="text" id="edtmenu_caption" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;"> Menu Item Link</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input value="#" placeholder="Link To Page" type="text" id="edtmenu_link" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>

            

                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 20px; ">
                        <button onclick="create_menu_()">Save Data</button>
                    </div>
                    <div class="video-view"></div>
                </div>
            </div>';

            echo $html;
        }else if ($internal_page == "edit-menu"){
            $html = '
    <div style="display: flex; justify-content: space-between;">
        <h2>Edit Your Menu Structure</h2>
        <div style="display: flex; align-content: space-between; align-items: center;">
            <button onclick="add_menu_item(`202`,`Click To Edit Text`)" style="margin: 10px;">Add Menu Item</button>
        </div>
    </div>
        <ul id="draggable-menu" class="menu-list">
            <li class="menu-item" data-id="1">
                <span class="handle">⋮⋮</span>
                Home
            </li>
            <li class="menu-item" data-id="2">
                <span class="handle">⋮⋮</span>
                About Us
            </li>
            <li class="menu-item" data-id="3">
                <span class="handle">⋮⋮</span>
                Services
            </li>
            <li class="menu-item" data-id="4">
                <span class="handle">⋮⋮</span>
                Contact
            </li>
        </ul>

        <input type="hidden" id="menu-order" name="menu_order" value="">

        <br>
        <button type="submit" id="save-button">Save Menu Order</button>

    ';

            echo $html;
        } else {

            $html_template = '
                <div class="responsive anim" style="--delay: .4s;">
                    <div class="gallery">
                        <div class="video-name">
                            <div  onclick="window.location=`'.__PAGE__ . map_page()[2] . '/edit-menu/[ID]/`" class="small-header anim" style="--delay: .3s; font-size:20px; margin: 0px 0px 10px 0px;">
                                <span style="font-size:10px; "># Menu Category</span><br>
                                <div style="display:flex; align-items:center;">
                                    <img style="width:3rem; object-fit: contain; " src="/@rescources/icons/menu-icon/"> 
                                    [TITLE]
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            ';

            $faq_data = $db->query("SELECT * FROM `menu` ORDER BY `id` DESC");
            if (empty($faq_data)) {
            } else {
                $html = '
                <div class="anim" style="padding: 10px 5px 0px; --delay: .4s;">
                    <div style="display: flex; flex-direction: row-reverse; justify-content: space-between; margin:10px 0px; ">
                        <button onclick="window.location=`'.__PAGE__ . map_page()[2] . '/create-menu/'.'`">
                            Create Menu
                        </button>
                    </div>
                </div>
                <div>';
                foreach ($faq_data as $_data) {
                    $html .= str_replace(
                        ['[ID]', '[TITLE]'],
                        [$_data['id'], $_data['title']],
                        $html_template
                    );
                }
                $html .= '</div>';
                echo $html;
            }
        }
        ?>
    </div>
</div>

<?php
#This is an Internal JS Function 
?>
<script>

    function add_menu_item(id,caption){

        let template = '<li class="menu-item" data-id="'+id+'"><span class="handle">⋮⋮</span><p style="margin: 0px;">'+caption+'</p></li>';

        let menu_container = document.getElementById('draggable-menu');
        let prior_data = menu_container.innerHTML;
        menu_container.innerHTML = prior_data + template;
    }

    async function create_menu_(){
        operate_loader();
        const title = document.getElementById("edtmenu_title").value;
        const caption = document.getElementById("edtmenu_caption").value;
        const link = document.getElementById("edtmenu_link").value;

        if (title.trim() === "" || caption.trim() === "") {
            operate_loader("stop");
            error_feedback('Please fill in fields before saving.');
            return;
        }
        const data = new URLSearchParams();
        data.append('request', 'create-menu');
        data.append('menu_name', title);
        data.append('menu_caption', caption);
        data.append('menu_link', link);
        

        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>");
        alert(registration_confirmation); 
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop'); 
            if (registration_confirmation.success) {
                window.location = "<?php echo __PAGE__ . map_page()[2]; ?>/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            console.error(error);
            error_feedback();
            operate_loader('stop');
        }
    }

</script>

<script>
        // 1. Initialize SortableJS on the menu list
        var el = document.getElementById('draggable-menu');
        var sortable = new Sortable(el, {
            animation: 150, // Smoothness of the transition
            handle: '.handle', // Only drag when clicking the handle (optional)
            ghostClass: 'sortable-ghost' // Class applied to the element being dragged
        });

        // 2. Handle form submission
        document.getElementById('menu-form').addEventListener('submit', function(event) {
            // Prevent the default form submission for a moment
            // event.preventDefault();

            // 3. Get the current order of menu item IDs
            var menuItems = document.querySelectorAll('#draggable-menu li');
            var orderArray = [];

            menuItems.forEach(function(item) {
                // Get the 'data-id' attribute for each item
                orderArray.push(item.getAttribute('data-id'));
            });

            // The orderArray will look like: ["3", "1", "4", "2"] (if they were reordered)
            
            // 4. Serialize the array (e.g., to a comma-separated string or JSON)
            // A comma-separated string is simple and common for this purpose: "3,1,4,2"
            var serializedOrder = orderArray.join(',');

            // 5. Update the hidden input field with the serialized order
            document.getElementById('menu-order').value = serializedOrder;

            // Optional: Log the data being submitted (for testing)
            console.log('Menu Order to be submitted:', serializedOrder);

            // Now the form submits normally with the updated hidden field
            // to 'process_menu.php'
        });
    </script>