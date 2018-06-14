<script src="loading/pace.min.js"></script>
<script src="loading/modernizr.js"></script>
<script src="loading/plugins.js"></script>
<script src="loading/main.js"></script>
<style>
.pace {
    -webkit-pointer-events: none;
    pointer-events: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

.pace-inactive {
    display: none !important;
}

.pace .pace-progress {
    background: #157ac1;
    position: fixed;
    z-index: 900;
    top: 0;
    right: 100%;
    width: 100%;
    height: 10px;
}

.oldie .pace {
    display: none;
}



/* ===================================================================
 * # preloader
 *
 * ------------------------------------------------------------------- */
#preloader {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: #545151d4;
    z-index: 800;
    height: 100%;
    width: 100%;
    overflow: hidden;
    display: table;
}

.no-js #preloader, .oldie #preloader {
    display: none;
}

#loader {
    display: table-cell;
    text-align: center;
    vertical-align: middle;
}

.line-scale-pulse-out > div {
    background-color: #39b54a;
    width: 4px;
    height: 35px;
    border-radius: 2px;
    margin: 2px;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
    display: inline-block;
    -webkit-animation: line-scale-pulse-out 0.9s -0.6s infinite cubic-bezier(0.85, 0.25, 0.37, 0.85);
    animation: line-scale-pulse-out 0.9s -0.6s infinite cubic-bezier(0.85, 0.25, 0.37, 0.85);
}

.line-scale-pulse-out > div:nth-child(2), .line-scale-pulse-out > div:nth-child(4) {
    -webkit-animation-delay: -0.4s !important;
    animation-delay: -0.4s !important;
}

.line-scale-pulse-out > div:nth-child(1), .line-scale-pulse-out > div:nth-child(5) {
    -webkit-animation-delay: -0.2s !important;
    animation-delay: -0.2s !important;
}

@-webkit-keyframes line-scale-pulse-out {
    0% {
        -webkit-transform: scaley(1);
        transform: scaley(1);
    }
    50% {
        -webkit-transform: scaley(0.4);
        transform: scaley(0.4);
    }
    100% {
        -webkit-transform: scaley(1);
        transform: scaley(1);
    }
}

@keyframes line-scale-pulse-out {
    0% {
        -webkit-transform: scaley(1);
        transform: scaley(1);
    }
    50% {
        -webkit-transform: scaley(0.4);
        transform: scaley(0.4);
    }
    100% {
        -webkit-transform: scaley(1);
        transform: scaley(1);
    }
}
#preloader img{
    width: 50%;
    height: 200px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
}
</style>
<div id="preloader">
.
</div>