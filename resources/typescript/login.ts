const avisoCadastro: HTMLElement | null = document.querySelector("#aviso-cadastro");
const avisoLogin: HTMLElement | null = document.querySelector("#aviso-login");
const btnAvisoCadastro: HTMLButtonElement | null = document.querySelector("#aviso-cadastro button");
const btnAvisoLogin: HTMLButtonElement | null = document.querySelector("#aviso-login button");
const overlay: HTMLElement | null = document.querySelector("#overlay");

avisoCadastro?.style.setProperty("display", "none")

btnAvisoLogin?.addEventListener("click", (): void => {
    overlay?.classList.add("painel-direito-ativo");
    avisoCadastro?.style.removeProperty("display");
    avisoLogin?.style.setProperty("display", "none")
});

btnAvisoCadastro?.addEventListener("click", (): void => {
    overlay?.classList.remove("painel-direito-ativo");
    avisoCadastro?.style.setProperty("display", "none");
    avisoLogin?.style.removeProperty("display");
});
