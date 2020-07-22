const alertContainer = document.getElementById("alert");
setTimeout(() => {
  alertContainer.classList.add("show");
}, 1500);

setTimeout(() => {
  alertContainer.classList.remove("show");
}, 10000);

console.log(alertContainer);
