// Read about Video Object Properties and Methods:
// https://www.w3schools.com/jsref/dom_obj_video.asp

// ------------------------------------------

const video = document.querySelector('.player__video');
const play = document.querySelector('.toggle');

const playVideo = () => {
    if (video.paused) {
        video.play();
        play.textContent = "pause";
    } else {
        video.pause();
        play.textContent = "play_arrow";
    }
};

const playVideoOnKeyUp = (e) => {
    if (video.paused && e.keyCode === 32) {
        video.play();
        play.textContent = "pause";
    } else if (!video.paused && e.keyCode === 32) {
        video.pause();
        play.textContent = "play_arrow";
    }
};

// Add event listener to play button.
play.addEventListener('click', playVideo);
// Add event listener to window.
window.addEventListener('keyup', playVideoOnKeyUp);

// ------------------------------------------

// Add event listener to volume and speed scrubbers.
const scrubbers = document.querySelectorAll('[type="range"]');

// Must use regular function. Code breaks using arrow function.
const volumeAndSpeed = (event) => {
    // Assign this.value to the VIDEO object this.name.
    const scrubber = event.target;
    video[scrubber.name] = scrubber.value;
};

// Scrubbers need change/click + mousemove event.
scrubbers.forEach(
    scrubber => scrubber.addEventListener('click', volumeAndSpeed));
scrubbers.forEach(
    scrubber => scrubber.addEventListener('mousemove', volumeAndSpeed));

// ------------------------------------------

// Add event listener to skip buttons (10s back, 25s forwards).
const skipButtons = document.querySelectorAll('button[data-skip]');

const skipVideo = (event) => {
    const button = event.target;
    if (button.dataset.skip === "-10") {
        video.currentTime -= 10;
    } else if (button.dataset.skip === "30") {
        video.currentTime += 30;
    }
};

skipButtons.forEach(button => button.addEventListener('click', skipVideo));

// ------------------------------------------

// Add fullscreen button and event listener to full screen button.
const fullScreen = document.querySelector('.fullscreen');
const player = document.querySelector('.player');

// Clicking on fullscreen button, add :fullscreen to the class player.
const videoFullscreen = () => {
    if (player.requestFullscreen) {
        player.requestFullscreen();
    } else if (player.mozRequestFullScreen) { /* Firefox */
        player.mozRequestFullScreen();
    } else if (player.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
        player.webkitRequestFullscreen();
    } else if (player.msRequestFullscreen) { /* IE/Edge */
        player.msRequestFullscreen();
    }
    fullScreen.textContent = "fullscreen_exit";

    if (document.fullscreenElement) {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }

        fullScreen.textContent = "fullscreen";
    }
};

fullScreen.addEventListener('click', videoFullscreen);

// ------------------------------------------

// Make progress bar track the progress.
const progressBackground = document.querySelector('.progress');
const progressBar = document.querySelector('.progress__filled');

const trackingProgress = () => {
    const duration = video.duration;
    progressBar.style.flexBasis = ((video.currentTime / duration) * 100) + "%";
};

const skipVideoOnProgressBar = () => {
    const num = event.clientX - player.offsetLeft - 5;
    const duration = video.duration;

    progressBar.style.flexBasis = (num * 100 / (player.offsetWidth - 10)) + "%";
    video.currentTime = duration * num / (player.offsetWidth - 10);
};

progressBackground.addEventListener('click', skipVideoOnProgressBar);

video.addEventListener('timeupdate', trackingProgress);

