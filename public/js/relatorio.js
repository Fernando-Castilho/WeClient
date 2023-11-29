function TrocarData(data){
    switch(data){
        case "hoje":
            document.getElementById("hoje").classList.add("active");
            document.getElementById("semana").classList.remove("active");
            document.getElementById("mes").classList.remove("active");

            document.getElementById("dadosHoje").style.display = "block";
            document.getElementById("dadosSemana").style.display = "none";
            document.getElementById("dadosMes").style.display = "none";
        break
        case "semana":
            document.getElementById("hoje").classList.remove("active");
            document.getElementById("semana").classList.add("active");
            document.getElementById("mes").classList.remove("active");

            document.getElementById("dadosHoje").style.display = "none";
            document.getElementById("dadosSemana").style.display = "block";
            document.getElementById("dadosMes").style.display = "none";
        break
        case "mes":
            document.getElementById("hoje").classList.remove("active");
            document.getElementById("semana").classList.remove("active");
            document.getElementById("mes").classList.add("active");
            
            document.getElementById("dadosHoje").style.display = "none";
            document.getElementById("dadosSemana").style.display = "none";
            document.getElementById("dadosMes").style.display = "block";
        break
    }
}