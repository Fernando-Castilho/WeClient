function Pesquisar(ev) {
    ev.preventDefault();
    const search = document.getElementById("search").value;
    window.location.href = "/admin/clientes/search/" + search;
};

document.getElementById("searchForm").addEventListener("submit", Pesquisar);