const images = [
    "url('images/slide1.png')",
    "url('images/slide2.png')",
    "url('images/slide3.png')",
];
index = 0;

// window.addEventListener("scroll", () => {
//     const numberContainer = document.querySelector("#nbrSection");
//     const scrolled = window.scrollY;
//     console.log(
//         "scrolled = " + window.scrollY + " nbr section" + numberContainer.offsetTop
//     );
//     const elementPosition = numberContainer.offsetTop;
//
//     if (scrolled >= elementPosition - 600) {
//         counter();
//         counter2();
//         counter3();
//     }
// }, {once : true});

function timeout(ms) {
    return new Promise((resolve) => setTimeout(resolve, ms));
}
async function sleep(fn, ...args) {
    await timeout(3000);
    return fn(...args);
}
async function counter() {
    document.getElementById("nmembers").innerHTML = 0;
    for (i = 0; i <= 380; i++) {
        document.getElementById("nmembers").innerHTML = i;
        await new Promise((resolve) => setTimeout(resolve, 50));
    }
    document.getElementById("nmembers").innerHTML = 380;
}
async function counter2() {
    document.getElementById("nposts").innerHTML = 0;
    for (i = 0; i <= 6500; i+=10) {
        document.getElementById("nposts").innerHTML = i;
        await new Promise((resolve) => setTimeout(resolve, 10));
    }
    document.getElementById("nposts").innerHTML = 6500;
}
async function counter3() {
    document.getElementById("nupvotes").innerHTML = 0;
    for (i = 0; i <= 80000; i+=100) {
        document.getElementById("nupvotes").innerHTML = i;
        await new Promise((resolve) => setTimeout(resolve, 5));
    }
    document.getElementById("nupvotes").innerHTML = 80000;
}
function slideshow() {
    let header = document.getElementById("intro");
    index = index + 1;
    if (index == 4) {
        index = 0;
        header.style.backgroundImage = images[index];
        setTimeout(slideshow, 4000);
    } else {
        header.style.backgroundImage = images[index];
        setTimeout(slideshow, 4000);
    }
}

function checkLogin() {
    if (localStorage.getItem("fname") != undefined) {
        document.getElementById("varLoginnav").style.display = "none";
    } else {
        document.getElementById("varProfilenav").style.display = "none";
    }
}
function logout() {
    localStorage.clear();
    setTimeout(gohome, 2000);
}
function gohome() {
    document.location.href = "index.php";
}

function upPostOne() {
    if (localStorage.getItem("fname") == undefined) {
        document.location.href = "login.php";
    } else {
        const chev = document.getElementById("post1up");
        const nbr = document.getElementById("post1");
        toggleChevup(chev, nbr);
    }
}
function downPostOne() {
    if (localStorage.getItem("fname") == undefined) {
        document.location.href = "login.php";
    } else {
        const chev = document.getElementById("post1down");
        const nbr = document.getElementById("post1");
        toggleChevdown(chev, nbr);
    }
}

function upPostTwo() {
    if (localStorage.getItem("fname") == undefined) {
        document.location.href = "login.php";
    } else {
        const chev = document.getElementById("post2up");
        const nbr = document.getElementById("post2");
        toggleChevup(chev, nbr);
    }
}
function downPostTwo() {
    if (localStorage.getItem("fname") == undefined) {
        document.location.href = "login.php";
    } else {
        const chev = document.getElementById("post2down");
        const nbr = document.getElementById("post2");
        toggleChevdown(chev, nbr);
    }
}
function upPostThree() {
    if (localStorage.getItem("fname") == undefined) {
        document.location.href = "login.php";
    } else {
        const chev = document.getElementById("post3up");
        const nbr = document.getElementById("post3");
        toggleChevup(chev, nbr);
    }
}
function downPostThree() {
    if (localStorage.getItem("fname") == undefined) {
        document.location.href = "login.php";
    } else {
        const chev = document.getElementById("post3down");
        const nbr = document.getElementById("post3");
        toggleChevdown(chev, nbr);
    }
}

function toggleChevup(chev, nbr) {
    if (!chev.classList.contains("chev-toggled")) {
        chev.classList.add("chev-toggled");
        nbr.innerHTML = Number(nbr.innerHTML) + 1;
    } else {
        chev.classList.remove("chev-toggled");
        nbr.innerHTML = Number(nbr.innerHTML) - 1;
    }
}
function toggleChevdown(chev, nbr) {
    if (!chev.classList.contains("chev-toggled")) {
        chev.classList.add("chev-toggled");
        nbr.innerHTML = Number(nbr.innerHTML) - 1;
    } else {
        chev.classList.remove("chev-toggled");
        nbr.innerHTML = Number(nbr.innerHTML) + 1;
    }
}
function gopostform() {
    document.location.href = "postForm.php";
}
function gofeed() {
    document.location.href = "feed.php";
}
function gotoregister() {
    document.location.href = "registration.php";
}
function gotologin() {
    document.location.href = "login.php";
}

function getProfile() {
    const fname = localStorage.getItem("fname");
    const lname = localStorage.getItem("lname");
    const email = localStorage.getItem("email");
    const phone = localStorage.getItem("phone");
    const date = localStorage.getItem("date");

    const fullName = document.getElementById("full-name");
    const femail = document.getElementById("email");
    const fphone = document.getElementById("phone");
    const bday = document.getElementById("birth");

    fullName.innerHTML = fname + " " + lname;
    femail.innerHTML = email;
    fphone.innerHTML = phone;
    bday.innerHTML = date;
}
