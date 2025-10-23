import { CategoriaLivro } from './json/categoriaLivro';

const mostrarLivros = async (): Promise<void> => {
    let categorias: CategoriaLivro[] = await fetch('/categorias')
        .then((response: Response): Promise<CategoriaLivro[]> => response.json());

    categorias.forEach((categoria: CategoriaLivro): void => {
        let divCategoria: HTMLDivElement = document.createElement("div");
        let tituloCategoria: HTMLHeadingElement = document.createElement("h2");

        divCategoria.append(tituloCategoria);
        tituloCategoria.innerText = categoria.nome;

        document.body.append(divCategoria);
    });

    // await fetch('/livros').then((response: Response) => response.json()
    //     .then((json: Livro[]): void => {
    //         json.forEach((livro: Livro): void => {
    //             let elementoLivro: HTMLDivElement = document.createElement('div');
    //             elementoLivro.innerText = livro.nome;
    //         });
    //     }));
}

mostrarLivros();
