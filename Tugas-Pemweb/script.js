let data = [];
function cekData() {
  if (localStorage.getItem("data") === null) {
    localStorage.setItem("data", JSON.stringify(data));
  }
}

function render() {
  const card = document.getElementById("card");
  card.innerHTML = "";
  cekData();
  let data = localStorage.getItem("data");
  JSON.parse(data).forEach((element) => {
    card.innerHTML += `<div class="card-body"><h3>${element.title}</h3><h4><i>${element.date}</i></h4><p>${element.desc}</p><button class="delete-btn" onclick="handleDelete(${element.id})">Delete</button></div>`;
  });
}

const newData = {
  id: "",
  title: "",
  date: "",
  desc: "",
};

function handleDelete(id) {
  const data = JSON.parse(localStorage.getItem("data"));
  const temp = data.filter((element) => element.id !== id);
  localStorage.setItem("data", JSON.stringify(temp));
  render();
}

function inputData() {
  newData.id = +new Date();
  newData.title = document.getElementById("title").value;
  newData.date = document.getElementById("date").value;
  newData.desc = document.getElementById("desc").value;
  cekData();
  const temp = JSON.parse(localStorage.getItem("data"));
  temp.push(newData);
  localStorage.setItem("data", JSON.stringify(temp));
  render();
}

document.getElementById("input").addEventListener("click", () => {
  inputData();
});
render();
