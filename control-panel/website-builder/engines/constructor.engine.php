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
                        <img style="max-width:2rem;" src="http://localhost:3000/@rescources/site/varsitymarket-technologies/">
                        <span style="font-size: 10px;">Website Builder</span>
                    </div>
                </div>
                <div class="right">
                    <div class="toggle-area">
                        <p>Dark Mode</p>
                        <label class="switch-theme">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <?php @include_once dirname(__FILE__) . "/interface.tool-bar.php"; ?>
        <div class="app-content">
            <?php @include_once dirname(__FILE__) . "/interface.navbar.blade.php"; ?>
            <?php @include_once dirname(__FILE__) . "/interface.editor.blade.php"; ?>
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