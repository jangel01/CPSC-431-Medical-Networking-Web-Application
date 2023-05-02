
const url = window.location.href;

// change the color of the navbar link based on the url
if (url.includes("homepage")) {
    // remove the text-white class
    document.getElementById("homepage").classList.remove("text-white");
    // add the text-secondary class 
     document.getElementById("homepage").classList.add("text-secondary");
} else if (url.includes("schedule-meeting")) {
    // remove the text-white class
    document.getElementById("schedule-meeting").classList.remove("text-white");
    // add the text-secondary class
    document.getElementById("schedule-meeting").classList.add("text-secondary");
}
