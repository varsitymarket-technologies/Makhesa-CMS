<div id="interface-style-tool" class="inspector"
    style="display:none; padding:20px 10px; z-index: 10; height: 80vh !important; position: absolute; left: calc(100vw - 16rem); top: 90px;">
    <input class="nav-inspector" name="nav-inspector" type="radio" id="design" checked="">
    <div onclick="document.getElementById(`interface-style-tool`).style.display = `none`" style="display: flex; justify-content: flex-end; margin: 0px -9px -38px 0px; ">
        <div style="width: 1.5rem; filter: invert(1); margin: -15px 0px 10px 0px; ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M183.1 137.4C170.6 124.9 150.3 124.9 137.8 137.4C125.3 149.9 125.3 170.2 137.8 182.7L275.2 320L137.9 457.4C125.4 469.9 125.4 490.2 137.9 502.7C150.4 515.2 170.7 515.2 183.2 502.7L320.5 365.3L457.9 502.6C470.4 515.1 490.7 515.1 503.2 502.6C515.7 490.1 515.7 469.8 503.2 457.3L365.8 320L503.1 182.6C515.6 170.1 515.6 149.8 503.1 137.3C490.6 124.8 470.3 124.8 457.8 137.3L320.5 274.7L183.1 137.4z"/></svg>
        </div>

    </div>
    <div class="inspector-sections">
        <div class="wrapper">
            <label for="design" checked="" style="display:flex; align-items: center;">
                <div style="width: 1.5rem; filter: invert(1); ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M405.6 93.2L304 194.8L294.6 185.4C282.1 172.9 261.8 172.9 249.3 185.4C236.8 197.9 236.8 218.2 249.3 230.7L409.3 390.7C421.8 403.2 442.1 403.2 454.6 390.7C467.1 378.2 467.1 357.9 454.6 345.4L445.2 336L546.8 234.4C585.8 195.4 585.8 132.2 546.8 93.3C507.8 54.4 444.6 54.3 405.7 93.3zM119.4 387.3C104.4 402.3 96 422.7 96 443.9L96 486.3L69.4 526.2C60.9 538.9 62.6 555.8 73.4 566.6C84.2 577.4 101.1 579.1 113.8 570.6L153.7 544L196.1 544C217.3 544 237.7 535.6 252.7 520.6L362.1 411.2L316.8 365.9L207.4 475.3C204.4 478.3 200.3 480 196.1 480L160 480L160 443.9C160 439.7 161.7 435.6 164.7 432.6L274.1 323.2L228.8 277.9L119.4 387.3z"/></svg>
                </div>
                Style Inspector</label>
        </div>
    </div>
    <div onclick="save_styling_data()" style="color: white; display: flex; align-items: anchor-center; background-color: #565979; padding: 5px; border-radius: 21px; z-index: 1; position: absolute; top: 74vh !important;">
        <div style="width: 1.5rem; filter: invert(1); ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M320 576C178.6 576 64 461.4 64 320C64 178.6 178.6 64 320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576zM438 209.7C427.3 201.9 412.3 204.3 404.5 215L285.1 379.2L233 327.1C223.6 317.7 208.4 317.7 199.1 327.1C189.8 336.5 189.7 351.7 199.1 361L271.1 433C276.1 438 282.9 440.5 289.9 440C296.9 439.5 303.3 435.9 307.4 430.2L443.3 243.2C451.1 232.5 448.7 217.5 438 209.7z"/></svg>
        </div>
        Save Data
    </div>

    <div id="update-container">

    </div>
</div>


<script>
    // Variable to store the last time the file was updated
let lastTimestamp = 0;
const displayDiv = document.getElementById('update-container');

function sync_styling_ui() {
    // Send the last timestamp we know about to PHP
    fetch(`/control-panel/website-builder/engines/@interface.style.tile.xhr-script.php?last_time=${lastTimestamp}`)
        .then(response => response.json())
        .then(data => {
            if (data.changed) {
                lastTimestamp = data.newTimestamp;
                displayDiv.innerHTML = `${data.content}`;
                const Inputs = document.querySelectorAll('.edtinput_styling');
                // Loop through each element and attach an event listener
                Inputs.forEach(input => {
                    input.addEventListener('input', () => {
                        //save_styling_data(); 
                    });
                });

            }
        })
}

setInterval(sync_styling_ui, 2000);

async function save_styling_data() {
    const xhr = new XMLHttpRequest();
    const url = "/control-panel/website-builder/engines/@input.style.tile.change.php"; // Your PHP processing script
    
    const inputs = document.querySelectorAll('.edtinput_styling');
    const formData = new FormData();

    // 3. Loop through elements and append their name and value to formData
    inputs.forEach(input => {
        if (input.name) {
            formData.append(input.name, input.value);
        }
    });

    // 4. Configure the request
    xhr.open("POST", url, true);

    // 5. Setup event listeners for the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("Response from server:", xhr.responseText);
            alert("Data sent successfully!");
        } else if (xhr.readyState === 4) {
            console.error("An error occurred during the request.");
        }
    };

    // 6. Send the data
    xhr.send(formData);
}

</script>