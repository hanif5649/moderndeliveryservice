
<?php
include "config.php"; // config one folder up

$tracking_number = isset($_GET['tracking_number']) ? trim($_GET['tracking_number']) : "";
$package = null;
$history = [];

if($tracking_number !== ""){
    $tracking_number = mysqli_real_escape_string($conn, $tracking_number);

    // Fetch package
    $sql = "SELECT * FROM packages WHERE tracking_number='$tracking_number' LIMIT 1";
    $result = $conn->query($sql);
    $package = $result->fetch_assoc();

    if($package){
        // Fetch history
        $history_sql = "SELECT * FROM package_history WHERE package_id='".$package['id']."' ORDER BY created_at DESC";
        $history = $conn->query($history_sql);
    }
}
?>


<html dir="ltr" lang="en-US" class="scroll-smooth" style="--vh: 9.32px;">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" content="Mordern Delivery Services is a global logistics service provider offering premium shipping, courier, and tracking services worldwide." />
        <meta name="keywords" content="logistics, shipping, freight, courier, transport, global delivery, package tracking" />
        <meta name="author" content="Mordern Delivery Services" />
        <meta name="robots" content="index, follow" />
        <meta name="google-site-verification" content="" />

        <!-- Modern Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet" />

        <!-- Tailwind CSS -->
        <script type="text/javascript" async="" src="https://static.getbutton.io/widget-send-button/js/init.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Alpine.js -->
        <script defer="" src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Heroicons -->
        <script src="https://unpkg.com/heroicons@2.0.16/24/outline/index.js" type="module"></script>

        <!-- Font Awesome for icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

        <link href="https://shippyexpress.developerplug.com/storage/app/public/photos/6wksCFmpcYnDWFfFBaiePoVuejJeQGX0capHfOY4.jpg" rel="shortcut icon" />
        <title>Welcome to Mordern Delivery Services - Premium Global Shipping Solutions</title>

        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            inter: ["Inter", "sans-serif"],
                        },
                        colors: {
                            primary: {
                                50: "#eff6ff",
                                100: "#dbeafe",
                                200: "#bfdbfe",
                                300: "#93c5fd",
                                400: "#60a5fa",
                                500: "#3b82f6",
                                600: "#2563eb",
                                700: "#1d4ed8",
                                800: "#1e40af",
                                900: "#1e3a8a",
                            },
                            secondary: {
                                50: "#f8fafc",
                                100: "#f1f5f9",
                                200: "#e2e8f0",
                                300: "#cbd5e1",
                                400: "#94a3b8",
                                500: "#64748b",
                                600: "#475569",
                                700: "#334155",
                                800: "#1e293b",
                                900: "#0f172a",
                            },
                        },
                        animation: {
                            "fade-in": "fadeIn 0.5s ease-in-out",
                            "slide-up": "slideUp 0.6s ease-out forwards",
                            "bounce-slow": "bounce 2s infinite",
                        },
                        keyframes: {
                            fadeIn: {
                                "0%": { opacity: "0" },
                                "100%": { opacity: "1" },
                            },
                            slideUp: {
                                "0%": { transform: "translateY(20px)", opacity: "0" },
                                "100%": { transform: "translateY(0)", opacity: "1" },
                            },
                        },
                    },
                },
            };
        </script>

        <style>
            /* Alpine.js x-cloak directive */
            [x-cloak] {
                display: none !important;
            }

            body {
                top: 0px !important;
            }

            .skiptranslate iframe {
                visibility: hidden !important;
            }

            /* Custom scrollbar */
            ::-webkit-scrollbar {
                width: 6px;
            }

            ::-webkit-scrollbar-track {
                background: #f1f5f9;
            }

            ::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 3px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: #94a3b8;
            }

            /* Smooth transitions */
            * {
                transition: all 0.3s ease;
            }
        </style>
        <style>
            *,
            ::before,
            ::after {
                --tw-border-spacing-x: 0;
                --tw-border-spacing-y: 0;
                --tw-translate-x: 0;
                --tw-translate-y: 0;
                --tw-rotate: 0;
                --tw-skew-x: 0;
                --tw-skew-y: 0;
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                --tw-pan-x: ;
                --tw-pan-y: ;
                --tw-pinch-zoom: ;
                --tw-scroll-snap-strictness: proximity;
                --tw-gradient-from-position: ;
                --tw-gradient-via-position: ;
                --tw-gradient-to-position: ;
                --tw-ordinal: ;
                --tw-slashed-zero: ;
                --tw-numeric-figure: ;
                --tw-numeric-spacing: ;
                --tw-numeric-fraction: ;
                --tw-ring-inset: ;
                --tw-ring-offset-width: 0px;
                --tw-ring-offset-color: #fff;
                --tw-ring-color: rgb(59 130 246 / 0.5);
                --tw-ring-offset-shadow: 0 0 #0000;
                --tw-ring-shadow: 0 0 #0000;
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                --tw-blur: ;
                --tw-brightness: ;
                --tw-contrast: ;
                --tw-grayscale: ;
                --tw-hue-rotate: ;
                --tw-invert: ;
                --tw-saturate: ;
                --tw-sepia: ;
                --tw-drop-shadow: ;
                --tw-backdrop-blur: ;
                --tw-backdrop-brightness: ;
                --tw-backdrop-contrast: ;
                --tw-backdrop-grayscale: ;
                --tw-backdrop-hue-rotate: ;
                --tw-backdrop-invert: ;
                --tw-backdrop-opacity: ;
                --tw-backdrop-saturate: ;
                --tw-backdrop-sepia: ;
                --tw-contain-size: ;
                --tw-contain-layout: ;
                --tw-contain-paint: ;
                --tw-contain-style: ;
            }
            ::backdrop {
                --tw-border-spacing-x: 0;
                --tw-border-spacing-y: 0;
                --tw-translate-x: 0;
                --tw-translate-y: 0;
                --tw-rotate: 0;
                --tw-skew-x: 0;
                --tw-skew-y: 0;
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                --tw-pan-x: ;
                --tw-pan-y: ;
                --tw-pinch-zoom: ;
                --tw-scroll-snap-strictness: proximity;
                --tw-gradient-from-position: ;
                --tw-gradient-via-position: ;
                --tw-gradient-to-position: ;
                --tw-ordinal: ;
                --tw-slashed-zero: ;
                --tw-numeric-figure: ;
                --tw-numeric-spacing: ;
                --tw-numeric-fraction: ;
                --tw-ring-inset: ;
                --tw-ring-offset-width: 0px;
                --tw-ring-offset-color: #fff;
                --tw-ring-color: rgb(59 130 246 / 0.5);
                --tw-ring-offset-shadow: 0 0 #0000;
                --tw-ring-shadow: 0 0 #0000;
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                --tw-blur: ;
                --tw-brightness: ;
                --tw-contrast: ;
                --tw-grayscale: ;
                --tw-hue-rotate: ;
                --tw-invert: ;
                --tw-saturate: ;
                --tw-sepia: ;
                --tw-drop-shadow: ;
                --tw-backdrop-blur: ;
                --tw-backdrop-brightness: ;
                --tw-backdrop-contrast: ;
                --tw-backdrop-grayscale: ;
                --tw-backdrop-hue-rotate: ;
                --tw-backdrop-invert: ;
                --tw-backdrop-opacity: ;
                --tw-backdrop-saturate: ;
                --tw-backdrop-sepia: ;
                --tw-contain-size: ;
                --tw-contain-layout: ;
                --tw-contain-paint: ;
                --tw-contain-style: ;
            } /* ! tailwindcss v3.4.17 | MIT License | https://tailwindcss.com */
            *,
            ::after,
            ::before {
                box-sizing: border-box;
                border-width: 0;
                border-style: solid;
                border-color: #e5e7eb;
            }
            ::after,
            ::before {
                --tw-content: "";
            }
            :host,
            html {
                line-height: 1.5;
                -webkit-text-size-adjust: 100%;
                -moz-tab-size: 4;
                tab-size: 4;
                font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-feature-settings: normal;
                font-variation-settings: normal;
                -webkit-tap-highlight-color: transparent;
            }
            body {
                margin: 0;
                line-height: inherit;
            }
            hr {
                height: 0;
                color: inherit;
                border-top-width: 1px;
            }
            abbr:where([title]) {
                -webkit-text-decoration: underline dotted;
                text-decoration: underline dotted;
            }
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-size: inherit;
                font-weight: inherit;
            }
            a {
                color: inherit;
                text-decoration: inherit;
            }
            b,
            strong {
                font-weight: bolder;
            }
            code,
            kbd,
            pre,
            samp {
                font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
                font-feature-settings: normal;
                font-variation-settings: normal;
                font-size: 1em;
            }
            small {
                font-size: 80%;
            }
            sub,
            sup {
                font-size: 75%;
                line-height: 0;
                position: relative;
                vertical-align: baseline;
            }
            sub {
                bottom: -0.25em;
            }
            sup {
                top: -0.5em;
            }
            table {
                text-indent: 0;
                border-color: inherit;
                border-collapse: collapse;
            }
            button,
            input,
            optgroup,
            select,
            textarea {
                font-family: inherit;
                font-feature-settings: inherit;
                font-variation-settings: inherit;
                font-size: 100%;
                font-weight: inherit;
                line-height: inherit;
                letter-spacing: inherit;
                color: inherit;
                margin: 0;
                padding: 0;
            }
            button,
            select {
                text-transform: none;
            }
            button,
            input:where([type="button"]),
            input:where([type="reset"]),
            input:where([type="submit"]) {
                -webkit-appearance: button;
                background-color: transparent;
                background-image: none;
            }
            :-moz-focusring {
                outline: auto;
            }
            :-moz-ui-invalid {
                box-shadow: none;
            }
            progress {
                vertical-align: baseline;
            }
            ::-webkit-inner-spin-button,
            ::-webkit-outer-spin-button {
                height: auto;
            }
            [type="search"] {
                -webkit-appearance: textfield;
                outline-offset: -2px;
            }
            ::-webkit-search-decoration {
                -webkit-appearance: none;
            }
            ::-webkit-file-upload-button {
                -webkit-appearance: button;
                font: inherit;
            }
            summary {
                display: list-item;
            }
            blockquote,
            dd,
            dl,
            figure,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            hr,
            p,
            pre {
                margin: 0;
            }
            fieldset {
                margin: 0;
                padding: 0;
            }
            legend {
                padding: 0;
            }
            menu,
            ol,
            ul {
                list-style: none;
                margin: 0;
                padding: 0;
            }
            dialog {
                padding: 0;
            }
            textarea {
                resize: vertical;
            }
            input::placeholder,
            textarea::placeholder {
                opacity: 1;
                color: #9ca3af;
            }
            [role="button"],
            button {
                cursor: pointer;
            }
            :disabled {
                cursor: default;
            }
            audio,
            canvas,
            embed,
            iframe,
            img,
            object,
            svg,
            video {
                display: block;
                vertical-align: middle;
            }
            img,
            video {
                max-width: 100%;
                height: auto;
            }
            [hidden]:where(:not([hidden="until-found"])) {
                display: none;
            }
            .fixed {
                position: fixed;
            }
            .absolute {
                position: absolute;
            }
            .relative {
                position: relative;
            }
            .inset-0 {
                inset: 0px;
            }
            .left-0 {
                left: 0px;
            }
            .top-full {
                top: 100%;
            }
            .bottom-4 {
                bottom: 1rem;
            }
            .left-4 {
                left: 1rem;
            }
            .left-8 {
                left: 2rem;
            }
            .top-0 {
                top: 0px;
            }
            .top-1\/2 {
                top: 50%;
            }
            .right-4 {
                right: 1rem;
            }
            .z-50 {
                z-index: 50;
            }
            .z-\[9999\] {
                z-index: 9999;
            }
            .z-0 {
                z-index: 0;
            }
            .z-10 {
                z-index: 10;
            }
            .z-\[1000\] {
                z-index: 1000;
            }
            .mx-auto {
                margin-left: auto;
                margin-right: auto;
            }
            .mb-2 {
                margin-bottom: 0.5rem;
            }
            .mb-4 {
                margin-bottom: 1rem;
            }
            .ml-1 {
                margin-left: 0.25rem;
            }
            .mr-2 {
                margin-right: 0.5rem;
            }
            .mr-3 {
                margin-right: 0.75rem;
            }
            .mt-2 {
                margin-top: 0.5rem;
            }
            .mt-4 {
                margin-top: 1rem;
            }
            .mb-3 {
                margin-bottom: 0.75rem;
            }
            .mb-6 {
                margin-bottom: 1.5rem;
            }
            .mb-8 {
                margin-bottom: 2rem;
            }
            .ml-2 {
                margin-left: 0.5rem;
            }
            .ml-4 {
                margin-left: 1rem;
            }
            .ml-auto {
                margin-left: auto;
            }
            .mr-1 {
                margin-right: 0.25rem;
            }
            .mt-0\.5 {
                margin-top: 0.125rem;
            }
            .mt-1 {
                margin-top: 0.25rem;
            }
            .mt-3 {
                margin-top: 0.75rem;
            }
            .mt-6 {
                margin-top: 1.5rem;
            }
            .mt-8 {
                margin-top: 2rem;
            }
            .block {
                display: block;
            }
            .flex {
                display: flex;
            }
            .inline-flex {
                display: inline-flex;
            }
            .grid {
                display: grid;
            }
            .hidden {
                display: none;
            }
            .h-12 {
                height: 3rem;
            }
            .h-20 {
                height: 5rem;
            }
            .h-24 {
                height: 6rem;
            }
            .h-3 {
                height: 0.75rem;
            }
            .h-1 {
                height: 0.25rem;
            }
            .h-16 {
                height: 4rem;
            }
            .h-4 {
                height: 1rem;
            }
            .h-5 {
                height: 1.25rem;
            }
            .h-6 {
                height: 1.5rem;
            }
            .h-8 {
                height: 2rem;
            }
            .h-\[550px\] {
                height: 550px;
            }
            .h-auto {
                height: auto;
            }
            .h-full {
                height: 100%;
            }
            .h-10 {
                height: 2.5rem;
            }
            .w-12 {
                width: 3rem;
            }
            .w-24 {
                width: 6rem;
            }
            .w-3 {
                width: 0.75rem;
            }
            .w-64 {
                width: 16rem;
            }
            .w-80 {
                width: 20rem;
            }
            .w-auto {
                width: auto;
            }
            .w-full {
                width: 100%;
            }
            .w-0\.5 {
                width: 0.125rem;
            }
            .w-1 {
                width: 0.25rem;
            }
            .w-16 {
                width: 4rem;
            }
            .w-4 {
                width: 1rem;
            }
            .w-5 {
                width: 1.25rem;
            }
            .w-6 {
                width: 1.5rem;
            }
            .w-8 {
                width: 2rem;
            }
            .w-10 {
                width: 2.5rem;
            }
            .max-w-7xl {
                max-width: 80rem;
            }
            .max-w-sm {
                max-width: 24rem;
            }
            .flex-1 {
                flex: 1 1 0%;
            }
            .flex-shrink-0 {
                flex-shrink: 0;
            }
            .-translate-y-1\/2 {
                --tw-translate-y: -50%;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            }
            .scale-95 {
                --tw-scale-x: 0.95;
                --tw-scale-y: 0.95;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            }
            .scale-100 {
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            }
            .transform {
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            }
            @keyframes bounce {
                0%,
                100% {
                    transform: translateY(-25%);
                    animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
                }
                50% {
                    transform: none;
                    animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
                }
            }
            .animate-bounce {
                animation: bounce 1s infinite;
            }
            @keyframes spin {
                to {
                    transform: rotate(360deg);
                }
            }
            .animate-spin {
                animation: spin 1s linear infinite;
            }
            .grid-cols-1 {
                grid-template-columns: repeat(1, minmax(0, 1fr));
            }
            .flex-col {
                flex-direction: column;
            }
            .flex-wrap {
                flex-wrap: wrap;
            }
            .items-start {
                align-items: flex-start;
            }
            .items-center {
                align-items: center;
            }
            .justify-center {
                justify-content: center;
            }
            .justify-between {
                justify-content: space-between;
            }
            .gap-3 {
                gap: 0.75rem;
            }
            .gap-4 {
                gap: 1rem;
            }
            .gap-6 {
                gap: 1.5rem;
            }
            .gap-8 {
                gap: 2rem;
            }
            .space-x-2 > :not([hidden]) ~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(0.5rem * var(--tw-space-x-reverse));
                margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
            }
            .space-x-4 > :not([hidden]) ~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(1rem * var(--tw-space-x-reverse));
                margin-left: calc(1rem * calc(1 - var(--tw-space-x-reverse)));
            }
            .space-x-6 > :not([hidden]) ~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(1.5rem * var(--tw-space-x-reverse));
                margin-left: calc(1.5rem * calc(1 - var(--tw-space-x-reverse)));
            }
            .space-x-8 > :not([hidden]) ~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(2rem * var(--tw-space-x-reverse));
                margin-left: calc(2rem * calc(1 - var(--tw-space-x-reverse)));
            }
            .space-y-2 > :not([hidden]) ~ :not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse)));
                margin-bottom: calc(0.5rem * var(--tw-space-y-reverse));
            }
            .space-y-3 > :not([hidden]) ~ :not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(0.75rem * calc(1 - var(--tw-space-y-reverse)));
                margin-bottom: calc(0.75rem * var(--tw-space-y-reverse));
            }
            .space-y-6 > :not([hidden]) ~ :not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
                margin-bottom: calc(1.5rem * var(--tw-space-y-reverse));
            }
            .space-x-3 > :not([hidden]) ~ :not([hidden]) {
                --tw-space-x-reverse: 0;
                margin-right: calc(0.75rem * var(--tw-space-x-reverse));
                margin-left: calc(0.75rem * calc(1 - var(--tw-space-x-reverse)));
            }
            .space-y-4 > :not([hidden]) ~ :not([hidden]) {
                --tw-space-y-reverse: 0;
                margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse)));
                margin-bottom: calc(1rem * var(--tw-space-y-reverse));
            }
            .overflow-hidden {
                overflow: hidden;
            }
            .scroll-smooth {
                scroll-behavior: smooth;
            }
            .truncate {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
            .rounded-full {
                border-radius: 9999px;
            }
            .rounded-lg {
                border-radius: 0.5rem;
            }
            .rounded-md {
                border-radius: 0.375rem;
            }
            .rounded-xl {
                border-radius: 0.75rem;
            }
            .rounded {
                border-radius: 0.25rem;
            }
            .border {
                border-width: 1px;
            }
            .border-2 {
                border-width: 2px;
            }
            .border-4 {
                border-width: 4px;
            }
            .border-b {
                border-bottom-width: 1px;
            }
            .border-b-2 {
                border-bottom-width: 2px;
            }
            .border-t {
                border-top-width: 1px;
            }
            .border-gray-200 {
                --tw-border-opacity: 1;
                border-color: rgb(229 231 235 / var(--tw-border-opacity, 1));
            }
            .border-gray-300 {
                --tw-border-opacity: 1;
                border-color: rgb(209 213 219 / var(--tw-border-opacity, 1));
            }
            .border-transparent {
                border-color: transparent;
            }
            .border-primary-100 {
                --tw-border-opacity: 1;
                border-color: rgb(219 234 254 / var(--tw-border-opacity, 1));
            }
            .border-primary-500 {
                --tw-border-opacity: 1;
                border-color: rgb(59 130 246 / var(--tw-border-opacity, 1));
            }
            .border-white {
                --tw-border-opacity: 1;
                border-color: rgb(255 255 255 / var(--tw-border-opacity, 1));
            }
            .border-gray-700 {
                --tw-border-opacity: 1;
                border-color: rgb(55 65 81 / var(--tw-border-opacity, 1));
            }
            .border-t-transparent {
                border-top-color: transparent;
            }
            .bg-gray-50 {
                --tw-bg-opacity: 1;
                background-color: rgb(249 250 251 / var(--tw-bg-opacity, 1));
            }
            .bg-primary-600 {
                --tw-bg-opacity: 1;
                background-color: rgb(37 99 235 / var(--tw-bg-opacity, 1));
            }
            .bg-primary-700 {
                --tw-bg-opacity: 1;
                background-color: rgb(29 78 216 / var(--tw-bg-opacity, 1));
            }
            .bg-white {
                --tw-bg-opacity: 1;
                background-color: rgb(255 255 255 / var(--tw-bg-opacity, 1));
            }
            .bg-amber-100 {
                --tw-bg-opacity: 1;
                background-color: rgb(254 243 199 / var(--tw-bg-opacity, 1));
            }
            .bg-amber-500 {
                --tw-bg-opacity: 1;
                background-color: rgb(245 158 11 / var(--tw-bg-opacity, 1));
            }
            .bg-blue-100 {
                --tw-bg-opacity: 1;
                background-color: rgb(219 234 254 / var(--tw-bg-opacity, 1));
            }
            .bg-blue-500 {
                --tw-bg-opacity: 1;
                background-color: rgb(59 130 246 / var(--tw-bg-opacity, 1));
            }
            .bg-blue-600 {
                --tw-bg-opacity: 1;
                background-color: rgb(37 99 235 / var(--tw-bg-opacity, 1));
            }
            .bg-gray-100 {
                --tw-bg-opacity: 1;
                background-color: rgb(243 244 246 / var(--tw-bg-opacity, 1));
            }
            .bg-gray-200 {
                --tw-bg-opacity: 1;
                background-color: rgb(229 231 235 / var(--tw-bg-opacity, 1));
            }
            .bg-green-500 {
                --tw-bg-opacity: 1;
                background-color: rgb(34 197 94 / var(--tw-bg-opacity, 1));
            }
            .bg-green-600 {
                --tw-bg-opacity: 1;
                background-color: rgb(22 163 74 / var(--tw-bg-opacity, 1));
            }
            .bg-primary-50\/60 {
                background-color: rgb(239 246 255 / 0.6);
            }
            .bg-white\/20 {
                background-color: rgb(255 255 255 / 0.2);
            }
            .bg-gray-800 {
                --tw-bg-opacity: 1;
                background-color: rgb(31 41 55 / var(--tw-bg-opacity, 1));
            }
            .bg-opacity-90 {
                --tw-bg-opacity: 0.9;
            }
            .bg-gradient-to-r {
                background-image: linear-gradient(to right, var(--tw-gradient-stops));
            }
            .bg-gradient-to-br {
                background-image: linear-gradient(to bottom right, var(--tw-gradient-stops));
            }
            .from-primary-700 {
                --tw-gradient-from: #1d4ed8 var(--tw-gradient-from-position);
                --tw-gradient-to: rgb(29 78 216 / 0) var(--tw-gradient-to-position);
                --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
            }
            .from-gray-900 {
                --tw-gradient-from: #111827 var(--tw-gradient-from-position);
                --tw-gradient-to: rgb(17 24 39 / 0) var(--tw-gradient-to-position);
                --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
            }
            .via-gray-800 {
                --tw-gradient-to: rgb(31 41 55 / 0) var(--tw-gradient-to-position);
                --tw-gradient-stops: var(--tw-gradient-from), #1f2937 var(--tw-gradient-via-position), var(--tw-gradient-to);
            }
            .to-primary-600 {
                --tw-gradient-to: #2563eb var(--tw-gradient-to-position);
            }
            .to-gray-900 {
                --tw-gradient-to: #111827 var(--tw-gradient-to-position);
            }
            .object-contain {
                object-fit: contain;
            }
            .object-cover {
                object-fit: cover;
            }
            .p-2 {
                padding: 0.5rem;
            }
            .p-3 {
                padding: 0.75rem;
            }
            .p-4 {
                padding: 1rem;
            }
            .p-0 {
                padding: 0px;
            }
            .p-6 {
                padding: 1.5rem;
            }
            .p-8 {
                padding: 2rem;
            }
            .px-3 {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
            .px-4 {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            .px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }
            .py-2 {
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
            }
            .py-3 {
                padding-top: 0.75rem;
                padding-bottom: 0.75rem;
            }
            .py-4 {
                padding-top: 1rem;
                padding-bottom: 1rem;
            }
            .py-6 {
                padding-top: 1.5rem;
                padding-bottom: 1.5rem;
            }
            .px-2 {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }
            .px-2\.5 {
                padding-left: 0.625rem;
                padding-right: 0.625rem;
            }
            .py-0\.5 {
                padding-top: 0.125rem;
                padding-bottom: 0.125rem;
            }
            .py-1 {
                padding-top: 0.25rem;
                padding-bottom: 0.25rem;
            }
            .py-5 {
                padding-top: 1.25rem;
                padding-bottom: 1.25rem;
            }
            .py-8 {
                padding-top: 2rem;
                padding-bottom: 2rem;
            }
            .py-16 {
                padding-top: 4rem;
                padding-bottom: 4rem;
            }
            .pl-6 {
                padding-left: 1.5rem;
            }
            .pt-4 {
                padding-top: 1rem;
            }
            .pt-3 {
                padding-top: 0.75rem;
            }
            .text-center {
                text-align: center;
            }
            .font-inter {
                font-family: Inter, sans-serif;
            }
            .font-mono {
                font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            }
            .text-lg {
                font-size: 1.125rem;
                line-height: 1.75rem;
            }
            .text-sm {
                font-size: 0.875rem;
                line-height: 1.25rem;
            }
            .text-xl {
                font-size: 1.25rem;
                line-height: 1.75rem;
            }
            .text-xs {
                font-size: 0.75rem;
                line-height: 1rem;
            }
            .text-2xl {
                font-size: 1.5rem;
                line-height: 2rem;
            }
            .text-base {
                font-size: 1rem;
                line-height: 1.5rem;
            }
            .font-medium {
                font-weight: 500;
            }
            .font-bold {
                font-weight: 700;
            }
            .font-semibold {
                font-weight: 600;
            }
            .leading-relaxed {
                line-height: 1.625;
            }
            .text-gray-500 {
                --tw-text-opacity: 1;
                color: rgb(107 114 128 / var(--tw-text-opacity, 1));
            }
            .text-gray-600 {
                --tw-text-opacity: 1;
                color: rgb(75 85 99 / var(--tw-text-opacity, 1));
            }
            .text-gray-700 {
                --tw-text-opacity: 1;
                color: rgb(55 65 81 / var(--tw-text-opacity, 1));
            }
            .text-gray-900 {
                --tw-text-opacity: 1;
                color: rgb(17 24 39 / var(--tw-text-opacity, 1));
            }
            .text-primary-200 {
                --tw-text-opacity: 1;
                color: rgb(191 219 254 / var(--tw-text-opacity, 1));
            }
            .text-primary-600 {
                --tw-text-opacity: 1;
                color: rgb(37 99 235 / var(--tw-text-opacity, 1));
            }
            .text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity, 1));
            }
            .text-amber-800 {
                --tw-text-opacity: 1;
                color: rgb(146 64 14 / var(--tw-text-opacity, 1));
            }
            .text-blue-800 {
                --tw-text-opacity: 1;
                color: rgb(30 64 175 / var(--tw-text-opacity, 1));
            }
            .text-gray-400 {
                --tw-text-opacity: 1;
                color: rgb(156 163 175 / var(--tw-text-opacity, 1));
            }
            .text-gray-800 {
                --tw-text-opacity: 1;
                color: rgb(31 41 55 / var(--tw-text-opacity, 1));
            }
            .text-green-600 {
                --tw-text-opacity: 1;
                color: rgb(22 163 74 / var(--tw-text-opacity, 1));
            }
            .text-primary-700 {
                --tw-text-opacity: 1;
                color: rgb(29 78 216 / var(--tw-text-opacity, 1));
            }
            .text-primary-800 {
                --tw-text-opacity: 1;
                color: rgb(30 64 175 / var(--tw-text-opacity, 1));
            }
            .text-white\/90 {
                color: rgb(255 255 255 / 0.9);
            }
            .text-gray-300 {
                --tw-text-opacity: 1;
                color: rgb(209 213 219 / var(--tw-text-opacity, 1));
            }
            .text-primary-500 {
                --tw-text-opacity: 1;
                color: rgb(59 130 246 / var(--tw-text-opacity, 1));
            }
            .placeholder-gray-400::placeholder {
                --tw-placeholder-opacity: 1;
                color: rgb(156 163 175 / var(--tw-placeholder-opacity, 1));
            }
            .opacity-80 {
                opacity: 0.8;
            }
            .opacity-90 {
                opacity: 0.9;
            }
            .opacity-0 {
                opacity: 0;
            }
            .opacity-100 {
                opacity: 1;
            }
            .shadow-2xl {
                --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
                --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
            }
            .shadow-lg {
                --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
                --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
            }
            .shadow-xl {
                --tw-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
                --tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
            }
            .shadow-md {
                --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
                --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
            }
            .shadow-sm {
                --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
                --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
            }
            .brightness-0 {
                --tw-brightness: brightness(0);
                filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
            }
            .invert {
                --tw-invert: invert(100%);
                filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
            }
            .filter {
                filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
            }
            .backdrop-blur-sm {
                --tw-backdrop-blur: blur(4px);
                -webkit-backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity)
                    var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
                backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity)
                    var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
            }
            .backdrop-filter {
                -webkit-backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity)
                    var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
                backdrop-filter: var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity)
                    var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);
            }
            .transition-all {
                transition-property: all;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 150ms;
            }
            .transition-colors {
                transition-property: color, background-color, border-color, fill, stroke, -webkit-text-decoration-color;
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, -webkit-text-decoration-color;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 150ms;
            }
            .transition-transform {
                transition-property: transform;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 150ms;
            }
            .transition {
                transition-property: color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 150ms;
            }
            .duration-300 {
                transition-duration: 300ms;
            }
            .ease-out {
                transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
            }
            .hover\:border-primary-600:hover {
                --tw-border-opacity: 1;
                border-color: rgb(37 99 235 / var(--tw-border-opacity, 1));
            }
            .hover\:bg-primary-50:hover {
                --tw-bg-opacity: 1;
                background-color: rgb(239 246 255 / var(--tw-bg-opacity, 1));
            }
            .hover\:bg-primary-700:hover {
                --tw-bg-opacity: 1;
                background-color: rgb(29 78 216 / var(--tw-bg-opacity, 1));
            }
            .hover\:bg-green-700:hover {
                --tw-bg-opacity: 1;
                background-color: rgb(21 128 61 / var(--tw-bg-opacity, 1));
            }
            .hover\:text-primary-200:hover {
                --tw-text-opacity: 1;
                color: rgb(191 219 254 / var(--tw-text-opacity, 1));
            }
            .hover\:text-primary-600:hover {
                --tw-text-opacity: 1;
                color: rgb(37 99 235 / var(--tw-text-opacity, 1));
            }
            .hover\:text-primary-400:hover {
                --tw-text-opacity: 1;
                color: rgb(96 165 250 / var(--tw-text-opacity, 1));
            }
            .hover\:text-primary-800:hover {
                --tw-text-opacity: 1;
                color: rgb(30 64 175 / var(--tw-text-opacity, 1));
            }
            .focus\:border-transparent:focus {
                border-color: transparent;
            }
            .focus\:outline-none:focus {
                outline: 2px solid transparent;
                outline-offset: 2px;
            }
            .focus\:ring-2:focus {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
            }
            .focus\:ring-primary-500:focus {
                --tw-ring-opacity: 1;
                --tw-ring-color: rgb(59 130 246 / var(--tw-ring-opacity, 1));
            }
            .focus\:ring-green-500:focus {
                --tw-ring-opacity: 1;
                --tw-ring-color: rgb(34 197 94 / var(--tw-ring-opacity, 1));
            }
            .focus\:ring-offset-2:focus {
                --tw-ring-offset-width: 2px;
            }
            @media (min-width: 640px) {
                .sm\:grid-cols-3 {
                    grid-template-columns: repeat(3, minmax(0, 1fr));
                }
                .sm\:px-6 {
                    padding-left: 1.5rem;
                    padding-right: 1.5rem;
                }
            }
            @media (min-width: 768px) {
                .md\:mx-auto {
                    margin-left: auto;
                    margin-right: auto;
                }
                .md\:mb-0 {
                    margin-bottom: 0px;
                }
                .md\:ml-0 {
                    margin-left: 0px;
                }
                .md\:mt-0 {
                    margin-top: 0px;
                }
                .md\:mt-3 {
                    margin-top: 0.75rem;
                }
                .md\:block {
                    display: block;
                }
                .md\:flex {
                    display: flex;
                }
                .md\:hidden {
                    display: none;
                }
                .md\:w-1\/4 {
                    width: 25%;
                }
                .md\:w-3\/4 {
                    width: 75%;
                }
                .md\:grid-cols-2 {
                    grid-template-columns: repeat(2, minmax(0, 1fr));
                }
                .md\:flex-row {
                    flex-direction: row;
                }
                .md\:items-center {
                    align-items: center;
                }
                .md\:justify-start {
                    justify-content: flex-start;
                }
                .md\:justify-between {
                    justify-content: space-between;
                }
                .md\:space-y-0 > :not([hidden]) ~ :not([hidden]) {
                    --tw-space-y-reverse: 0;
                    margin-top: calc(0px * calc(1 - var(--tw-space-y-reverse)));
                    margin-bottom: calc(0px * var(--tw-space-y-reverse));
                }
                .md\:py-12 {
                    padding-top: 3rem;
                    padding-bottom: 3rem;
                }
                .md\:pr-6 {
                    padding-right: 1.5rem;
                }
                .md\:text-left {
                    text-align: left;
                }
                .md\:text-center {
                    text-align: center;
                }
                .md\:text-3xl {
                    font-size: 1.875rem;
                    line-height: 2.25rem;
                }
            }
            @media (min-width: 1024px) {
                .lg\:order-1 {
                    order: 1;
                }
                .lg\:order-2 {
                    order: 2;
                }
                .lg\:col-span-2 {
                    grid-column: span 2 / span 2;
                }
                .lg\:flex {
                    display: flex;
                }
                .lg\:hidden {
                    display: none;
                }
                .lg\:grid-cols-3 {
                    grid-template-columns: repeat(3, minmax(0, 1fr));
                }
                .lg\:grid-cols-4 {
                    grid-template-columns: repeat(4, minmax(0, 1fr));
                }
                .lg\:px-8 {
                    padding-left: 2rem;
                    padding-right: 2rem;
                }
            }
        </style>
        <style data-styled="active" data-styled-version="5.3.11"></style>
    </head>

    <body class="font-inter bg-gray-50" x-data="{ mobileMenuOpen: false, searchOpen: false }" style="">
        <!-- iOS-Compatible Preloader -->
        <div id="preloader" class="fixed inset-0 bg-white z-[9999] flex items-center justify-center" style="backdrop-filter: blur(5px); transition: opacity 0.5s; opacity: 0; display: none;">
            <div class="text-center">
                <!-- Simplified Animated Logo Container -->
                <div class="w-24 h-24 bg-primary-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <!-- Company Initial or Small Logo -->
                    <img src="https://moderndeliverysservice.com/storage/app/public/photos/7poXvBAb0Um6ofyeidi1o91ZL6mB9OpC6vBEo5mv.png" alt="Logo" class="w-12 h-12 object-contain animate-bounce" />
                </div>

                <!-- Simple Loading Spinner (more compatible across devices) -->
                <div class="mt-4 flex items-center justify-center space-x-2">
                    <div class="w-3 h-3 bg-primary-600 rounded-full animate-bounce" style="animation-delay: 0s;"></div>
                    <div class="w-3 h-3 bg-primary-600 rounded-full animate-bounce" style="animation-delay: 0.2s;"></div>
                    <div class="w-3 h-3 bg-primary-600 rounded-full animate-bounce" style="animation-delay: 0.4s;"></div>
                </div>
            </div>
        </div>

        <!-- iOS-Compatible Header -->
        <header class="relative bg-white shadow-lg z-50" style="will-change: transform;">
            <!-- Top Bar -->
            <div class="bg-primary-700 text-white py-2">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center space-x-6">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-clock text-primary-200"></i>
                                <span>Open 24/7 for Global Logistics</span>
                            </div>
                            <div class="hidden md:flex items-center space-x-2">
                                <i class="fas fa-phone text-primary-200"></i>
                                <span>+16042568369</span>
                            </div>
                        </div> 
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-envelope text-primary-200"></i>
                                <a href="mailto:jaystaruniversal@deliveryman.com" class="hover:text-primary-200 transition-colors">
                                   support@moderndeliverysservice.com
                                </a>
                            </div>
                            <!-- Google Translate with iOS fix -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->
            <nav class="bg-white border-b border-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-20">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="/" class="flex items-center">
                                <img src="https://moderndeliverysservice.com/storage/app/public/photos/7poXvBAb0Um6ofyeidi1o91ZL6mB9OpC6vBEo5mv.png" alt="Mordern Delivery Services" class="h-12 w-auto" />
                            </a>
                        </div>

                        <!-- Desktop Navigation -->
                        <div class="hidden lg:flex items-center space-x-8">
                            <a href="./index.html" class="text-gray-900 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors border-b-2 border-transparent hover:border-primary-600">
                                Home
                            </a>
                            <a href="./about.html" class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors border-b-2 border-transparent hover:border-primary-600">
                                About
                            </a>
                            <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                                <button class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors border-b-2 border-transparent hover:border-primary-600 flex items-center">
                                    Services
                                    <i class="fas fa-chevron-down ml-1 text-xs"></i>
                                </button>
                                <div
                                    x-show="open"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 translate-y-1"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 translate-y-1"
                                    class="absolute top-full left-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-200 py-2"
                                    style="display: none;"
                                >
                                    <a href="./services" class="block px-4 py-3 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors"> <i class="fas fa-ship mr-3 text-primary-600"></i>Sea/Ocean Freight </a>
                                    <a href="./services" class="block px-4 py-3 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors"> <i class="fas fa-truck mr-3 text-primary-600"></i>Road Transportation </a>
                                    <a href="services" class="block px-4 py-3 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors"> <i class="fas fa-plane mr-3 text-primary-600"></i>Air Freight </a>
                                    <a href="services" class="block px-4 py-3 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors"> <i class="fas fa-warehouse mr-3 text-primary-600"></i>Warehousing </a>
                                    <a href="services" class="block px-4 py-3 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors"> <i class="fas fa-box mr-3 text-primary-600"></i>Packaging &amp; Storage </a>
                                    <a href="diplomatic" class="block px-4 py-3 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition-colors">
                                        <i class="fas fa-shield-alt mr-3 text-primary-600"></i>Diplomatic Services
                                    </a>
                                </div>
                            </div>
                            <a href="track-order" class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors border-b-2 border-transparent hover:border-primary-600">
                                Track Shipment
                            </a>
                            <a href="contact" class="text-gray-700 hover:text-primary-600 px-3 py-2 text-sm font-medium transition-colors border-b-2 border-transparent hover:border-primary-600">
                                Contact
                            </a>
                        </div>

                        <!-- Search & CTA -->
                        <div class="hidden lg:flex items-center space-x-4">
                            <!-- Quick Track Search -->
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="p-2 text-gray-500 hover:text-primary-600 transition-colors">
                                    <i class="fas fa-search text-lg"></i>
                                </button>
                                <!-- Dropdown for tracking -->
                                <div x-show="open" style="display: none; position: absolute; right: 0; top: 100%; z-index: 9999; margin-top: 0.5rem;" class="w-80 bg-white rounded-lg shadow-2xl border border-gray-200 p-4">
                                    <form method="POST" action="https://shippyexpress.developerplug.com/trackingresult" class="space-y-3">
                                        <input type="hidden" name="_token" value="QlhRi8cgNYeCrT4L6DLqw0nKaZwWnpMyHWW8mVLJ" />
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Track Your Shipment</label>
                                            <input
                                                type="text"
                                                name="trackingnumber"
                                                placeholder="Enter tracking number..."
                                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                                                required=""
                                            />
                                        </div>
                                        <button type="submit" class="w-full bg-primary-600 text-white py-2 px-4 rounded-lg hover:bg-primary-700 transition-colors font-medium"><i class="fas fa-search mr-2"></i>Track Now</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Get Quote Button -->
                            <a href="contact" class="bg-primary-600 text-white px-6 py-2 rounded-lg hover:bg-primary-700 transition-colors font-medium">
                                Get Quote
                            </a>
                        </div>

                        <!-- iOS-Compatible Mobile Menu Button -->
                        <div class="lg:hidden flex items-center space-x-2">
                            <button type="button" @click="searchOpen = !searchOpen" class="p-3 text-gray-500 hover:text-primary-600 transition-colors">
                                <i class="fas fa-search text-lg"></i>
                            </button>
                            <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="p-3 text-gray-500 hover:text-primary-600 transition-colors" aria-label="Toggle menu">
                                <i class="fas fa-bars text-xl" x-show="!mobileMenuOpen"></i>
                                <i class="fas fa-times text-xl" x-show="mobileMenuOpen" style="display: none;"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile Search -->
                <div
                    x-show="searchOpen"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-1"
                    class="lg:hidden border-t border-gray-200 bg-gray-50 px-4 py-4"
                    style="display: none;"
                >
                    <form method="POST" action="https://shippyexpress.developerplug.com/trackingresult" class="space-y-3">
                        <input type="hidden" name="_token" value="QlhRi8cgNYeCrT4L6DLqw0nKaZwWnpMyHWW8mVLJ" />
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Track Your Shipment</label>
                            <input
                                type="text"
                                name="trackingnumber"
                                placeholder="Enter tracking number..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                                required=""
                            />
                        </div>
                        <button type="submit" class="w-full bg-primary-600 text-white py-3 px-4 rounded-lg hover:bg-primary-700 transition-colors font-medium"><i class="fas fa-search mr-2"></i>Track Now</button>
                    </form>
                </div>

                <!-- iOS-Compatible Mobile Navigation Menu -->
                <div
                    x-show="mobileMenuOpen"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-0"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-0"
                    class="lg:hidden border-t border-gray-200 bg-white"
                    style="transform: translateZ(0px); display: none;"
                >
                    <div class="px-4 py-6 space-y-2">
                        <a href="/" class="block px-3 py-2 text-gray-900 font-medium hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                            Home
                        </a>
                        <a href="about" class="block px-3 py-2 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                            About
                        </a>
                        <div x-data="{ servicesOpen: false }">
                            <button @click="servicesOpen = !servicesOpen" class="w-full flex items-center justify-between px-3 py-2 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                                Services
                                <i class="fas fa-chevron-down text-xs transition-transform" :class="servicesOpen ? 'rotate-180' : ''"></i>
                            </button>
                            <div
                                x-show="servicesOpen"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 -translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 -translate-y-1"
                                class="pl-6 mt-2 space-y-2"
                                style="display: none;"
                            >
                                <a href="services" class="block px-3 py-2 text-gray-600 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors"> <i class="fas fa-ship mr-2 text-primary-600"></i>Sea/Ocean Freight </a>
                                <a href="services" class="block px-3 py-2 text-gray-600 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors"> <i class="fas fa-truck mr-2 text-primary-600"></i>Road Transportation </a>
                                <a href="services" class="block px-3 py-2 text-gray-600 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors"> <i class="fas fa-plane mr-2 text-primary-600"></i>Air Freight </a>
                                <a href="services" class="block px-3 py-2 text-gray-600 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors"> <i class="fas fa-warehouse mr-2 text-primary-600"></i>Warehousing </a>
                                <a href="services" class="block px-3 py-2 text-gray-600 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors"> <i class="fas fa-box mr-2 text-primary-600"></i>Packaging &amp; Storage </a>
                                <a href="diplomatic" class="block px-3 py-2 text-gray-600 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                                    <i class="fas fa-shield-alt mr-2 text-primary-600"></i>Diplomatic Services
                                </a>
                            </div>
                        </div>
                        <a href="track-order" class="block px-3 py-2 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                            Track Shipment
                        </a>
                        <a href="contact" class="block px-3 py-2 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-colors">
                            Contact
                        </a>
                        <div class="pt-4 border-t border-gray-200">
                            <a href="contact" class="block w-full text-center bg-primary-600 text-white py-3 px-4 rounded-lg hover:bg-primary-700 transition-colors font-medium">
                                Get Quote
                            </a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Error Message Banner -->
        </header>

        <!-- Add Leaflet CSS and JS for a free, open-source mapping solution -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <!-- Custom map styling -->
        <style>
            #shipment_map {
                position: relative !important;
                overflow: hidden;
                border-radius: 0.5rem;
            }
            /* Fix the map to prevent movement and make it fixed within the card */
            .leaflet-container {
                position: absolute !important;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 1;
            }
            /* Prevent the map from overflowing its container */
            .leaflet-pane {
                z-index: 1;
            }
        </style>

        <div class="bg-gray-50 py-8 md:py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div x-data="{ loading: true }" x-init="setTimeout(() =&gt; loading = false, 800)">
                    <!-- Loading State -->
                    

                    <!-- Tracking Result Container -->
                    <div x-show="!loading" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" class="">
                        <!-- Header & Navigation -->
                        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6">
                            <div>
                                <div class="flex items-center space-x-2 mb-2">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-primary-600"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <path d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"></path>
                                        <path d="m7.5 4.27 9 5.15"></path>
                                        <polyline points="3.29 7 12 12 20.71 7"></polyline>
                                        <line x1="12" x2="12" y1="22" y2="12"></line>
                                        <circle cx="18.5" cy="15.5" r="2.5"></circle>
                                        <path d="M20.27 17.27 22 19"></path>
                                    </svg>
                                    <h1 class="text-2xl font-bold text-gray-800">Shipment Tracking</h1>
                                </div>
                                <div class="flex items-center space-x-2 text-sm text-gray-600">
                                    <a href="/" class="flex items-center hover:text-primary-600 transition-colors">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 mr-1"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >
                                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                        </svg>
                                        Home
                                    </a>
                                    <span>/</span>
                                    <span>Tracking</span>
                                </div>
                            </div>
                            <div class="mt-4 md:mt-0">
                                <a
                                    href="/"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m12 19-7-7 7-7"></path>
                                        <path d="M19 12H5"></path>
                                    </svg>
                                    Back to Home
                                </a>
                            </div>
                        </div>

                        <!-- Tracking Summary Card -->
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                            <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-primary-700 to-primary-600">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                    <div class="mb-4 md:mb-0">
                                        <div class="flex items-center">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-white/90 mr-2"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >
                                                <path d="M21 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3"></path>
                                                <path d="M21 16v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-3"></path>
                                                <path d="M4 12h16"></path>
                                                <path d="M9 12v4"></path>
                                                <path d="M15 12v4"></path>
                                                <path d="M13 12v1"></path>
                                                <path d="M11 12v1"></path>
                                            </svg>
                                            <h2 class="text-xl font-bold text-white">Tracking Number</h2>
                                        </div>
                                        <div class="mt-2 font-mono text-2xl md:text-3xl font-bold text-white opacity-90 flex items-center">
                                            <?php echo $package['tracking_number']; ?>
                                            <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-white text-primary-800">
                                                Verified
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="flex items-center px-4 py-2 bg-white/20 backdrop-filter backdrop-blur-sm rounded-lg mb-2">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 mr-2 text-white"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <span class="text-white font-medium">Current Status:</span>
                                            <div class="ml-2 px-2 py-0.5 rounded-full bg-blue-600 text-white text-sm font-medium">
                                                <?php echo $package['status']; ?>
                                            </div>
                                        </div>
                                        <div class="flex items-center text-white text-sm">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-4 w-4 mr-2 opacity-80"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg>
                                            <span class="opacity-90">Last Updated: Aug 15, 2025 - 04:42 PM</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Shipment Information -->
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                    <!-- Sender Information -->
                                    <div class="space-y-3 bg-primary-50/60 p-4 rounded-lg border border-primary-100">
                                        <div class="flex items-center text-primary-600 mb-2">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 mr-2"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <h3 class="text-base font-semibold">Sender Information</h3>
                                        </div>
                                        <div class="space-y-2 text-sm">
                                            <div class="flex items-center">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <span class="font-medium text-gray-800"><?php echo $package['sender_name']; ?></span>
                                            </div>
                                            <div class="flex items-start">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0 mt-0.5"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                    <circle cx="12" cy="10" r="3"></circle>
                                                </svg>
                                                <span class="font-medium text-gray-700"><?php echo $package['sender_address']; ?></span>
                                            </div>
                                            <div class="flex items-center">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path
                                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                                                    ></path>
                                                </svg>
                                                <span class="font-medium text-gray-700"><?php echo $package['sender_phone']; ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Receiver Information -->
                                    <div class="space-y-3 bg-primary-50/60 p-4 rounded-lg border border-primary-100">
                                        <div class="flex items-center text-primary-600 mb-2">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 mr-2"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <h3 class="text-base font-semibold">Receiver Information</h3>
                                        </div>
                                        <div class="space-y-2 text-sm">
                                            <div class="flex items-center">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <span class="font-medium text-gray-800"><?php echo $package['receiver_name']; ?></span>
                                            </div>
                                            <div class="flex items-start">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0 mt-0.5"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                    <circle cx="12" cy="10" r="3"></circle>
                                                </svg>
                                                <span class="font-medium text-gray-700"><?php echo $package['receiver_address']; ?></span>
                                            </div>
                                            <div class="flex items-center">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path
                                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                                                    ></path>
                                                </svg>
                                                <span class="font-medium text-gray-700"><?php echo $package['receiver_phone']; ?></span>
                                            </div>
                                            <div class="flex items-center">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z"></path>
                                                    <path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"></path>
                                                </svg>
                                                <span class="font-medium text-gray-700"><?php echo $package['receiver_email']; ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Shipment Details -->
                                    <div class="space-y-3 bg-primary-50/60 p-4 rounded-lg border border-primary-100">
                                        <div class="flex items-center text-primary-600 mb-2">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 mr-2"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >
                                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                                <path d="M12 11h4"></path>
                                                <path d="M12 16h4"></path>
                                                <path d="M8 11h.01"></path>
                                                <path d="M8 16h.01"></path>
                                            </svg>
                                            <h3 class="text-base font-semibold">Shipment Details</h3>
                                        </div>
                                        <div class="space-y-2 text-sm">
                                            <div class="flex items-center">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path d="M12 8a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2v-4h2"></path>
                                                    <circle cx="17" cy="8" r="2"></circle>
                                                    <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                                </svg>
                                                <span class="text-gray-500 mr-2">Weight:</span>
                                                <span class="font-medium text-gray-800"><?php echo $package['weight']; ?> kg</span>
                                            </div>
                                            <div class="flex items-center">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path d="M4.9 19.1C1 15.2 1 8.8 4.9 4.9"></path>
                                                    <path d="M7.8 16.2c-2.3-2.3-2.3-6.1 0-8.5"></path>
                                                    <circle cx="12" cy="12" r="2"></circle>
                                                    <path d="M16.2 7.8c2.3 2.3 2.3 6.1 0 8.5"></path>
                                                    <path d="M19.1 4.9C23 8.8 23 15.1 19.1 19"></path>
                                                </svg>
                                                <span class="text-gray-500 mr-2">Type:</span>
                                                <span class="font-medium text-gray-800"><?php echo $package['type']; ?></span>
                                            </div>
                                            <div class="flex items-center">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                                </svg>
                                                <span class="text-gray-500 mr-2">Shipped:</span>
                                                <span class="font-medium text-gray-800"><?php echo $package['ship_date']; ?></span>
                                            </div>
                                        </div>
                                    </div>
 
       
                                    <!-- Status Information -->
                                    <div class="space-y-3 bg-primary-50/60 p-4 rounded-lg border border-primary-100">
                                        <div class="flex items-center text-primary-600 mb-2">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 mr-2"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >
                                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                            </svg>
                                            <h3 class="text-base font-semibold">Status Information</h3>
                                        </div>
                                        <div class="space-y-2 text-sm">
                                            <div class="flex items-center">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                                                    <path d="M12 6v6l4 2"></path>
                                                </svg>
                                                <span class="text-gray-500 mr-2">Status:</span>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    <?php echo $package['status']; ?>
                                                </span>
                                            </div>
                                            <div class="flex items-center">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 text-gray-500 mr-2 flex-shrink-0"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                                    <circle cx="12" cy="10" r="3"></circle>
                                                </svg>
                                                <span class="text-gray-500 mr-2">Location:</span>
                                                <span class="font-medium text-gray-800"><?php echo $package['location']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
// Fetch package history
$historyQuery = $conn->query("SELECT * FROM package_history WHERE package_id = '".$package['id']."' ORDER BY created_at ASC");
?>

<?php if($historyQuery->num_rows > 0) { ?>
<!-- Shipment Progress Tracker -->
<div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
        <h3 class="text-lg font-bold text-gray-800">Shipment Progress</h3>
    </div>
    <div class="p-6">
        <div class="space-y-6">
            <?php while($row = $historyQuery->fetch_assoc()) { ?>
            <div class="flex items-start space-x-4">
                <!-- Status Icon -->
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full 
                                <?php echo ($row['status'] == 'Delivered') ? 'bg-green-500 text-white' : 'bg-blue-500 text-white'; ?> shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" 
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 12l2 2 4-4M7 12l-2 2 2 2m8-6l-2 2 2 2" />
                        </svg>
                    </div>
                </div>

                <!-- Status Details -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-900"><?php echo htmlspecialchars($row['status']); ?></h4>
                    <?php if(!empty($row['location'])) { ?>
                        <p class="text-xs text-gray-600 mt-1"><span class="font-semibold">Location:</span> <?php echo htmlspecialchars($row['location']); ?></p>
                    <?php } ?>
                    <?php if(!empty($row['comment'])) { ?>
                        <p class="text-xs text-gray-600 mt-1"><span class="font-semibold">Note:</span> <?php echo htmlspecialchars($row['comment']); ?></p>
                    <?php } ?>
                    <p class="text-xs text-gray-400 mt-1"><?php echo date("M d, Y H:i", strtotime($row['created_at'])); ?></p>
                    <?php if(!empty($row['changed_by'])) { ?>
                        <p class="text-xs text-gray-500">Updated by: <?php echo htmlspecialchars($row['changed_by']); ?></p>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>

                     <!-- Content Grid Layout -->
<div class="grid grid-cols-1 gap-6 mb-6">
    <!-- Shipment History Timeline -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-600 mr-2" 
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                     stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                <h3 class="text-lg font-bold text-gray-800">Shipment History</h3>
            </div>
        </div>

        <div class="p-6">
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute top-0 left-4 h-full w-0.5 bg-gray-200 z-0"></div>

                <!-- Timeline Items -->
                <div class="space-y-6">
                    <?php
                    $historyQuery = $conn->query("SELECT * FROM package_history WHERE package_id = '".$package['id']."' ORDER BY created_at DESC");
                    if($historyQuery->num_rows > 0){
                        while($row = $historyQuery->fetch_assoc()){
                            // color based on status
                            $colorClass = "bg-blue-500";
                            if(strtolower($row['status']) == 'delivered') $colorClass = "bg-green-500";
                            if(strtolower($row['status']) == 'custom hold') $colorClass = "bg-amber-500";
                            if(strtolower($row['status']) == 'cancelled') $colorClass = "bg-red-500";
                    ?>
                    <div class="relative z-10 flex items-start">
                        <!-- Circle Icon -->
                        <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 rounded-full <?php echo $colorClass; ?> text-white shadow-md border-2 border-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" 
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" 
                                 stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                        </div>

                        <!-- Timeline Content -->
                        <div class="ml-4">
                            <div class="flex items-center">
                                <span class="text-xs font-medium text-gray-500">
                                    <?php echo date("M d, Y - h:i A", strtotime($row['created_at'])); ?>
                                </span>
                            </div>
                            <div class="mt-1">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                    <?php echo htmlspecialchars($row['status']); ?>
                                </span>
                            </div>
                            <div class="mt-2 text-sm text-gray-700">
                                <?php if(!empty($row['location'])) { ?>
                                    <p class="font-medium"><?php echo htmlspecialchars($row['location']); ?></p>
                                <?php } ?>
                                <?php if(!empty($row['comment'])) { ?>
                                    <p class="mt-1 text-gray-600"><?php echo htmlspecialchars($row['comment']); ?></p>
                                <?php } ?>
                                <?php if(!empty($row['changed_by'])) { ?>
                                    <p class="mt-1 text-xs text-gray-500">Updated by: <?php echo htmlspecialchars($row['changed_by']); ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                        }
                    } else {
                        echo "<p class='text-gray-500 text-sm'>No history available for this shipment.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

                        <!-- Parcel Information Card -->
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-6">
                            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                                <div class="flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 text-primary-600 mr-2"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <path d="M16 16h6v6h-6z"></path>
                                        <path d="M2 16h6v6H2z"></path>
                                        <path d="M9 16h6v6H9z"></path>
                                        <path d="M2 9h6v6H2z"></path>
                                        <path d="M9 9h6v6H9z"></path>
                                        <path d="M16 9h6v6h-6z"></path>
                                        <path d="M16 2h6v6h-6z"></path>
                                        <path d="M2 2h6v6H2z"></path>
                                        <path d="M9 2h6v6H9z"></path>
                                    </svg>
                                    <h3 class="text-lg font-bold text-gray-800">Parcel Information</h3>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex flex-col md:flex-row">
                                    <?php if(!empty($package['image'])) { ?>
<div class="md:w-1/4 mb-6 md:mb-0 md:pr-6">
    <div class="bg-gray-100 p-2 rounded-lg">
        <img src="uploads/<?php echo $package['image']; ?>" 
             class="w-full h-auto rounded-lg object-cover" 
             alt="Parcel photo" />
    </div>
</div>
<?php } ?>


                                    <div class="md:w-3/4">
                                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                            <div class="bg-gray-50 p-4 rounded-lg">
                                                <div class="flex items-center mb-2">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 text-primary-600 mr-2"
                                                        width="24"
                                                        height="24"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    >
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <path d="m15 9-6 6"></path>
                                                        <path d="m9 9 6 6"></path>
                                                    </svg>
                                                    <h4 class="text-sm font-semibold text-gray-800">Duty Fees</h4>
                                                </div>
                                                <p class="text-green-600 font-semibold"><?php echo $package['duty_fees']; ?></p>
                                            </div>

                                            <div class="bg-gray-50 p-4 rounded-lg">
                                                <div class="flex items-center mb-2">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 text-primary-600 mr-2"
                                                        width="24"
                                                        height="24"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    >
                                                        <path d="M12 8a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2v-4h2"></path>
                                                        <circle cx="17" cy="8" r="2"></circle>
                                                        <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                                                    </svg>
                                                    <h4 class="text-sm font-semibold text-gray-800">Weight</h4>
                                                </div>
                                                <p class="text-gray-700"><?php echo $package['weight']; ?> kg</p>
                                            </div>
<p><span class="font-semibold">Weight:</span> <?php echo $package['weight']; ?> kg</p>
                
                                            <div class="bg-gray-50 p-4 rounded-lg">
                                                <div class="flex items-center mb-2">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 text-primary-600 mr-2"
                                                        width="24"
                                                        height="24"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    >
                                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                                    </svg>
                                                    <h4 class="text-sm font-semibold text-gray-800">Pickup Date</h4>
                                                </div>
                                                <p class="text-gray-700"><?php echo $package['pickup_date']; ?></p>
                                            </div>

                                            <div class="bg-gray-50 p-4 rounded-lg">
                                                <div class="flex items-center mb-2">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 text-primary-600 mr-2"
                                                        width="24"
                                                        height="24"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    >
                                                        <polyline points="16 3 21 3 21 8"></polyline>
                                                        <line x1="4" y1="20" x2="21" y2="3"></line>
                                                        <polyline points="21 16 21 21 16 21"></polyline>
                                                        <line x1="15" y1="15" x2="21" y2="21"></line>
                                                        <line x1="4" y1="4" x2="9" y2="9"></line>
                                                    </svg>
                                                    <h4 class="text-sm font-semibold text-gray-800">Expected Delivery</h4>
                                                </div>
                                                <p class="text-gray-700"><?php echo $package['expect_delivery_date']; ?></p>
                                            </div>

                                            <div class="bg-gray-50 p-4 rounded-lg">
                                                <div class="flex items-center mb-2">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 text-primary-600 mr-2"
                                                        width="24"
                                                        height="24"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    >
                                                        <path d="M4.9 19.1C1 15.2 1 8.8 4.9 4.9"></path>
                                                        <path d="M7.8 16.2c-2.3-2.3-2.3-6.1 0-8.5"></path>
                                                        <circle cx="12" cy="12" r="2"></circle>
                                                        <path d="M16.2 7.8c2.3 2.3 2.3 6.1 0 8.5"></path>
                                                        <path d="M19.1 4.9C23 8.8 23 15.1 19.1 19"></path>
                                                    </svg>
                                                    <h4 class="text-sm font-semibold text-gray-800">Delivery Mode</h4>
                                                </div>
                                                <p class="text-gray-700"><?php echo $package['type']; ?></p>
                                            </div>

                                            <div class="bg-gray-50 p-4 rounded-lg">
                                                <div class="flex items-center mb-2">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 text-primary-600 mr-2"
                                                        width="24"
                                                        height="24"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    >
                                                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                                    </svg>
                                                    <h4 class="text-sm font-semibold text-gray-800">Tracking Status</h4>
                                                </div>
                                                <p class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    <?php echo $package['status']; ?>
                                                </p>
                                            </div>
                                        </div>

                                    
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     
        <!-- Modern Footer -->
        <footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white">
            <!-- Main Footer Content -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Company Info -->
                    <div class="lg:col-span-2">
                        <div class="mb-6">
                            <img src="https://moderndeliverysservice.com/storage/app/public/photos/7poXvBAb0Um6ofyeidi1o91ZL6mB9OpC6vBEo5mv.png" alt="Mordern Delivery Services" class="h-12 w-auto mb-4 filter brightness-0 invert" />
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-white">Mordern Delivery Services</h3>
                        <p class="text-gray-300 mb-6 leading-relaxed">
                            Providing Smart Logistics Solutions Across The World. We deliver excellence in shipping, courier services, and package tracking with our global network of trusted partners.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center hover:bg-primary-700 transition-colors">
                                <i class="fab fa-facebook-f text-white"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center hover:bg-primary-700 transition-colors">
                                <i class="fab fa-twitter text-white"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center hover:bg-primary-700 transition-colors">
                                <i class="fab fa-linkedin-in text-white"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center hover:bg-primary-700 transition-colors">
                                <i class="fab fa-instagram text-white"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h4 class="text-lg font-semibold mb-6 text-white">Quick Links</h4>
                        <ul class="space-y-3">
                            <li>
                                <a href="/" class="text-gray-300 hover:text-primary-400 transition-colors flex items-center">
                                    <i class="fas fa-chevron-right text-xs mr-2 text-primary-500"></i>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="about" class="text-gray-300 hover:text-primary-400 transition-colors flex items-center">
                                    <i class="fas fa-chevron-right text-xs mr-2 text-primary-500"></i>
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="services" class="text-gray-300 hover:text-primary-400 transition-colors flex items-center">
                                    <i class="fas fa-chevron-right text-xs mr-2 text-primary-500"></i>
                                    Our Services
                                </a>
                            </li>
                            <li>
                                <a href="track-order" class="text-gray-300 hover:text-primary-400 transition-colors flex items-center">
                                    <i class="fas fa-chevron-right text-xs mr-2 text-primary-500"></i>
                                    Track Shipment
                                </a>
                            </li>
                            <li>
                                <a href="contact" class="text-gray-300 hover:text-primary-400 transition-colors flex items-center">
                                    <i class="fas fa-chevron-right text-xs mr-2 text-primary-500"></i>
                                    Contact Us
                                </a>
                            </li>
                            <li>
                                <a href="diplomatic" class="text-gray-300 hover:text-primary-400 transition-colors flex items-center">
                                    <i class="fas fa-chevron-right text-xs mr-2 text-primary-500"></i>
                                    Diplomatic Services
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h4 class="text-lg font-semibold mb-6 text-white">Contact Info</h4>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-primary-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <i class="fas fa-envelope text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-gray-400 text-sm">Email Us</p>
                                    <a href="mailto:jaystaruniversal@deliveryman.com" class="text-white hover:text-primary-400 transition-colors">
                                       support@moderndeliverysservice.com
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-primary-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <i class="fas fa-phone text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-gray-400 text-sm">Call Us</p>
                                    <p class="text-white">+16042568369</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-primary-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                    <i class="fas fa-clock text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-gray-400 text-sm">Working Hours</p>
                                    <p class="text-white">24/7 Global Support</p>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Track -->
                        <div class="mt-8">
                            <h5 class="text-sm font-semibold mb-3 text-white">Quick Track</h5>
                            <form method="POST" action="" class="space-y-2">
                                <input type="hidden" name="_token" value="QlhRi8cgNYeCrT4L6DLqw0nKaZwWnpMyHWW8mVLJ" />
                                <input
                                    type="text"
                                    name="trackingnumber"
                                    placeholder="Enter tracking number..."
                                    class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all text-sm"
                                />
                                <button type="submit" class="w-full bg-primary-600 text-white py-2 px-3 rounded-lg hover:bg-primary-700 transition-colors text-sm font-medium"><i class="fas fa-search mr-1"></i>Track</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-gray-700">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                        <div class="text-center md:text-left">
                            <p class="text-gray-400 text-sm">Copyright © <span id="currentYear">2025</span> Mordern Delivery Services. All rights reserved.</p>
                        </div>
                        <div class="flex items-center space-x-6 text-sm">
                            <a href="#" class="text-gray-400 hover:text-primary-400 transition-colors">Privacy Policy</a>
                            <a href="#" class="text-gray-400 hover:text-primary-400 transition-colors">Terms of Service</a>
                            <a href="#" class="text-gray-400 hover:text-primary-400 transition-colors">Shipping Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- WhatsApp Float Button -->

        <!-- Core Scripts -->
        <script src="https://shippyexpress.developerplug.com/dash/js/jquery-3.6.0.min.js"></script>
        <!-- Alpine.js with iOS compatibility fixes -->
        <script>
            // Fix for iOS Safari issues with Alpine.js
            document.addEventListener("DOMContentLoaded", function () {
                // Force repaint to help with iOS rendering
                document.body.style.display = "none";
                document.body.offsetHeight; // Trigger reflow
                document.body.style.display = "";
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer=""></script>
        <script>
            // Enhanced preloader functionality for iOS compatibility
            document.addEventListener("DOMContentLoaded", function () {
                // Set a timeout as a fallback in case the load event doesn't fire properly on iOS
                const fallbackTimeout = setTimeout(hidePreloader, 3000); // 3 second fallback

                function hidePreloader() {
                    const preloader = document.getElementById("preloader");
                    if (preloader) {
                        // Add transition styles programmatically
                        preloader.style.transition = "opacity 0.5s ease";
                        preloader.style.opacity = "0";

                        // Ensure the preloader is actually hidden
                        setTimeout(() => {
                            preloader.style.display = "none";
                        }, 500);
                    }
                    // Clear the fallback timeout if the load event fired properly
                    clearTimeout(fallbackTimeout);
                }

                // Try to detect when the page is fully loaded
                window.addEventListener("load", hidePreloader);

                // Set the current year for copyright
                const yearElement = document.getElementById("currentYear");
                if (yearElement) {
                    yearElement.textContent = new Date().getFullYear();
                }
            });

            // Google Translate initialization - with iOS compatibility fixes
        </script>

        <!-- Custom Scripts -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "", // WhatsApp number
            call_to_action: "Message us", // Call to action
            position: "left", // Position may be 'right' or 'left'
            pre_filled_message: "Hello I am", // WhatsApp pre-filled message
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
</body>
</html>
