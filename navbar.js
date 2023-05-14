const url = window.location.href;


// change the color of the navbar link based on the url
 if (url.includes("connect")) {
    // remove the text-white class
    document.getElementById("connect").classList.remove("text-white");
    // add the text-secondary class
    document.getElementById("connect").classList.add("text-secondary");
} else if (url.includes("manage-meetings")) {
    // remove the text-white class
    document.getElementById("manage-meetings").classList.remove("text-white");
    // add the text-secondary class
    document.getElementById("manage-meetings").classList.add("text-secondary");
} else if (url.includes("user-details")) {
    // remove the text-white class
    document.getElementById("user-details").classList.remove("text-white");
    // add the text-secondary class
    document.getElementById("user-details").classList.add("text-secondary");
} else {
    // remove the text-secondary class to all the navbar links
    document.getElementById("connect").classList.remove("text-secondary");
    document.getElementById("manage-meetings").classList.remove("text-secondary");
    document.getElementById("user-details").classList.remove("text-secondary");

    // add the text-white class to all the navbar links
    document.getElementById("connect").classList.add("text-white");
    document.getElementById("manage-meetings").classList.add("text-white");
    document.getElementById("user-details").classList.add("text-white");
}


//
// change the color of the navbar link based on the url
// if (url.includes("homepage")) {
//     // remove the text-white class
//     document.getElementById("homepage").classList.remove("text-white");
//     // add the text-secondary class 
//      document.getElementById("homepage").classList.add("text-secondary");
// } else if (url.includes("connect")) {
//     // remove the text-white class
//     document.getElementById("connect").classList.remove("text-white");
//     // add the text-secondary class
//     document.getElementById("connect").classList.add("text-secondary");
// } else if (url.includes("manage-meetings")) {
//     // remove the text-white class
//     document.getElementById("manage-meetings").classList.remove("text-white");
//     // add the text-secondary class
//     document.getElementById("manage-meetings").classList.add("text-secondary");
// } else if (url.includes("user-details")) {
//     // remove the text-white class
//     document.getElementById("manage-preferences").classList.remove("text-white");
//     // add the text-secondary class
//     document.getElementById("manage-preferences").classList.add("text-secondary");
// } else {
//     // remove the text-secondary class to all the navbar links
//     document.getElementById("homepage").classList.remove("text-secondary");
//     document.getElementById("connect").classList.remove("text-secondary");
//     document.getElementById("manage-meetings").classList.remove("text-secondary");
//     document.getElementById("manage-preferences").classList.remove("text-secondary");

//     // add the text-white class to all the navbar links
//     document.getElementById("homepage").classList.add("text-white");
//     document.getElementById("connect").classList.add("text-white");
//     document.getElementById("manage-meetings").classList.add("text-white");
//     document.getElementById("manage-preferences").classList.add("text-white");
// }