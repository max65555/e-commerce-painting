// console.log(bunch_of_star[0]);
// for (i = 0; i < bunch_of_star.length; i++) {
//     if (bunch_of_star[i].innerHTML == 1) {
//         // $(this).innerHTML = "change this";
//         // console.log("test1");
//         bunch_of_star[i].innerHTML = "change it";
//     } else if (bunch_of_star[i].innerHTML == 2) {
//         console.log("test2");
//     } else if (bunch_of_star[i].innerHTML == 3) {
//         console.log("test3");
//     } else if (bunch_of_star[i].innerHTML == 4) {
//         console.log("test4");
//     } else {
//         console.log("unknown");
//     }
// }
// console.log(bunch_of_star[0].innerHTML);
// if (bunch_of_star[0].innerHTML == 4) {
//     console.log("test4");
// }
const elements = document.querySelectorAll(".stars");
Array.from(elements).forEach((element, index) => {
    console.log(element.innerHTML);
    amount_of_star = element.innerHTML;
    element.innerHTML = "";
    for (i = 0; i < amount_of_star; i++) {
        element.innerHTML += '<i class="fa fa-star"></i>';
    }
});
