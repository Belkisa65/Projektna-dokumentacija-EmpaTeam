let toggle1 = document.querySelector(".toggle1");
let nested1 = document.querySelector("#nested1");
let nested2 = document.querySelector("#nested2");
let nested3 = document.querySelector("#nested3");

let toggle2 = document.querySelector(".toggle2");
let nested11 = document.querySelector("#nested11");
let nested22 = document.querySelector("#nested22");
let nested33 = document.querySelector("#nested33");

let nested111 = document.querySelector("#nested111");
let nested222 = document.querySelector("#nested222");

let alert1 = document.querySelector("#uspesno-izbrisano");

function closeAlert() {
    console.log("radi");
}
function change() {
    toggle2.addEventListener("click", ()=> {
        toggle1.classList.remove('active');
        // toggle2.classList.add('active');
    });

    if(nested1.style.display=="block" || nested2.style.display=="block" || nested3.style.display=="block") {
        nested1.style.display="none";
        nested2.style.display="none";
        nested3.style.display="none";
        nested111.style.display="none";
        nested222.style.display="none";
        toggle1.classList.remove('active');
    }
    else {
        toggle1.classList.add('active');
        nested1.style.borderLeft="4px solid white";
        nested2.style.borderLeft="4px solid white";
        nested3.style.borderLeft="4px solid white";
        nested1.style.display="block";
        nested2.style.display="block";
        nested3.style.display="block";

        toggle2.addEventListener("click", ()=> {
            nested1.style.display="none";
            nested2.style.display="none";
            nested3.style.display="none";
            nested111.style.display="none";
            nested222.style.display="none";
        });
    }

}

function change2() {

    toggle1.addEventListener("click", ()=> {
        toggle2.classList.remove('active');
        // toggle1.classList.add('active');
    });

    if(nested11.style.display=="block" || nested22.style.display=="block" || nested33.style.display=="block") {
        nested11.style.display="none";
        nested22.style.display="none";
        nested33.style.display="none";
        toggle2.classList.remove('active');
    } else {
        toggle2.classList.add('active');
        nested11.style.borderLeft="4px solid white";
        nested22.style.borderLeft="4px solid white";
        nested33.style.borderLeft="4px solid white";
        nested11.style.display="block";
        nested22.style.display="block";

        toggle1.addEventListener("click", ()=> {
            nested11.style.display="none";
            nested22.style.display="none";
            nested33.style.display="none";
            nested111.style.display="none";
            nested222.style.display="none";
        });
    }
}


function change3() {
    if(nested111.style.display=="block" || nested222.style.display=="block") {
        nested111.style.display="none";
        nested222.style.display="none";
    } else {
        nested111.style.borderLeft="4px solid white";
        nested222.style.borderLeft="4px solid white";
        nested111.style.display="block";
        nested222.style.display="block";
    }
}

let profile = document.querySelector("#profile");
let dropDown = document.querySelector("#drop-down");
profile.addEventListener("click", ()=> {
    if(dropDown.style.display=="block") {
        dropDown.style.display="none";
    } else {
        dropDown.style.display="block";
    }
});
