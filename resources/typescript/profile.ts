const btnApagar: HTMLButtonElement | null = document.querySelector("#btn-apagar");

btnApagar?.addEventListener("click", async (): Promise<void> => {
    if (!window.confirm("Deseja realmente apagar a sua conta?")) {
        return;
    }

    await fetch("/user-current-delete").then(async (response: Response): Promise<void> => {
        if (response.ok) {
            window.alert("Usuário apagado");
            window.location.href = "/login";
        }
    });
})
