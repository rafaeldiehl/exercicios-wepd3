const inputs = document.querySelectorAll("input");
const button = document.querySelector("[type=submit]");

// console.log(inputs);
// console.log(button);

validInputs = false;

inputs.forEach((input) => {
  input.addEventListener("change", () => {
    validInputs = Array.from(inputs).filter((input) => input.value !== "");
    console.log(validInputs);

    if (validInputs.length != inputs.length) {
      button.setAttribute("disabled", true);
    } else {
      button.removeAttribute("disabled");
    }
  });
});
