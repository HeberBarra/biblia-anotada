"use strict";
const avisoCadastro = document.querySelector("#aviso-cadastro");
const avisoLogin = document.querySelector("#aviso-login");
const btnAvisoCadastro = document.querySelector("#aviso-cadastro button");
const btnAvisoLogin = document.querySelector("#aviso-login button");
const overlay = document.querySelector("#overlay");
avisoCadastro?.style.setProperty("display", "none");
btnAvisoLogin?.addEventListener("click", () => {
    overlay?.classList.add("painel-direito-ativo");
    avisoCadastro?.style.removeProperty("display");
    avisoLogin?.style.setProperty("display", "none");
});
btnAvisoCadastro?.addEventListener("click", () => {
    overlay?.classList.remove("painel-direito-ativo");
    avisoCadastro?.style.setProperty("display", "none");
    avisoLogin?.style.removeProperty("display");
});
