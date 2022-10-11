let circularProgress1 = document.querySelector('.circular-progress1'),
    progressValue1 = document.querySelector('.progress-value1');
let progressStartValue1 = 0,
    progressEndValue1 = 100,
    speed1 = 0;
let progress1 = setInterval(() => {
    progressStartValue1++;
    progressValue1.textContent = `${progressStartValue1}%`
    circularProgress1.style.background = `conic-gradient(rgb(87, 197, 87) ${progressStartValue1 * 3.6}deg, #ededed 0deg)`
    if (progressStartValue1 == progressEndValue1) {
        clearInterval(progress1);
    }
}, speed1);


let circularProgress2 = document.querySelector('.circular-progress2'),
    progressValue2 = document.querySelector('.progress-value2');

let progressStartValue2 = 0,
    progressEndValue2 = 70,
    speed2 = 0;

let progress2 = setInterval(() => {
    progressStartValue2++;

    progressValue2.textContent = `${progressStartValue2}%`
    circularProgress2.style.background = `conic-gradient(orange ${progressStartValue2 * 3.6}deg, #ededed 0deg)`

    if (progressStartValue2 == progressEndValue2) {
        clearInterval(progress2);
    }
}, speed2);

let circularProgress3 = document.querySelector('.circular-progress3'),
    progressValue3 = document.querySelector('.progress-value3');

let progressStartValue3 = 0,
    progressEndValue3 = 26,
    speed3 = 0;

let progress3 = setInterval(() => {
    progressStartValue3++;

    progressValue3.textContent = `${progressStartValue3}%`
    circularProgress3.style.background = `conic-gradient(grey ${progressStartValue3 * 3.6}deg, #ededed 0deg)`

    if (progressStartValue3 == progressEndValue3) {
        clearInterval(progress3);
    }
}, speed3);








// function myFunction() {
//     var input, filter, ul, li, a, i, txtValue;
//     input = document.getElementById("myInput");
//     filter = input.value.toUpperCase();
//     ul = document.getElementById("myUL");
//     li = ul.getElementsByTagName("li");
//     for (i = 0; i < li.length; i++) {
//         a = li[i].getElementsByTagName("a")[0];
//         txtValue = a.textContent || a.innerText;
//         if (txtValue.toUpperCase().indexOf(filter) > -1) {
//             li[i].style.display = "";
//         } else {
//             li[i].style.display = "none";
//         }
//     }
// }



// const searchFocus = document.getElementById('fa fa-search');
// const keys = [
//     { keyCode: 'AltLeft', isTriggered: false },
//     { keyCode: 'ControlLeft', isTriggered: false },
// ];

// window.addEventListener('keydown', (e) => {
//     keys.forEach((obj) => {
//         if (obj.keyCode === e.code) {
//             obj.isTriggered = true;
//         }
//     });

//     const shortcutTriggered = keys.filter((obj) => obj.isTriggered).length === keys.length;

//     if (shortcutTriggered) {
//         searchFocus.focus();
//     }
// });

// window.addEventListener('keyup', (e) => {
//     keys.forEach((obj) => {
//         if (obj.keyCode === e.code) {
//             obj.isTriggered = false;
//         }
//     });
// });
