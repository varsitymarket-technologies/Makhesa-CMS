<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        :root { --bg: #0f172a; --card-bg: #1e293b; --accent: #38bdf8; }
        body { font-family: 'Inter', sans-serif; background: #0b0f1a; color: white; }

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
            padding: 20px;
            background: var(--bg);
            border-radius: 16px;
            border: 1px solid #334155;
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
            background: rgba(0,0,0,0.7);
            padding: 8px;
            font-size: 12px;
            text-align: center;
        }
    </style>
</head>
<body>

<div id="explorer-overlay">
    <div class="grid-container" id="grid">
        </div>
</div>

<script>
    // List of components to show in the 3x3 grid
    const components = [
        'hero_v1', 'login_card', 'price_table', 
        'navbar_top', 'footer_dark', 'contact_mini',
        'stat_cards', 'newsletter', 'team_grid'
    ];

    const grid = document.getElementById('grid');

    // Populate the 3x3 Grid
    components.forEach(id => {
        const card = document.createElement('div');
        card.className = 'component-card';
        card.innerHTML = `
            <iframe src="http://localhost:9000/@block/agency/pricing/?block_id=${id}&preview=true"></iframe>
            <div class="card-label">${id.replace('_', ' ').toUpperCase()}</div>
        `;
        
        // When clicked, fetch "Live Data" from PHP
        card.onclick = () => selectComponent(id);
        grid.appendChild(card);
    });

    function selectComponent(id) {
        alert("Fetching live data for: " + id);
        // In a real app, you'd update your main editor or open a full-screen preview
        window.location.href = `render_block.php?block_id=${id}&live=true`;
    }
</script>

</body>
</html>