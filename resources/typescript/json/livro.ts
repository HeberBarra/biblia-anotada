export class Livro {

    private _nome: string;
    private _qntd_capitulos: number;
    private _categoria: string;

    constructor(nome: string, qntd_capitulos: number, categoria: string) {
        this._nome = nome;
        this._qntd_capitulos = qntd_capitulos;
        this._categoria = categoria;
    }

    get nome(): string {
        return this._nome;
    }

    set nome(value: string) {
        this._nome = value;
    }

    get qntd_capitulos(): number {
        return this._qntd_capitulos;
    }

    set qntd_capitulos(value: number) {
        this._qntd_capitulos = value;
    }

    get categoria(): string {
        return this._categoria;
    }

    set categoria(value: string) {
        this._categoria = value;
    }

}
