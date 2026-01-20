<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website Builder</title>

    <script src="https://kit.fontawesome.com/ad484b9e0a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap");

        * {
            box-sizing: border-box;
            outline: none;
        }


        /* Customize the scrollbar */
        ::-webkit-scrollbar {
            width: 7px !important;
            background-color: #3a3a3a00;
            float: left;
            overflow-y: scroll;
            margin-bottom: 25px;

        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color: #282828;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #6934b7 !important;
            margin-top: -10px;
            margin-bottom: -10px;
        }



        body,
        html {
            font-family: "Roboto", sans-serif;
            --large-font-size: 16px;
            --medium-font-size: 13px;
            --small-font-size: 12px;
        }

        html {
            --primary-color: #161724;
            --secondary-color: #F6F6FA;
            --tab-primary-color: #212337;
            --tab-secondary-color: #FFFFFF;
            --primary-font-color: #8D8EA1;
            --secondary-font-color: #4D4F60;
            --primary-tab-selected-font: #FFFFFF;
            --secondary-tab-selected-font: #4D4F60;
            --primary-tool-background: #212337;
            --secondary-tool-background: #FFFFFF;
            --icon-primary-color: #E1E2EA;
            --icon-secondary-color: #4D4F60;
            --primary-button-color: #E1E2EA;
            --secondary-button-color: #4D4F60;
            --content-primary-color: #FFFFFF;
            --content-secondary-color: #212337;
            --collapsible-primary-color: #2F3147;
            --collapsible-secondary-color: #EBEBF5;
            --collapsible-primary-background: #212337;
            --collapsible-secondary-background: linear-gradient(to top, #FFFFFF, #F1F1F7);
            --collapsible-primary-focus-color: #494B66;
            --collapsible-secondary-focus-color: #1ABDFF;
            --primary-content-background: #161724;
            --secondary-content-background: linear-gradient(to top, #FFFFFF, #F1F1F7);
            --primary-visual-area-bg: #212337;
            --secondary-visual-area-bg: #FFFFFF;
            --figma-primary-logo-color: #33354A;
            --figma-secondary-logo-color: #E7E7E7;
            --primary-dark-tool-color: #8D8EA1;
            --secondary-dark-tool-color: #4D4F60;
            --primary-light-tool-color: #8D8EA1;
            --secondary-light-tool-color: #4D4F60;
            --primary-border-color: rgba(255, 255, 255, 0.85);
            --secondary-border-color: rgba(38, 38, 38, 0.95);
        }

        html.switch {
            --secondary-color: #161724;
            --primary-color: #F6F6FA;
            --tab-primary-color: #FFFFFF;
            --tab-secondary-color: #161724;
            --primary-font-color: #4D4F60;
            --secondary-font-color: #8D8EA1;
            --primary-tab-selected-font: #4D4F60;
            --secondary-tab-selected-font: #FFFFFF;
            --primary-tool-background: #FFFFFF;
            --secondary-tool-background: #212337;
            --icon-primary-color: #4D4F60;
            --icon-secondary-color: #E1E2EA;
            --primary-button-color: #4D4F60;
            --secondary-button-color: #E1E2EA;
            --content-primary-color: #212337;
            --content-secondary-color: #FFFFFF;
            --collapsible-primary-color: #EBEBF5;
            --collapsible-secondary-color: #2F3147;
            --collapsible-primary-background: linear-gradient(to top, #FFFFFF, #F1F1F7);
            --collapsible-secondary-background: #212337;
            --collapsible-primary-focus-color: #1ABDFF;
            --collapsible-secondary-focus-color: #494B66;
            --primary-content-background: linear-gradient(to top, #FFFFFF, #F1F1F7);
            --secondary-content-background: #161724;
            --primary-visual-area-bg: #FFFFFF;
            --secondary-visual-area-bg: #212337;
            --figma-primary-logo-color: #EFEFEF;
            --figma-secondary-logo-color: #33354A;
            --primary-dark-tool-color: #4D4F60;
            --secondary-dark-tool-color: #8D8EA1;
            --primary-light-tool-color: #4D4F60;
            --secondary-light-tool-color: #E1E2EA;
            --primary-border-color: rgba(38, 38, 38, 0.95);
            --secondary-border-color: rgba(255, 255, 255, 0.85);
        }

        .figma-app {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .tab-bar {
            height: 38px;
        }

        .tab-bar .container {
            padding: 2px 8px 2px 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;

        }

        .left {
            display: flex;
            align-items: center;
        }

        .icon {
            line-height: 0;
            margin-top: 4px;
        }

        .circle {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .circles-wrapper {
            display: flex;
            justify-content: space-between;
            width: 40px;
        }

        .circle-red {
            background-color: #fc615d;
        }

        .circle-yellow {
            background-color: #fdbd41;
        }

        .circle-green {
            background-color: #35ca4a;
        }

        .nav-input {
            display: none;
        }

        .sections label {
            font-size: var(--medium-font-size);
            font-weight: 500;
            color: var(--primary-font-color);
            padding-right: 22px;
            padding-left: 10px;
            display: inline-flex;
            align-items: center;
            height: 36px;
            clip-path: polygon(0 0, 80% 0%, 93% 100%, 0% 100%);
            border-radius: 4px 0 4px 0;
        }

        .sections {
            display: flex;
            align-items: center;
            align-self: flex-end;
        }

        #website-builder-app:checked~.sections label[for="website-builder-app"],
        #components:checked~.sections label[for="components"],
        #add:checked~.sections label[for="add"] {
            background: var(--tab-primary-color);
            color: var(--primary-tab-selected-font);
        }

        .right {
            display: flex;
            align-items: center;
        }

        .switch-theme {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 24px;
            margin-left: 10px;
        }

        .switch-theme input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            border-radius: 40px;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .3s;
            transition: .3s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            border-radius: 50%;
            background-color: white;
            -webkit-transition: .3s;
            transition: .3s;
        }

        input:checked+.slider {
            background: linear-gradient(to right, #203a43, #2c5364);
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(16px);
            -ms-transform: translateX(16px);
            transform: translateX(16px);
        }

        .container {
            background: var(--primary-color);
            color: var(--secondary-color);
        }

        .right p {
            font-size: var(--medium-font-size);
            font-weight: 500;
        }

        .tool-bar {
            height: 44px;
            background-color: var(--primary-tool-background);
        }

        .icon-button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            width: 44px;
            background: none;
            border: none;
            color: var(--icon-primary-color);
        }

        .tool-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .line {
            margin-right: 6px;
        }

        .right {
            display: flex;
            align-items: center;
        }

        .icon-button {
            color: var(--primary-button-color);
        }

        .zoom-input {
            display: flex;
            align-items: center;
        }

        .zoom-input input {
            background: none;
            border: none;
            width: 50px;
        }

        .line.right {
            margin-left: 10px;
        }

        .menu {
            position: relative;
            display: inline-block;
        }

        button:hover {
            opacity: .5;
        }

        .menu nav {
            position: absolute;
            top: 134%;
            left: 4px;
            width: 200px;
            display: flex;
            flex-direction: column;
            padding: 10px;
            background-color: var(--primary-color);
            border-radius: 4px;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: .4s;
        }

        nav.is-opened {
            opacity: 1;
            visibility: visible;
            pointer-events: all;
        }

        .menu a {
            text-decoration: none;
            color: var(--primary-tab-selected-font);
            font-size: var(--medium-font-size);
            padding-left: 10px;
            padding-top: 10px;
        }

        nav.is-opened a {
            animation-name: test;
            animation-delay: .2s;
            animation-duration: .6s;
            animation-fill-mode: both;
        }

        @keyframes test {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        hr {
            width: 100%;
            border: .4px solid #ECECEC;
            opacity: .4;
            margin: 10px 0 0 0;
        }

        ::placeholder {
            font-size: var(--small-font-size);
            color: var(--primary-tab-selected-font);
        }

        .input-field {
            display: flex;
            justify-content: space-between;
            border-radius: 8px;
            border: 1.4px solid #1ABDFF;
            padding: 4px 4px 4px 4px;
        }

        .input-field input {
            background: none;
            border: none;
        }

        input[type="text"] {
            font-size: var(--small-font-size);
            color: var(--primary-font-color);
        }

        .app-content {
            display: flex;
            flex: 1;
        }

        .side-bar {
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            background-color: var(--tab-primary-color);
            width: 240px;
            font-weight: 500;
        }

        .side-bar-nav {
            flex-direction: row;
        }

        .side-bar-nav a {
            display: block;
            width: 100%;
            font-size: var(--medium-font-size);
            font-weight: 500;
            letter-spacing: 1px;
            text-decoration: none;
            color: var(--content-primary-color);
            padding-left: 10px;
            padding-top: 10px;
        }

        .arrow {
            margin-right: 5px;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
            margin: 0;
        }

        .collapsible-content * svg {
            margin-right: 4px;
        }

        .collapsible-accordion {
            color: var(--icon-primary-color);
            font-size: var(--medium-font-size);
        }

        .collapsible-sub-header {
            display: flex;
            align-items: center;
            padding-left: 16px;
            padding: 2px 0;
        }

        .collapsible-sub-header span {
            margin-right: 5px;
        }

        .collapsible-sub-content {
            padding-left: 36px;
        }

        .collapsible-sub-content li {
            display: flex;
            align-items: center;
        }

        .list-content-left,
        .list-content-right {
            display: flex;
            align-items: center;
        }

        .list-content-right {
            padding-right: 4px;
        }

        .content-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .font-color {
            color: #BB6BD9;
        }

        .collapsible-header {
            display: flex;
            align-items: center;
            background-color: var(--collapsible-primary-color);
        }

        .collapsible-header:focus {
            background: var(--collapsible-primary-focus-color);
        }

        .collapsible-accordion li {
            padding-top: 1px;
        }

        .inspector {
            width: 243px;
            background: var(--primary-tool-background);
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: var(--primary-content-background);
            flex: 1;
        }

        .content-area {
            background: var(--primary-visual-area-bg);
        }

        .content p {
            background: none;
            color: var(--primary-font-color);
            font-size: var(--small-font-size);
            font-weight: 500;
            left: 0;
        }

        span>svg {
            padding: 0;
        }

        .visual-area {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 70px;
        }

        .visual-area svg {
            max-width: 1000px;
            width: 100%;
            height: 100%;
            color: var(--figma-primary-logo-color);
        }

        .toggle-area {
            display: flex;
            align-items: center;
            font-size: var(--small-font-size);
            font-weight: 500;
            color: var(--primary-font-color);
            padding-left: 4px;
        }

        .inspector-sections label {
            font-size: var(--medium-font-size);
            font-weight: 500;
            color: var(--primary-font-color);
            padding: 10px 0;
        }

        .inspector-header {
            margin: 0;
            padding-bottom: 4px;
        }

        .wrapper {
            border-top: .01em solid var(--primary-border-color);
            padding: 10px;
        }

        .inspector-sections .wrapper {
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 0 10px;
        }

        #design:checked~.inspector-sections label[for="design"],
        #prototype:checked~.inspector-sections label[for="prototype"],
        #code:checked~.inspector-sections label[for="code"],
        #right-arrow:checked~.inspector-sections label[for="right-arrow"] {
            color: var(--secondary-color);
            border-bottom: 2px solid var(--secondary-color);
        }

        .inspector-tools .wrapper {
            display: flex;
            justify-content: space-between;
        }

        .nav-inspector {
            display: none;
        }

        .wrapper button {
            background: none;
            border: none;
            padding: 0;
        }

        .wrapper button:hover {
            opacity: .5;
        }

        .dark-item {
            color: var(--primary-dark-tool-color);
        }

        .light-item {
            color: var(--primary-light-tool-color);
        }

        .input-wrapper input {
            background: none;
            border-radius: 4px;
            padding: 0 6px;
            height: 26px;
            width: 70px;
            border: .5px solid var(--primary-light-tool-color);
        }

        .input-wrapper p {
            color: var(--primary-font-color);
            font-weight: 500;
            font-size: var(--small-font-size);
        }

        .input-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 86px;
            margin-right: 6px;
        }

        .inspector-inputs .left {
            display: flex;
            flex-wrap: wrap;
        }

        .inspector-inputs .wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .inspector-inputs {
            display: flex;
        }

        .constraints-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .first-constraint,
        .second-constraint {
            padding: 6px 0;
            display: flex;
            align-items: center;
        }

        .inspector-constraints .wrapper {
            justify-content: space-between;
        }

        .inspector-constraints p,
        .inspector-layer p,
        .header p {
            color: var(--secondary-color);
            font-weight: 500;
            font-size: var(--medium-font-size);
        }

        .export-text {
            font-weight: 500;
            font-size: var(--medium-font-size);
            color: var(--primary-dark-tool-color);
        }

        .layer-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .styled-select select {
            color: var(--secondary-color);
            padding: 6px 6px;
            border: none;
            box-shadow: none;
            background-color: transparent;
            background-image: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .styled-select {
            position: relative;
            border: 1px solid var(--primary-light-tool-color);
            border-radius: 4px;
            font-size: var(--small-font-size);
            width: 110px;
        }

        option {
            color: #161724;
        }

        .layer-wrapper input,
        .input-percent {
            background: none;
            border-radius: 4px;
            padding: 0 6px;
            height: 26px;
            width: 50px;
            border: 1px solid var(--primary-border-color);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .inspector,
        .side-bar {
            overflow: auto;
            height: calc(100vh - 82px);
            height: 100% !important;
        }

        .color-input-area {
            display: flex;
            align-items: center;
            border: 1.2px solid #3ED67E;
            background: #3ED67E 30%;
            width: 80px;
            height: 30px;
            border-radius: 4px;
        }

        .color-input-area input {
            padding-left: 2px;
            width: 56px;
            height: 26px;
            margin-left: auto;
            margin-right: 1px;
            border-radius: 0 3px 3px 0;
            border: none;
            background: var(--primary-tool-background);
        }

        .fill-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .inspector * svg:hover {
            opacity: .6;
        }

        .styled-select svg {
            position: absolute;
            top: 4px;
            right: 0;
            pointer-events: none;
            margin-left: auto;
        }
    </style>
</head>

<body style="padding: 0px; margin: 0px;">
    <div class="figma-app">
        <div class="tab-bar">
            <div class="container">
                <div class="left">
                    <input class="nav-input" name="nav" type="radio" id="figma-app" checked="">
                    <input class="nav-input" name="nav" type="radio" id="components">
                    <input class="nav-input" name="nav" type="radio" id="add">

                    <div class="icon" style="display: flex; align-items: center;">
                        <img style="max-width:2rem;" src="data:image/png;base64,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">
                        <span style="font-size: 10px;">Website Builder</span>
                    </div>
                </div>
                <div class="right">
                    <!-- 

                    <div class="toggle-area">
                        <p>Dark Mode</p>
                        <label class="switch-theme">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>

                    -->
                </div>
            </div>
        </div>
        <?php @include_once dirname(__FILE__) . "/interface.tool-bar.php"; ?>
        <div class="app-content">
            <?php #@include_once dirname(__FILE__) . "/interface.navbar.blade.php"; ?>
            <?php @include_once __PAGE_FILE__; ?>
            <?php #@include_once dirname(__FILE__)."/interface.inspector.blade.php"; 
            ?>
        </div>
    </div>
    <script>
        function toggle_canvas_size(request = "laptop") {
            let container = document.getElementById("canvas-engine-frame-holder");

            switch (request) {
                case 'phone':
                    container.style.width = "50vw";
                    break;
                case 'tablet':
                    container.style.width = "80vw";
                    break;
                default:
                    //Default Configurations For The Canvas 
                    container.style.width = "114vw";
                    break;
            }
        }


        document.addEventListener('DOMContentLoaded', function() {
            var checkbox = document.querySelector('input[type="checkbox"]');

            checkbox.addEventListener('change', function() {
                document.documentElement.classList.toggle('switch');
            });
        });

        const button = document.querySelector('.icon-button.inline');
        const nav = document.querySelector('nav');
        const links = document.querySelectorAll('a');
        const colorInput = document.querySelector('.color-input-area input');
        const colorArea = document.querySelector('.color-input-area');

        button.addEventListener('click', function() {
            nav.classList.toggle('is-opened');
            links.forEach(function(link, index) {
                link.setAttribute('style', `animation-delay: ${index * .1}s`);
            });
        });

        colorInput.addEventListener('keyup', (e) => {
            colorArea.style.backgroundColor = e.target.value;
            colorArea.style.borderColor = e.target.value;
        });
    </script>


</body>

</html>