
//***************************for number generator

// iterate over and log each span
// setInterval() method calls a function at specified intervals
//The setInterval() method continues calling the function until clearInterval() is called, or the window is closed.
// 1 second = 1000 milliseconds.
const items = [...document.querySelectorAll('.number')];

//accept el as argument
const updateCount = (el) => { 
    // invoke and pass each span el in iteration
    const value = parseInt(el.dataset.id);
    // console.log(value);
    const increment = Math.ceil(value/1000); //jati increment badhyo teti fast display hunxa
    // console.log(increment)
    let initialValue = 0;

    const increaseCount = setInterval(() => {
        
        initialValue += increment;
        // console.log(initialValue)
        if( initialValue > value) {
            el.textContent = `${value}+`;
            clearInterval(increaseCount);
            return;
        }

        el.textContent =`${initialValue}`;

        console.log(increaseCount);
    }, 0.2);
    

};

items.forEach((item) => {
    updateCount(item);
});













// for about js

const btns = document.querySelectorAll(".btn");
const about =  document.querySelector(".about");
const articles = document.querySelectorAll(".content");

about.addEventListener("click", function(e){
    // console.log(e.target); // about ko sabai clicked child lai return garxa.

    const id = e.target.dataset.id;

    if(id) {
        //remove active from other buttons

        btns.forEach(function (btn) {
            btn.classList.remove("active");
            e.target.classList.add("active");
        });

        //hide other articles
        articles.forEach( function (article){
            article.classList.remove("active");
        
        });

       const element = document.getElementById(id);
        element.classList.add("active");
        // console.log(element);
        
    }

});

