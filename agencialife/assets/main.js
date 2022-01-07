window.onload = function(){

    //CTAs botões
    const tradicional   = document.querySelector("#tradicional");
    const gold          = document.querySelector("#gold");
    const imperial      = document.querySelector("#imperial");
    //-------------------------------------------------------------

    //esconde a seção informações do produto
    sectionHiddenInfoProduct(true);
    //-------------------------------------------------------------

    //Efeito scroll e ativação de fundo
    tradicional.addEventListener("click", activeHoverOnClick);
    gold.addEventListener("click", activeHoverOnClick);
    imperial.addEventListener("click", activeHoverOnClick);

    function activeHoverOnClick(){
        removeHoverOnClick();
        document.querySelector('#produtos-linha-' + this.id).classList.add("produtos-linha-active");
    }

    function removeHoverOnClick(){
        document.querySelector('#produtos-linha-tradicional').classList.remove("produtos-linha-active");
        document.querySelector('#produtos-linha-gold').classList.remove("produtos-linha-active");
        document.querySelector('#produtos-linha-imperial').classList.remove("produtos-linha-active");
    }
    //-------------------------------------------------------------

    //esconde a section informações dos produtos
    function sectionHiddenInfoProduct(value) {
        if (value == true) {
            document.querySelector("#informacoes_dos_produtos").style = "display:none";
        } else {
            document.querySelector("#informacoes_dos_produtos").style = "display:block";
        }
    }
    //-------------------------------------------------------------

    //carrega as informações dos produtos

    const pote = document.querySelectorAll(".pote");

    pote.forEach((value) => {
        value.addEventListener("click", viewInfoProducts);
    });

    function viewInfoProducts(){
        sectionHiddenInfoProduct(false);
        document.getElementById("informacoes_dos_produtos").scrollIntoView();
    }

    //Efeito CheckBox
    let checkBox = document.querySelectorAll("#lista_produtos .elementor-button-wrapper");

    for (var el of checkBox) {
        el.addEventListener("click", checkBoxAction);
    }

    function checkBoxAction() {
        let checkbox = this.children[0].children[0].children[0].children[0];
        let checkboxID = this.children[0];
        let produtoID = document.querySelector('.elementor-element-efe8350').id

        let input = document.querySelectorAll('.elementor-field-option input');

        botao = document.querySelector('#selecionar_produto');

        if (checkbox.className.indexOf('fa-check-circle') == -1) {
            for (var el of input) {
                if (el.value == checkboxID.id) {
                    el.setAttribute('checked', 'checked');

                    if (produtoID == checkboxID.id) {
                        botao.text = 'DESELECIONAR PRODUTO ▼';
                    }
                }
            }
        } else {
            for (var el of input) {
                if (el.value == checkboxID.id) {
                    el.removeAttribute('checked');

                    if (produtoID == checkboxID.id) {
                        botao.text = 'SELECIONAR PRODUTO ►';
                    }

                }
            }
        }

        checkbox.classList.toggle('fa-circle');
        checkbox.classList.toggle('fa-check-circle');
    }
    //-------------------------------------------------------------

    let selecionarProduto = document.querySelector('#selecionar_produto');

    selecionarProduto.addEventListener("click", selecionarProdutoAction);


    function selecionarProdutoAction() {

        let produtoID = document.querySelector('.elementor-element-7cc24fa0').id;

        let checkBox = document.querySelectorAll("#lista_produtos .elementor-button-wrapper");

        for (var el of checkBox) {

            if (produtoID == el.children[0].id) {
                el.offsetParent.children[0].children[0].children[0].click();
            }
        }

    }

    let informacoesDefault = document.querySelectorAll('#lista_de_produtos img');

    for (var el of informacoesDefault) {
        el.addEventListener("click", carregaInformacoes);
    }


    let informacoes = document.querySelectorAll("#lista_produtos img");

    for (var el of informacoes) {
        el.addEventListener("click", carregaInformacoes);
    }

    function carregaInformacoes() {

        addEfeito(this);

        produtos = produto.linhaIndustrial;

        produtos.forEach((produto) => {

            if (produto.id == this.offsetParent.id) {

                document.querySelector('.elementor-element-7cc24fa0').id = produto.id;

                enviaInformacoes('#produto_nome', produto.produto_nome);

                document.querySelector('#produto_po img').setAttribute('srcset', produto.produto_po);
                document.querySelector('#produto_po img').setAttribute('srcset', produto.produto_po);

                enviaInformacoes('#descricao_produto', produto.descricao_produto);
                enviaInformacoes('#aparencia', produto.aparencia);
                enviaInformacoes('#odor', produto.odor);
                enviaInformacoes('#sabor', produto.sabor);
                enviaInformacoes('#cor', produto.cor);
                enviaInformacoes('#contagem_total', produto.contagem_total, true);
                enviaInformacoes('#contagem_total_valor', produto.contagem_total_valor, true);
                enviaInformacoes('#mofos_e_leveduras', produto.mofos_e_leveduras, true);
                enviaInformacoes('#mofos_e_leveduras_valor', produto.mofos_e_leveduras_valor, true);
                enviaInformacoes('#coliformes', produto.coliformes, true);
                enviaInformacoes('#coliformes_valor', produto.coliformes_valor, true);
                enviaInformacoes('#e_coli', produto.e_coli, true);
                enviaInformacoes('#e_coli_valor', produto.e_coli_valor, true);
                enviaInformacoes('#salmonella', produto.salmonella, true);
                enviaInformacoes('#salmonella_valor', produto.salmonella_valor, true);
                enviaInformacoes('#staphylococcus_aureus', produto.staphylococcus_aureus, true);
                enviaInformacoes('#staphylococcus_aureus_valor', produto.staphylococcus_aureus_valor, true);
                enviaInformacoes('#ph', produto.ph, true);
                enviaInformacoes('#ph_valor', produto.ph_valor, true);
                enviaInformacoes('#umidade', produto.umidade, true);
                enviaInformacoes('#umidade_valor', produto.umidade_valor, true);
                enviaInformacoes('#granulometria', produto.granulometria, true);
                enviaInformacoes('#granulometria_valor', produto.granulometria_valor, true);
                enviaInformacoes('#gordura_total', produto.gordura_total, true);
                enviaInformacoes('#gordura_total_valor', produto.gordura_total_valor, true);
                enviaInformacoes('#principais_usos', produto.principais_usos);

                document.querySelector('#botao_baixar_ficha_tecnica').children[0].children[0].children[0].href = produto.botao_baixar_ficha_tecnica;

            }
        }); 
        
        document.querySelector("#informacoes_produtos").style = "display:visible";
        document.querySelector("#lista_de_produtos").style = "display:none";

        let status = this.offsetParent.nextElementSibling.querySelectorAll('.far')[0];
        botao = document.querySelector('#selecionar_produto');

        if (status.className.indexOf('fa-check-circle') !== -1) {
            botao.text = 'DESELECIONAR PRODUTO ▼';
        } else {
            botao.text = 'SELECIONAR PRODUTO ►';
        }

    }

    //carrega as informações do produto
    function enviaInformacoes(id, value, table = false) {
        if (!table) {
            document.querySelector(id).children[0].children[0].textContent = value;
        } else {
            document.querySelector(id).innerHTML = value;
        }
    }


    function addEfeito(element) {

        let imagens = document.querySelectorAll('#lista_produtos img');

        for (var el of imagens) {
            el.classList.remove("opacidade");
            el.classList.remove("ativo");
        }

        element.classList.add("opacidade");
        element.classList.add("ativo");

    }


    let linha_industrial = {
        "linhaIndustrial": [

            {
                //LINHA TRADICIONAL
                "id": "natural",
                "produto_nome": "Natural",
                "produto_po": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/natural_gold_po.png",
                "descricao_produto": "O puro cacau em pó, preservando as característica naturais das amendoas sem adição de nenhum tratamento químico.",
                "aparencia": "Pó fino e sem grumos.",
                "odor": "Característico, isento de odores estranhos.",
                "sabor": "Característico, isento de sabores estranhos.",
                "cor": "Marrom claro, característico.",
                "contagem_total": "Contagem Total",
                "contagem_total_valor": "5000 ufc/g% (Máx.)",
                "mofos_e_leveduras": "Mofos e Leveduras",
                "mofos_e_leveduras_valor": "500 ufc/g% (Máx.)",
                "coliformes": "Coliformes",
                "coliformes_valor": "Ausente / 10g",
                "e_coli": "E. Coli",
                "e_coli_valor": "Ausente / 10g",
                "salmonella": "Salmonella",
                "salmonella_valor": "Ausente / 25g",
                "staphylococcus_aureus": "Staphylococcus Aureus",
                "staphylococcus_aureus_valor": "Ausente / 0,1g",
                "ph": "pH",
                "ph_valor": "4,5 a 5,5",
                "umidade": "Umidade",
                "umidade_valor": "5,0% (Máx.)",
                "granulometria": "Granulometria<br>#200 MESH(ASTM)",
                "granulometria_valor": "98,0% (Mín.)",
                "gordura_total": "Gordura Total",
                "gordura_total_valor": "8 - 12%",
                "principais_usos": "Misturas secas e chocolates.",
                "botao_baixar_ficha_tecnica": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/Ficha-tecnica-Fralia-Cacau-Natural.pdf"
            },
            {
                "id": "alcalino_soluvel",
                "produto_nome": "Alcalino Solúvel",
                "produto_po": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/alcalino_soluvel_po.png",
                "descricao_produto": "O puro cacau em pó, alcalinizado de forma a aumentar sua solubilidade. Traz uma cor mais forte em tons de marrom levemente mais escuro que o Natural. Este produto possuí alta dispersibilidade em água.",
                "aparencia": "Pó fino e sem grumos.",
                "odor": "Característico, isento de odores estranhos.",
                "sabor": "Característico, isento de sabores estranhos.",
                "cor": "Marrom castanho, característico.",
                "contagem_total": "Contagem Total",
                "contagem_total_valor": "5000 ufc/g% (Máx.)",
                "mofos_e_leveduras": "Mofos e Leveduras",
                "mofos_e_leveduras_valor": "500 ufc/g% (Máx.)",
                "coliformes": "Coliformes",
                "coliformes_valor": "Ausente / 10g",
                "e_coli": "E. Coli",
                "e_coli_valor": "Ausente / 10g",
                "salmonella": "Salmonella",
                "salmonella_valor": "Ausente / 25g",
                "staphylococcus_aureus": "Staphylococcus Aureus",
                "staphylococcus_aureus_valor": "Ausente / 0,1g",
                "ph": "pH",
                "ph_valor": "6,0 a 7,2",
                "umidade": "Umidade",
                "umidade_valor": "5,0% (Máx.)",
                "granulometria": "Granulometria<br>#200 MESH(ASTM)",
                "granulometria_valor": "98,0% (Mín.)",
                "gordura_total": "Gordura Total",
                "gordura_total_valor": "8 - 12%",
                "principais_usos": "Bebidas lácteas e misturas secas.",
                "botao_baixar_ficha_tecnica": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/Ficha-tecnica-Fralia-Cacau-Alcalino-Soluvel.pdf"
            },
            {
                "id": "alcalino",
                "produto_nome": "Alcalino",
                "produto_po": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/alcalino_po.png",
                "descricao_produto": "O puro cacau em pó, alcalinizado de forma a aumentar sua solubilidade. Traz uma cor mais forte em tons de marrom levemente mais escuro que o Natural.",
                "aparencia": "Pó fino e sem grumos.",
                "odor": "Característico, isento de odores estranhos.",
                "sabor": "Característico, isento de sabores estranhos.",
                "cor": "Marrom castanho, característico.",
                "contagem_total": "Contagem Total",
                "contagem_total_valor": "5000 ufc/g% (Máx.)",
                "mofos_e_leveduras": "Mofos e Leveduras",
                "mofos_e_leveduras_valor": "500 ufc/g% (Máx.)",
                "coliformes": "Coliformes",
                "coliformes_valor": "Ausente / 10g",
                "e_coli": "E. Coli",
                "e_coli_valor": "Ausente / 10g",
                "salmonella": "Salmonella",
                "salmonella_valor": "Ausente / 25g",
                "staphylococcus_aureus": "Staphylococcus Aureus",
                "staphylococcus_aureus_valor": "Ausente / 0,1g",
                "ph": "pH",
                "ph_valor": "6,0 a 7,2",
                "umidade": "Umidade",
                "umidade_valor": "5,0% (Máx.)",
                "granulometria": "Granulometria<br>#200 MESH(ASTM)",
                "granulometria_valor": "98,0% (Mín.)",
                "gordura_total": "Gordura Total",
                "gordura_total_valor": "8 - 12%",
                "principais_usos": "Bebidas lácteas e misturas secas.",
                "botao_baixar_ficha_tecnica": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/Ficha-tecnica-Fralia-Cacau-Alcalino.pdf"
            },
            {
                "id": "alcalino_ip_50",
                "produto_nome": "Alcalino IP 50",
                "produto_po": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/alcalino_ip_50_po.png",
                "descricao_produto": "O puro cacau em pó, alcalinizado de forma a melhorar sua solubilidade. Por meio do processo de torrefação e alcalinização, apresenta tons mais escuros de marrom puxados ao Chocolate, com aromas intensos e destacados.",
                "aparencia": "Pó fino e sem grumos.",
                "odor": "Característico, isento de odores estranhos.",
                "sabor": "Característico, isento de sabores estranhos.",
                "cor": "Marrom castanho, característico.",
                "contagem_total": "Contagem Total",
                "contagem_total_valor": "5.000 ufc/g% (Máx.)",
                "mofos_e_leveduras": "Mofos e Leveduras",
                "mofos_e_leveduras_valor": "500 ufc/g% (Máx.)",
                "coliformes": "Coliformes",
                "coliformes_valor": "Ausente / 10g",
                "e_coli": "E. Coli",
                "e_coli_valor": "Ausente / 10g",
                "salmonella": "Salmonella",
                "salmonella_valor": "Ausente / 25g",
                "staphylococcus_aureus": "Staphylococcus Aureus",
                "staphylococcus_aureus_valor": "Ausente / 0,1g",
                "ph": "pH",
                "ph_valor": "6,5 a 7,3",
                "umidade": "Umidade",
                "umidade_valor": "5,0% (Máx.)",
                "granulometria": "Granulometria<br>#200 MESH(ASTM)",
                "granulometria_valor": "98,0% (Mín.)",
                "gordura_total": "Gordura Total",
                "gordura_total_valor": "8 - 12%",
                "principais_usos": "Bebidas lácteas e doces.",
                "botao_baixar_ficha_tecnica": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/Ficha-tecnica-Fralia-Cacau-Alcalino-IP-50.pdf"
            },
            {
                "id": "alcalino_ip_80",
                "produto_nome": "Alcalino IP 80",
                "produto_po": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/alcalino_ip_80_po.png",
                "descricao_produto": "O puro cacau em pó, com processo de torrefação e alcalinização diferenciados. Traz ao produto um tom marrom intenso com aroma e sabores fortes, apresentando um sabor mais amargo. É aromático e entrega cor e sabor em seu uso.",
                "aparencia": "Pó fino e sem grumos.",
                "odor": "Característico, isento de odores estranhos.",
                "sabor": "Característico, isento de sabores estranhos.",
                "cor": "Marrom escuro, característico.",
                "contagem_total": "Contagem Total",
                "contagem_total_valor": "5000 ufc/g% (Máx.)",
                "mofos_e_leveduras": "Mofos e Leveduras",
                "mofos_e_leveduras_valor": "500 ufc/g% (Máx.)",
                "coliformes": "Coliformes",
                "coliformes_valor": "Ausente / 10g",
                "e_coli": "E. Coli",
                "e_coli_valor": "Ausente / 10g",
                "salmonella": "Salmonella",
                "salmonella_valor": "Ausente / 25g",
                "staphylococcus_aureus": "Staphylococcus Aureus",
                "staphylococcus_aureus_valor": "Ausente / 0,1g",
                "ph": "pH",
                "ph_valor": "7,5 a 9,0",
                "umidade": "Umidade",
                "umidade_valor": "5,0% (Máx.)",
                "granulometria": "Granulometria<br>#200 MESH(ASTM)",
                "granulometria_valor": "98,0% (Mín.)",
                "gordura_total": "Gordura Total",
                "gordura_total_valor": "10 - 15%",
                "principais_usos": "Misturas secas, confeitos e doces.",
                "botao_baixar_ficha_tecnica": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/Ficha-tecnica-Fralia-Cacau-Alcalino-IP-80.pdf"
            },
            {
                "id": "black",
                "produto_nome": "Black",
                "produto_po": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/black_po.png",
                "descricao_produto": "O puro cacau em pó que emprega em sua produção o processo extremo de alcalinização e torrefação, levando ao produto um tom negro intenso para uso em sua aplicação. Destaca-se pela cor intensa com aromas e sabor de cacau não presentes.",
                "aparencia": "Pó fino e sem grumos.",
                "odor": "Característico, isento de odores estranhos.",
                "sabor": "Característico, isento de sabores estranhos.",
                "cor": "Preto, característico.",
                "contagem_total": "Contagem Total",
                "contagem_total_valor": "5000 ufc/g% (Máx.)",
                "mofos_e_leveduras": "Mofos e Leveduras",
                "mofos_e_leveduras_valor": "500 ufc/g% (Máx.)",
                "coliformes": "Coliformes",
                "coliformes_valor": "Ausente / 10g",
                "e_coli": "E. Coli",
                "e_coli_valor": "Ausente / 10g",
                "salmonella": "Salmonella",
                "salmonella_valor": "Ausente / 25g",
                "staphylococcus_aureus": "Staphylococcus Aureus",
                "staphylococcus_aureus_valor": "Ausente / 0,1g",
                "ph": "pH",
                "ph_valor": "8,5 a 9,5",
                "umidade": "Umidade",
                "umidade_valor": "5,0% (Máx.)",
                "granulometria": "Granulometria<br>#200 MESH(ASTM)",
                "granulometria_valor": "95,0% (Mín.)",
                "gordura_total": "Gordura Total",
                "gordura_total_valor": "10 - 15%",
                "principais_usos": "Misturas secas.",
                "botao_baixar_ficha_tecnica": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/Ficha-tecnica-Fralia-Cacau-Alcalino-Black.pdf"
            },
            //LINHA GOLD
            {
                "id": "natural_gold",
                "produto_nome": "Natural Gold",
                "produto_po": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/natural_gold_po.png",
                "descricao_produto": "O puro cacau em pó, preservando as característica naturais das amendoas sem adição de nenhum tratamento químico. Por ser um produto da linha gold, sua produção é feita a partir de uma seleção de amêndoas de qualidade especial.",
                "aparencia": "Pó fino e sem grumos.",
                "odor": "Característico, isento de odores estranhos.",
                "sabor": "Característico, isento de sabores estranhos.",
                "cor": "Marrom claro, característico.",
                "contagem_total": "Contagem Total",
                "contagem_total_valor": "5000 ufc/g% (Máx.)",
                "mofos_e_leveduras": "Mofos e Leveduras",
                "mofos_e_leveduras_valor": "500 ufc/g% (Máx.)",
                "coliformes": "Coliformes",
                "coliformes_valor": "Ausente / 10g",
                "e_coli": "E. Coli",
                "e_coli_valor": "Ausente / 10g",
                "salmonella": "Salmonella",
                "salmonella_valor": "Ausente / 25g",
                "staphylococcus_aureus": "Staphylococcus Aureus",
                "staphylococcus_aureus_valor": "Ausente / 0,1g",
                "ph": "pH",
                "ph_valor": "5,0 a 5,5",
                "umidade": "Umidade",
                "umidade_valor": "5,0% (Máx.)",
                "granulometria": "Granulometria<br>#200 MESH(ASTM)",
                "granulometria_valor": "98,0% (Mín.)",
                "gordura_total": "Gordura Total",
                "gordura_total_valor": "8 - 12%",
                "principais_usos": "Misturas secas, chocolates.",
                "botao_baixar_ficha_tecnica": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/Ficha-tecnica-Fralia-Cacau-Natural-Gold.pdf"
            },
            {
                "id": "alcalino_gold",
                "produto_nome": "Alcalino Gold",
                "produto_po": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/alcalino_gold_po.png",
                "descricao_produto": "O puro cacau em pó, alcalinizado de forma a aumentar sua solubilidade. Traz uma cor mais forte em tom de marrom levemente mais escuro que o Natural. Por ser tratar de produto da linha gold sua produção a partir de uma seleção de amêndoas de qualidade especial.",
                "aparencia": "Pó fino e sem grumos.",
                "odor": "Característico, isento de odores estranhos.",
                "sabor": "Característico, isento de sabores estranhos.",
                "cor": "Marrom médio, característico.",
                "contagem_total": "Contagem Total",
                "contagem_total_valor": "5000 ufc/g% (Máx.)",
                "mofos_e_leveduras": "Mofos e Leveduras",
                "mofos_e_leveduras_valor": "500 ufc/g% (Máx.)",
                "coliformes": "Coliformes",
                "coliformes_valor": "Ausente / 10g",
                "e_coli": "E. Coli",
                "e_coli_valor": "Ausente / 10g",
                "salmonella": "Salmonella",
                "salmonella_valor": "Ausente / 25g",
                "staphylococcus_aureus": "Staphylococcus Aureus",
                "staphylococcus_aureus_valor": "Ausente / 0,1g",
                "ph": "pH",
                "ph_valor": "6,5 a 7,3",
                "umidade": "Umidade",
                "umidade_valor": "5,0% (Máx.)",
                "granulometria": "Granulometria<br>#200 MESH(ASTM)",
                "granulometria_valor": "98,0% (Mín.)",
                "gordura_total": "Gordura Total",
                "gordura_total_valor": "8 - 12%",
                "principais_usos": "Misturas secas, chocolates, confeitos e doces.",
                "botao_baixar_ficha_tecnica": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/Ficha-tecnica-Fralia-Cacau-Alcalino-Gold.pdf"
            },
            {
                "id": "alcalino_lac",
                "produto_nome": "Alcalino Lac",
                "produto_po": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/alcalino_lac_po.png",
                "descricao_produto": "O puro cacau em pó especialmente alcalinizado e solubilizado para uso em receitas de base Láctea. Por ser um produto da linha gold, sua produção é feita a partir de uma seleção de amendoas de qualidade especial.",
                "aparencia": "Pó fino e sem grumos.",
                "odor": "Característico, isento de odores estranhos.",
                "sabor": "Característico, isento de sabores estranhos.",
                "cor": "Marrom castanho, característico.",
                "contagem_total": "Contagem Total",
                "contagem_total_valor": "5000 ufc/g% (Máx.)",
                "mofos_e_leveduras": "Mofos e Leveduras",
                "mofos_e_leveduras_valor": "500 ufc/g% (Máx.)",
                "coliformes": "Coliformes",
                "coliformes_valor": "Ausente / 10g",
                "e_coli": "E. Coli",
                "e_coli_valor": "Ausente / 10g",
                "salmonella": "Salmonella",
                "salmonella_valor": "Ausente / 25g",
                "staphylococcus_aureus": "Staphylococcus Aureus",
                "staphylococcus_aureus_valor": "Ausente / 0,1g",
                "ph": "pH",
                "ph_valor": "6,5 a 7,3",
                "umidade": "Umidade",
                "umidade_valor": "5,0% (Máx.)",
                "granulometria": "Granulometria<br>#200 MESH(ASTM)",
                "granulometria_valor": "98,0% (Mín.)",
                "gordura_total": "Gordura Total",
                "gordura_total_valor": "8 - 12%",
                "principais_usos": "Indicado para uso em receitas de base láctea.",
                "botao_baixar_ficha_tecnica": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/Ficha-tecnica-Fralia-Cacau-Alcalino-Lac.pdf"
            },
            {
                "id": "alcalino_red",
                "produto_nome": "Alcalino Red",
                "produto_po": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/alcalino_red_po.png",
                "descricao_produto": "O puro cacau em pó especialmente alcalinizado com tons vermelhos intensos com sabor e aroma destacados. Por ser um produto da linha gold, sua produção é a partir de uma seleção de amendoas de qualidade especial.",
                "aparencia": "Pó fino e sem grumos.",
                "odor": "Característico, isento de odores estranhos.",
                "sabor": "Característico, isento de sabores estranhos.",
                "cor": "Marrom avermelhado, característico.",
                "contagem_total": "Contagem Total",
                "contagem_total_valor": "5000 ufc/g% (Máx.)",
                "mofos_e_leveduras": "Mofos e Leveduras",
                "mofos_e_leveduras_valor": "500 ufc/g% (Máx.)",
                "coliformes": "Coliformes",
                "coliformes_valor": "Ausente / 10g",
                "e_coli": "E. Coli",
                "e_coli_valor": "Ausente / 10g",
                "salmonella": "Salmonella",
                "salmonella_valor": "Ausente / 25g",
                "staphylococcus_aureus": "Staphylococcus Aureus",
                "staphylococcus_aureus_valor": "Ausente / 0,1g",
                "ph": "pH",
                "ph_valor": "6,3 a 7,6",
                "umidade": "Umidade",
                "umidade_valor": "5,0% (Máx.)",
                "granulometria": "Granulometria<br>#200 MESH(ASTM)",
                "granulometria_valor": "98,0% (Mín.)",
                "gordura_total": "Gordura Total",
                "gordura_total_valor": "10 - 12%",
                "principais_usos": "Misturas secas, chocolates, confeitos, doces e sorvetes.",
                "botao_baixar_ficha_tecnica": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/Ficha-tecnica-Fralia-Cacau-Alcalino-Red.pdf"
            },
            {
                "id": "alcalino_red_soluvel",
                "produto_nome": "Alcalino Red Solúvel",
                "produto_po": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/alcalino_red_soluvel_po.png",
                "descricao_produto": "O puro cacau em pó especialmente alcalinizado e solubilizado, possui tons vermelhos intensos com sabor e aroma destacados. Por ser um produto da linha gold, sua produção é feita a partir de uma seleção de amendoas de qualidade especial.",
                "aparencia": "Pó fino e sem grumos.",
                "odor": "Característico, isento de odores estranhos.",
                "sabor": "Característico, isento de sabores estranhos.",
                "cor": "Marrom avermelhado, característico.",
                "contagem_total": "Contagem Total",
                "contagem_total_valor": "5000 ufc/g% (Máx.)",
                "mofos_e_leveduras": "Mofos e Leveduras",
                "mofos_e_leveduras_valor": "500 ufc/g% (Máx.)",
                "coliformes": "Coliformes",
                "coliformes_valor": "Ausente / 10g",
                "e_coli": "E. Coli",
                "e_coli_valor": "Ausente / 10g",
                "salmonella": "Salmonella",
                "salmonella_valor": "Ausente / 25g",
                "staphylococcus_aureus": "Staphylococcus Aureus",
                "staphylococcus_aureus_valor": "Ausente / 0,1g",
                "ph": "pH",
                "ph_valor": "6,3 a 7,6",
                "umidade": "Umidade",
                "umidade_valor": "5,0% (Máx.)",
                "granulometria": "Granulometria<br>#200 MESH(ASTM)",
                "granulometria_valor": "98,0% (Mín.)",
                "gordura_total": "Gordura Total",
                "gordura_total_valor": "10 - 12%",
                "principais_usos": "Bebidas lácteas.",
                "botao_baixar_ficha_tecnica": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/Ficha-tecnica-Fralia-Cacau-Alcalino-Red-Solúvel.pdf"
            },
            //LINHA IMPERIAL
            {
                "id": "natural_imperial",
                "produto_nome": "Natural Imperial",
                "produto_po": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/natural_gold_po.png",
                "descricao_produto": "Os produtos da nova linha IMPERIAL de cacau em pó da Fralía são adequados para compor receitas de qualidade premium. Com controle minucioso de qualidade das amêndoas, da seleção de compra ao tratamento, tem receitas desenvolvidas pela pesquisa e desenvolvimento do LAB Fralía para atingir alta performance: adequadas para receitas que exigem alto padrão de assertividade em testes, e conferem unicidade em intensidade de sabor, em consistência e aroma.",
                "aparencia": "Pó fino e sem grumos.",
                "odor": "Característico, isento de odores estranhos.",
                "sabor": "Característico, isento de sabores estranhos.",
                "cor": "Marrom claro, característico.",
                "contagem_total": "Contagem Total",
                "contagem_total_valor": "5000 ufc/g% (Máx.)",
                "mofos_e_leveduras": "Mofos e Leveduras",
                "mofos_e_leveduras_valor": "500 ufc/g% (Máx.)",
                "coliformes": "Coliformes",
                "coliformes_valor": "Ausente / 10g",
                "e_coli": "E. Coli",
                "e_coli_valor": "Ausente / 10g",
                "salmonella": "Salmonella",
                "salmonella_valor": "Ausente / 25g",
                "staphylococcus_aureus": "Staphylococcus Aureus",
                "staphylococcus_aureus_valor": "Ausente / 0,1g",
                "ph": "pH",
                "ph_valor": "5,0 a 5,5",
                "umidade": "Umidade",
                "umidade_valor": "5,0% (Máx.)",
                "granulometria": "Granulometria<br>#200 MESH(ASTM)",
                "granulometria_valor": "98,0% (Mín.)",
                "gordura_total": "Gordura Total",
                "gordura_total_valor": "8 - 12%",
                "principais_usos": "Misturas secas, chocolates.",
                "botao_baixar_ficha_tecnica": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/10/Ficha-tecnica-Fralia-Imperial-Cacau-Natural.pdf"
            },
            {
                "id": "red_imperial",
                "produto_nome": "Red Imperial",
                "produto_po": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/alcalino_red_po.png",
                "descricao_produto": "Os produtos da nova linha IMPERIAL de cacau em pó da Fralía são adequados para compor receitas de qualidade premium. Com controle minucioso de qualidade das amêndoas, da seleção de compra ao tratamento, tem receitas desenvolvidas pela pesquisa e desenvolvimento do LAB Fralía para atingir alta performance: adequadas para receitas que exigem alto padrão de assertividade em testes, e conferem unicidade em intensidade de sabor, em consistência e aroma.",
                "aparencia": "Pó fino e sem grumos.",
                "odor": "Característico, isento de odores estranhos.",
                "sabor": "Característico, isento de sabores estranhos.",
                "cor": "Marrom avermelhado, característico.",
                "contagem_total": "Contagem Total",
                "contagem_total_valor": "5000 ufc/g% (Máx.)",
                "mofos_e_leveduras": "Mofos e Leveduras",
                "mofos_e_leveduras_valor": "500 ufc/g% (Máx.)",
                "coliformes": "Coliformes",
                "coliformes_valor": "Ausente / 10g",
                "e_coli": "E. Coli",
                "e_coli_valor": "Ausente / 10g",
                "salmonella": "Salmonella",
                "salmonella_valor": "Ausente / 25g",
                "staphylococcus_aureus": "Staphylococcus Aureus",
                "staphylococcus_aureus_valor": "Ausente / 0,1g",
                "ph": "pH",
                "ph_valor": "6,3 a 7,6",
                "umidade": "Umidade",
                "umidade_valor": "5,0% (Máx.)",
                "granulometria": "Granulometria<br>#200 MESH(ASTM)",
                "granulometria_valor": "98,0% (Mín.)",
                "gordura_total": "Gordura Total",
                "gordura_total_valor": "10 - 12%",
                "principais_usos": "Misturas secas, chocolates, confeitos, doces e sorvetes.",
                "botao_baixar_ficha_tecnica": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/10/Ficha-tecnica-Fralia-Imperial-Cacau-Alcalino-Red-Soluvel.pdf"
            },
            {
                "id": "black_imperial",
                "produto_nome": "Black Imperial",
                "produto_po": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/black_po.png",
                "descricao_produto": "Os produtos da nova linha IMPERIAL de cacau em pó da Fralía são adequados para compor receitas de qualidade premium. Com controle minucioso de qualidade das amêndoas, da seleção de compra ao tratamento, tem receitas desenvolvidas pela pesquisa e desenvolvimento do LAB Fralía para atingir alta performance: adequadas para receitas que exigem alto padrão de assertividade em testes, e conferem unicidade em intensidade de sabor, em consistência e aroma.",
                "aparencia": "Pó fino e sem grumos.",
                "odor": "Característico, isento de odores estranhos.",
                "sabor": "Característico, isento de sabores estranhos.",
                "cor": "Preto, característico.",
                "contagem_total": "Contagem Total",
                "contagem_total_valor": "5000 ufc/g% (Máx.)",
                "mofos_e_leveduras": "Mofos e Leveduras",
                "mofos_e_leveduras_valor": "500 ufc/g% (Máx.)",
                "coliformes": "Coliformes",
                "coliformes_valor": "Ausente / 10g",
                "e_coli": "E. Coli",
                "e_coli_valor": "Ausente / 10g",
                "salmonella": "Salmonella",
                "salmonella_valor": "Ausente / 25g",
                "staphylococcus_aureus": "Staphylococcus Aureus",
                "staphylococcus_aureus_valor": "Ausente / 0,1g",
                "ph": "pH",
                "ph_valor": "8,5 a 9,5",
                "umidade": "Umidade",
                "umidade_valor": "5,0% (Máx.)",
                "granulometria": "Granulometria<br>#200 MESH(ASTM)",
                "granulometria_valor": "95,0% (Mín.)",
                "gordura_total": "Gordura Total",
                "gordura_total_valor": "10 - 15%",
                "principais_usos": "Misturas secas.",
                "botao_baixar_ficha_tecnica": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/Ficha-tecnica-Fralia-Cacau-Alcalino-Black.pdf"
            },
            {
                "id": "alcalino_imperial",
                "produto_nome": "Alcalino Imperial",
                "produto_po": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/04/alcalino_gold_po.png",
                "descricao_produto": "Os produtos da nova linha IMPERIAL de cacau em pó da Fralía são adequados para compor receitas de qualidade premium. Com controle minucioso de qualidade das amêndoas, da seleção de compra ao tratamento, tem receitas desenvolvidas pela pesquisa e desenvolvimento do LAB Fralía para atingir alta performance: adequadas para receitas que exigem alto padrão de assertividade em testes, e conferem unicidade em intensidade de sabor, em consistência e aroma.",
                "aparencia": "Pó fino e sem grumos.",
                "odor": "Característico, isento de odores estranhos.",
                "sabor": "Característico, isento de sabores estranhos.",
                "cor": "Marrom médio, característico.",
                "contagem_total": "Contagem Total",
                "contagem_total_valor": "5000 ufc/g% (Máx.)",
                "mofos_e_leveduras": "Mofos e Leveduras",
                "mofos_e_leveduras_valor": "500 ufc/g% (Máx.)",
                "coliformes": "Coliformes",
                "coliformes_valor": "Ausente / 10g",
                "e_coli": "E. Coli",
                "e_coli_valor": "Ausente / 10g",
                "salmonella": "Salmonella",
                "salmonella_valor": "Ausente / 25g",
                "staphylococcus_aureus": "Staphylococcus Aureus",
                "staphylococcus_aureus_valor": "Ausente / 0,1g",
                "ph": "pH",
                "ph_valor": "6,5 a 7,3",
                "umidade": "Umidade",
                "umidade_valor": "5,0% (Máx.)",
                "granulometria": "Granulometria<br>#200 MESH(ASTM)",
                "granulometria_valor": "98,0% (Mín.)",
                "gordura_total": "Gordura Total",
                "gordura_total_valor": "8 - 12%",
                "principais_usos": "Misturas secas, chocolates, confeitos e doces.",
                "botao_baixar_ficha_tecnica": "https://fralia.com.br/lp-linha-industrial/wp-content/uploads/2021/10/Ficha-tecnica-Fralia-Imperial-Cacau-Alcalino-Black.pdf"
            }

        ]
    };

    let produto = JSON.parse(JSON.stringify(linha_industrial));

}