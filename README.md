# simpleCRUDsystem 

## Sistema CRUD (CREATE, READ, UPDATE, DELETE) simples para o gerenciamento de clientes. Este projeto foi desenvolvido com a finalidade de colocar em prática alguns dos meus conhecimentos em PHP, MySQL e HTML5. 
Este é o primeiro projeto pessoal em PHP que posto aqui no GitHub. Como já citado anteriormente, o objetivo dele foi colocar em prática o que venho estudando sobre desenvolvimento WEB. Pretendo também personalizá-lo e usá-lo como base para alguns outros projetos futuros. 

Caso você queira ver este projeto em funcionamento na prática, basta acessar o link: https://andreyrsantos.com.br/crud_base/

Agradeço a atenção de quem visualizar isso. Valeeuu!!! 🙋‍♂️




### Cadastrar Clientes
O projeto conta com uma tela de cadastro para que o usuário possa adicionar clientes no banco de dados. Essa etapa pede obrigatoriamente para que sejam preenchidos os campos "NOME" e "E-MAIL" da pessoa a ser cadastrada. Já o número de telefone e a data de nascimento são opcionais. *Uma observação sobre o campo de telefone, é que este pode ser preenchido só com números ou também utilizando caracteres especiais e espaços*. Uma vez que o usuário clica no botão "Cadastrar cliente" o programa realiza algumas verificações, retornando uma mensagem de erro (casa algo dê errado) ou uma mensagem de sucesso.

O usuário poderá ver os seus clientes cadastrados clicando no link "Voltar à Lista de Clientes" e ele será redirecionado para a página *index.php*

![cadastro-clientes](https://github.com/user-attachments/assets/0a2911fb-df69-434e-89e4-c24ba0a8b901)


### Lista de Clientes
Na página index.php eu apresento ao usuário uma lista com todos os clientes que ele cadastrou no banco de dados. Essa lista informa o ID do usuário (auto increment no banco de dados SQL), o Nome, E-mail, Telefone (se informado), Data de nascimento (Se informado) e a Data e horário de cadastro do cliente. Além disso, à direita deixei opções para que o usuário possa editar as informações desse cliente ou apagá-lo do banco. Ele também tem uma opção para cadastrar um novo cliente.

![lista-clientes](https://github.com/user-attachments/assets/0e5aa69e-5c07-4ab6-8791-129ca97cbe0d)


### Editar cliente
Quando o usuário optar por editar um cliente, ele vai para uma tela como a de cadastro, mas com as informações já preenchidas (afinal esse cliente já existe hahaha). Aqui o usuário é livre para editar qualquer informação do cliente, desde que, ao enviar o formulário, estejam obrigatoriamente preenchidos os campos "Nome" e "E-mail".

Obs: a data de nascimento aparece no formato do idioma do seu navegador.

![edicao-clientes](https://github.com/user-attachments/assets/95761a1c-3db7-421e-9b06-156a5d2d580b)




### Deletar cliente
Por fim, o usuário optando por deletar um cliente, ele é direcionado para a página *deletar_cliente.php* com o parâmetro GET do ID selecionado. Se o usuário voltar atrás na decisão de excluir o cliente, ele é redirecionado para a lista. Se ele confirmar a decisão irá receber uma mensagem confirmando a exclusão juntamente com um link para retornar à lista.

![excluir-clientes](https://github.com/user-attachments/assets/9888aa89-2c11-4b8f-86fa-ab0f120c0625)
