
    <button onclick="showModal().then(result => { valor = result; })">
        Abrir Modal
    </button>

    <script>
        // Variável que será alterada pelo valor inserido no modal
        let valor = "";

        function showModal() {
            return new Promise((resolve) => {
                // Cria o modal dinamicamente
                const modal = document.createElement("div");
                modal.id = "dynamicModal";
                modal.style = `
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.5);
                    z-index: 1000;
                `;

                // Cria o conteúdo do modal
                const modalContent = document.createElement("div");
                modalContent.style = `
                    background-color: white;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    width: 90%;
                    max-width: 400px;
                    text-align: center;
                `;

                // Botão de fechar
                const closeButton = document.createElement("span");
                closeButton.textContent = "×";
                closeButton.style = `
                    float: right;
                    font-size: 20px;
                    font-weight: bold;
                    cursor: pointer;
                `;
                closeButton.onclick = () => {
                    document.body.removeChild(modal);
                    resolve(null); // Resolve com null se o modal for fechado
                };

                // Título
                const title = document.createElement("h2");
                title.textContent = "Informe algo";

                // Campo de entrada
                const input = document.createElement("input");
                input.type = "text";
                input.style = `
                    width: 90%;
                    padding: 10px;
                    margin: 15px 0;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                `;

                // Botão de enviar
                const submitButton = document.createElement("button");
                submitButton.textContent = "Enviar";
                submitButton.style = `
                    padding: 10px 20px;
                    background-color: #007bff;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                `;
                submitButton.onclick = () => {
                    const userInput = input.value.trim();
                    document.body.removeChild(modal);
                    resolve(userInput); // Resolve com o valor inserido
                };

                // Monta o modal
                modalContent.appendChild(closeButton);
                modalContent.appendChild(title);
                modalContent.appendChild(input);
                modalContent.appendChild(submitButton);
                modal.appendChild(modalContent);

                // Adiciona o modal ao body
                document.body.appendChild(modal);

                // Foco automático no input
                input.focus();
            });
        }
    </script>

<?php 

echo '<script>result</script>';

?>