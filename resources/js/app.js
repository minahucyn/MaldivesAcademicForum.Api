require("./bootstrap");
console.log("konnichiwa 👋");

function setNav(target) {
    let items = $("#nav > li > a.active");
    for (let index = 0; index < items.length; index++) {
        const element = items[index];
        $(element).removeClass("active");
    }

    $(target).addClass("active");
}
