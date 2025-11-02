const notesFormDelete: NodeListOf<HTMLFormElement> = document.querySelectorAll('.form-control');

notesFormDelete.forEach((form: HTMLFormElement): void => {
    let button: HTMLButtonElement | null = form.querySelector('button');
    button?.addEventListener('click', (): void => {
        if (window.confirm('Deseja realmente a apagar a nota?')) {
            form.submit();
        }
    });
});
