let userBox = document.querySelector('.header .header-2 .user-box');

document.querySelector('#user-btn').onclick = () =>{
   userBox.classList.toggle('active');
   navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .header-2 .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   userBox.classList.remove('active');
}

window.onscroll = () =>{
   userBox.classList.remove('active');
   navbar.classList.remove('active');

   if(window.scrollY > 60){
      document.querySelector('.header .header-2').classList.add('active');
   }else{
      document.querySelector('.header .header-2').classList.remove('active');
   }
}





// //***************************for number generator

// // iterate over and log each span
// // setInterval() method calls a function at specified intervals
// //The setInterval() method continues calling the function until clearInterval() is called, or the window is closed.
// // 1 second = 1000 milliseconds.
// const items = [...document.querySelectorAll('.number')];

// //accept el as argument
// const updateCount = (el) => { 
//     // invoke and pass each span el in iteration
//     const value = parseInt(el.dataset.id);
//     // console.log(value);
//     const increment = Math.ceil(value/1000); //jati increment badhyo teti fast display hunxa
//     // console.log(increment)
//     let initialValue = 0;

//     const increaseCount = setInterval(() => {
        
//         initialValue += increment;
//         // console.log(initialValue)
//         if( initialValue > value) {
//             el.textContent = `${value}+`;
//             clearInterval(increaseCount);
//             return;
//         }

//         el.textContent =`${initialValue}`;

//         console.log(increaseCount);
//     }, 0.2);
    

// };

// items.forEach((item) => {
//     updateCount(item);
// });

