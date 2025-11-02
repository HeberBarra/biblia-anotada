const CLASSE_ABA_SELECIONADA: string = 'selected';
const CHAVE_ABA_ATUAL: string = 'biblia-anotada-aba-atual';

const abasLivros: NodeListOf<HTMLDivElement> = document.querySelectorAll('.wrapper-livros');
const buttonsMarkers: NodeListOf<HTMLButtonElement> = document.querySelectorAll('.btn-marker');
const buttonsTrocarAba: NodeListOf<HTMLButtonElement> =
    document.querySelectorAll('.btn-trocar-aba');

if (abasLivros.length >= 1) {
    abasLivros.item(0).style.removeProperty('display');
    buttonsTrocarAba.item(0).classList.add(CLASSE_ABA_SELECIONADA);
}

let idUltimaAba: string | null = localStorage.getItem(CHAVE_ABA_ATUAL);

if (idUltimaAba !== null) {
    let abaLivros: HTMLDivElement | null = document.querySelector(`#livros-${idUltimaAba}`);

    if (abaLivros === null) {
        abasLivros.forEach((aba: HTMLDivElement): void => {
            aba.style.setProperty('display', 'none');
        });

        buttonsTrocarAba.forEach((button: HTMLButtonElement): void =>
            button.classList.remove(CLASSE_ABA_SELECIONADA),
        );
    }

    abaLivros?.style.removeProperty('display');

    document
        .querySelector(`button#btn-trocar-aba-${idUltimaAba}`)
        ?.classList.add(CLASSE_ABA_SELECIONADA);
}

buttonsMarkers.forEach((btn: HTMLButtonElement): void => {
    let codigoLivro: string | null = btn.getAttribute('data-book-id');

    if (codigoLivro !== null) {
        btn.title = window.localStorage.getItem(`biblia-anotada-${codigoLivro}`) ?? '';
    }

    btn.addEventListener('click', function (): void {
        btn.title = window.prompt('Qual será o novo valor do marcador') ?? '';

        if (codigoLivro !== null) {
            window.localStorage.setItem(`biblia-anotada-${codigoLivro}`, btn.title);
        }
    });
});

buttonsTrocarAba.forEach((btn: HTMLButtonElement): void => {
    btn.addEventListener('click', function (): void {
        abasLivros.forEach((aba: HTMLDivElement): void => {
            aba.style.setProperty('display', 'none');
        });

        let idSecao: string | null = btn.getAttribute('data-categoria');

        if (idSecao === null) {
            return;
        }

        localStorage.setItem(CHAVE_ABA_ATUAL, idSecao);
        let abaLivros: HTMLDivElement | null = document.querySelector(`#livros-${idSecao}`);
        abaLivros?.style.removeProperty('display');

        buttonsTrocarAba.forEach((button: HTMLButtonElement): void =>
            button.classList.remove(CLASSE_ABA_SELECIONADA),
        );
        this.classList.add(CLASSE_ABA_SELECIONADA);
    });
});
