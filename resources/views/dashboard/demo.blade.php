<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <style>
        /* Base styles */
        :root {
            --container-width: 1200px;
            --content-padding: 20px;
        }

        body {
            margin: 0;
            padding: 0;
            min-width: var(--container-width);
            overflow-x: auto;
        }

        .container {
            width: var(--container-width);
            margin: 0 auto;
            padding: 0 var(--content-padding);
            box-sizing: border-box;
        }

        /* Example grid layout */
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin: 20px 0;
        }

        .grid-item {
            background: #f0f0f0;
            padding: 20px;
            min-height: 200px;
        }

        /* Force desktop layout on mobile when in desktop mode */
        @media screen and (max-width: 1200px) {
            body {
                /* Prevent mobile browsers from applying their own zoom */
                -webkit-text-size-adjust: 100%;
                text-size-adjust: 100%;
            }

            /* Maintain desktop grid layout */
            .grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Optional: Add zoom controls for better mobile desktop mode interaction */
        .zoom-controls {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.9);
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            display: none;
        }

        @media screen and (max-width: 1200px) {
            .zoom-controls {
                display: block;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Responsive Desktop Layout</h1>
        <div class="grid">
            <div class="grid-item">Content 1</div>
            <div class="grid-item">Content 2</div>
            <div class="grid-item">Content 3</div>
        </div>
    </div>

    <div class="zoom-controls">
        <button onclick="adjustZoom(0.9)">Zoom Out</button>
        <button onclick="adjustZoom(1.1)">Zoom In</button>
    </div>

    <script>
        // Simple zoom control functionality
        let currentZoom = 1;
        function adjustZoom(factor) {
            currentZoom *= factor;
            document.body.style.zoom = currentZoom;
        }
    </script>
</body>
</html>
