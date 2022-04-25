// link para API: https://dog.ceo/dog-api/

const container = document.querySelector(".container");

fetch("https://dog.ceo/api/breeds/image/random")
  .then((response) => response.json())
  .then((data) => {
    const img = document.createElement("img");
    img.src = data.message;
    img.alt = "Cachorro aleatório";
    container.append(img);
  });
