<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Writer's Mode V2</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* --- ASTRA-INSPIRED DESIGN --- */
        :root {
            --astra-blue: #0274be;
            --astra-dark: #1e1e1e;
            --astra-shadow: 0 8px 24px rgba(149, 157, 165, 0.2);
        }

        body { font-family: 'Inter', sans-serif; background: #f0f2f5; padding: 50px; }
        
        /* Container Sections */
        [section="true"] {
            background: white;
            margin-bottom: 30px;
            padding: 40px;
            border-radius: 12px;
            border: 2px dashed transparent;
            transition: border 0.3s ease;
            position: relative;
        }

        /* Hover indicator for editable elements */
        [element="true"] {
            position: relative;
            transition: outline 0.2s ease;
            cursor: pointer;
        }

        [element="true"]:hover {
            outline: 2px solid var(--astra-blue);
            outline-offset: 4px;
        }

        /* --- FLOATING TOOLBAR --- */
        #wm-toolbar {
            position: absolute;
            display: none;
            flex-direction: row;
            background: var(--astra-dark);
            border-radius: 6px;
            padding: 4px;
            gap: 4px;
            z-index: 10000;
            box-shadow: var(--astra-shadow);
            pointer-events: all;
        }

        .wm-btn {
            background: transparent;
            border: none;
            color: white;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border-radius: 4px;
            font-size: 13px;
            transition: background 0.2s;
        }

        .wm-btn:hover { background: var(--astra-blue); }
        .wm-btn.save { color: #00ff88; }
        .wm-hidden { display: none; }

        /* Editing State */
        .is-editing {
            outline: 2px solid #00ff88 !important;
            background: rgba(0, 255, 136, 0.05);
        }
    </style>
</head>
<body>

    <section section="true" id="hero-area">
        <h2 element="true" type="text" data-anchor-id="header-1">Build Something Beautiful</h2>
        <p element="true" type="text" data-anchor-id="para-1">Hover me to edit text or move me around.</p>
        <img element="true" type="image" data-anchor-id="img-1" src="https://picsum.photos/400/200" style="width:200px; border-radius:8px;">
        <br><br>
        <a element="true" type="link" data-anchor-id="btn-1" href="https://google.com" style="color: var(--astra-blue); font-weight: bold;">Click to Edit Link</a>
    </section>

    <section section="true" id="feature-area">
        <h3 element="true" type="text" data-anchor-id="header-2">Second Section</h3>
        <p element="true" type="text" data-anchor-id="para-2">I cannot be moved into the section above!</p>
    </section>

    <div id="wm-toolbar">
        <button class="wm-btn" onclick="WriterMode.move('up')" title="Move Up"><i class="fas fa-arrow-up"></i></button>
        <button class="wm-btn" onclick="WriterMode.move('down')" title="Move Down"><i class="fas fa-arrow-down"></i></button>
        <div style="width:1px; background: #444; margin: 0 4px;"></div>
        
        <button id="btn-edit-text" class="wm-btn" onclick="WriterMode.editText()"><i class="fas fa-pen"></i></button>
        <button id="btn-edit-img" class="wm-btn wm-hidden" onclick="WriterMode.editImage()"><i class="fas fa-image"></i></button>
        <button id="btn-edit-link" class="wm-btn wm-hidden" onclick="WriterMode.editLink()"><i class="fas fa-link"></i></button>
        
        <button id="btn-save" class="wm-btn save wm-hidden" onclick="WriterMode.saveText()"><i class="fas fa-check"></i></button>
    </div>

    <script>
        const WriterMode = (() => {
            const toolbar = document.getElementById('wm-toolbar');
            let activeElement = null;
            let isEditing = false;

            // 1. POSITIONING LOGIC
            document.addEventListener('mouseover', (e) => {
                if (isEditing) return;
                
                const el = e.target.closest('[element="true"]');
                if (el) {
                    activeElement = el;
                    showToolbar(el);
                }
            });

            // Prevent toolbar from disappearing when moving mouse to it
            toolbar.addEventListener('mouseenter', () => { toolbar.style.display = 'flex'; });

            function showToolbar(el) {
                const rect = el.getBoundingClientRect();
                const type = el.getAttribute('type');

                toolbar.style.display = 'flex';
                toolbar.style.top = `${rect.top + window.scrollY - 40}px`;
                toolbar.style.left = `${rect.left}px`;

                // Toggle Icons based on type
                document.getElementById('btn-edit-text').classList.toggle('wm-hidden', type !== 'text');
                document.getElementById('btn-edit-img').classList.toggle('wm-hidden', type !== 'image');
                document.getElementById('btn-edit-link').classList.toggle('wm-hidden', type !== 'link');
            }

            // 2. EDITING LOGIC
            return {
                editText: () => {
                    isEditing = true;
                    activeElement.contentEditable = true;
                    activeElement.focus();
                    activeElement.classList.add('is-editing');
                    document.getElementById('btn-save').classList.remove('wm-hidden');
                },

                saveText: () => {
                    isEditing = false;
                    activeElement.contentEditable = false;
                    activeElement.classList.remove('is-editing');
                    document.getElementById('btn-save').classList.add('wm-hidden');
                    
                    syncData(activeElement.getAttribute('data-anchor-id'), 'text', activeElement.innerHTML);
                },

                editImage: () => {
                    const newSrc = prompt("Paste new Image URL:", activeElement.src);
                    if (newSrc) {
                        activeElement.src = newSrc;
                        syncData(activeElement.getAttribute('data-anchor-id'), 'image', newSrc);
                    }
                },

                editLink: () => {
                    const newHref = prompt("Enter New URL:", activeElement.href);
                    if (newHref) {
                        activeElement.href = newHref;
                        syncData(activeElement.getAttribute('data-anchor-id'), 'link', newHref);
                    }
                },

                // 3. REARRANGE LOGIC (Within Section Boundary)
                move: (direction) => {
                    const section = activeElement.closest('[section="true"]');
                    const anchorId = activeElement.getAttribute('data-anchor-id');
                    
                    if (direction === 'up') {
                        const prev = activeElement.previousElementSibling;
                        if (prev && prev.getAttribute('element') === 'true') {
                            section.insertBefore(activeElement, prev);
                        }
                    } else {
                        const next = activeElement.nextElementSibling;
                        if (next && next.getAttribute('element') === 'true') {
                            section.insertBefore(next, activeElement);
                        }
                    }
                    
                    // After moving, re-position toolbar to follow the element
                    showToolbar(activeElement);

                    // Detect New Order
                    const newOrder = Array.from(section.querySelectorAll('[element="true"]'))
                                         .map(el => el.getAttribute('data-anchor-id'));
                    
                    syncData(anchorId, 'reorder', newOrder);
                }
            };
        })();

        // 4. BACKEND SYNC (To PHP)
        function syncData(anchorId, type, content) {
            const data = {
                anchor: anchorId,
                action: type,
                payload: content
            };

            console.log("Sending to PHP:", data);

            // Fetch example:
            /*
            fetch('save_changes.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });
            */
        }
    </script>
</body>
</html>