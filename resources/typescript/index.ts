const abasLivros: NodeListOf<HTMLDivElement> = document.querySelectorAll('.wrapper-livros');
const buttonsTrocarAba: NodeListOf<HTMLButtonElement> =
    document.querySelectorAll('.btn-trocar-aba');

if (abasLivros.length >= 1) {
    abasLivros.item(0).style.removeProperty('display');
}

buttonsTrocarAba.forEach((btn: HTMLButtonElement): void => {
    btn.addEventListener('click', function (): void {
        abasLivros.forEach((aba: HTMLDivElement): void => {
            aba.style.setProperty('display', 'none');
        });

        let idSecao: string | null = btn.getAttribute('data-categoria');

        if (idSecao === null) {
            return;
        }

        let abaLivros: HTMLDivElement | null = document.querySelector(`#livros-${idSecao}`);
        abaLivros?.style.removeProperty('display');

        buttonsTrocarAba.forEach((button: HTMLButtonElement): void =>
            button.classList.remove('selected'),
        );
        this.classList.add('selected');
    });
});
