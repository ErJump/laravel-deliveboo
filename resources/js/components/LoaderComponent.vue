<template>
    <div class="ms_loader d-flex flex-column align-items-center pt-4">
        <h4 class="mb-3 text-center">Stiamo processando il pagamento...</h4>
        <div class="showbox position-relative">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>
    </div>
 </template>
 
 <script>
 export default {
    name: "LoaderComponent",
 }
 </script>
 
 <style scoped lang="scss">
 @import "../../sass/variables.scss";
    .ms_loader{
        height: 300px;
        width: 100%;
        background-color: #f8fafc;
    } 


    $green: #008744;
    $blue: #0057e7;
    $red: #d62d20;
    $yellow: #ffa700;
    $white: #eee;

    // scaling... any units
    $width: 100px;

    .loader {
        position: relative;
        margin: 0 auto;
        width: $width;

        &:before {
            content: '';
            display: block;
            padding-top: 100%;
        }
    }

    .circular {
        animation: rotate 2s linear infinite;
        height: 100%;
        transform-origin: center center;
        width: 100%;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    }

    .path {
        stroke-dasharray: 1, 200;
        stroke-dashoffset: 0;
        animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite;
        stroke-linecap: round;
    }

    @keyframes rotate {
        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes dash {
        0% {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
        }

        50% {
            stroke-dasharray: 89, 200;
            stroke-dashoffset: -35px;
        }

        100% {
            stroke-dasharray: 89, 200;
            stroke-dashoffset: -124px;
        }
    }

    @keyframes color {

        100%,
        0% {
            stroke: $red;
        }

        40% {
            stroke: $blue;
        }

        66% {
            stroke: $green;
        }

        80%,
        90% {
            stroke: $yellow;
        }
    }

    // demo-specific
    body {
        background-color: $white;
    }

    .showbox {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 5%;
    }
 </style>