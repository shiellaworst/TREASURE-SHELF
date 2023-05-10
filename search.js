const searchInput = document.querySelector(".search-input");
const searchResults = document.querySelector(".search-results");

searchInput.addEventListener("input", (e) => {
  const searchText = e.target.value.trim();

  if (searchText.length > 0) {
    fetch(`/search.php?query=${searchText}`)
      .then((response) => response.json())
      .then((data) => {
        if (data.length > 0) {
          searchResults.innerHTML = data.map((result) => `<div>${result.title}</div>`).join("");
          searchResults.style.display = "block";
        } else {
          searchResults.innerHTML = "";
          searchResults.style.display = "none";
        }
      });
  } else {
    searchResults.innerHTML = "";
    searchResults.style.display = "none";
  }
});

document.addEventListener("click", (e) => {
  if (!e.target.classList.contains("search-input")) {
    searchResults.innerHTML = "";
    searchResults.style.display = "none";
  }
});
