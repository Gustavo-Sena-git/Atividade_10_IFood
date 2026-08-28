function mostrarEndereco(cep, rua, numero, complemento) {

    document.getElementById("enderecoCep").textContent = cep;
    document.getElementById("enderecoRua").textContent = rua;
    document.getElementById("enderecoNumero").textContent = numero;
    document.getElementById("enderecoComplemento").textContent = complemento;

    document.getElementById("modalEndereco").style.display = "block";
}

function fecharEndereco() {
    document.getElementById("modalEndereco").style.display = "none";
}


