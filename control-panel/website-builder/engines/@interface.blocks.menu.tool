
    <style>

        /* Floating Explorer Container */
        #explorer-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            padding: 20px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3x3 Grid */
            gap: 20px;
            width: 100%;
            max-width: 1000px;
            max-height: 90vh;
            overflow-y: auto;
            background: var(--bg);
            border-radius: 16px;
        }

        /* Component Card */
        .component-card {
            background: var(--card-bg);
            border-radius: 12px;
            border: 1px solid transparent;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            aspect-ratio: 1 / 1; /* Keeps them square */
        }

        .component-card:hover {
            border-color: var(--accent);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.4);
        }

        .component-card iframe {
            width: 100%;
            height: 100%;
            border: none;
            pointer-events: none; /* Prevents interaction inside grid */
        }

        .card-label {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.9);
            padding: 8px;
            font-size: 12px;
            text-align: center;
            color: white;
            border-color: #ffffff21;
            border-width: 2px;
            border-style: solid;
        }
    </style>

<div id="explorer-overlay" style="display:none; ">
</div>


<script>

    async function load_blocks_menu() {
        var xhr = new XMLHttpRequest();
        let container_div = document.getElementById('explorer-overlay'); 
        xhr.open('GET', "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/control-panel/website-builder/engines/@interface.blocks.menu.php'; ?>", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                container_div.style.display = "flex"; 
                document.getElementById("explorer-overlay").innerHTML = xhr.responseText;
            } else if (xhr.readyState === 4) {
                console.error("Error loading data: " + xhr.status);
            }
        };
        xhr.send();
    }

    async function loading_block_data(data_id) {
        var xhr = new XMLHttpRequest();
        let container_div = document.getElementById('explorer-overlay'); 
        let url = "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/control-panel/website-builder/engines/@input.builder.extension.xhr.php'; ?>";

        xhr.open('POST', url, true);

        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                close_menu_blocks(); 

            } else if (xhr.readyState === 4) {
                console.error("Error loading data: " + xhr.status);
            }
        };

        let params = "id=" + data_id + "&action=run_indefinitely";

        xhr.send(params);
    }

    function close_menu_blocks(){
        let container_div = document.getElementById('explorer-overlay'); 
        container_div.innerHTML = ""; 
        container_div.style.display = "none"; 
    }
</script>