let div = document.querySelector(".mensaje");
let boton = document.querySelector(".boton");
let padre = document.querySelector("body");
let tareas = document.querySelector(".task");
let tarea = document.querySelector(".detect");

window.onload = () => {
    setTimeout(() => {
      div.classList.add("desvanecer");
    }, 2500);
    setTimeout(() => {
      padre.removeChild(div);
    }, 2750);
}

boton.addEventListener("click", () => {

    div.classList.add("desvanecer");
    setTimeout(() => {
        padre.removeChild(div);
      }, 250);

})
