#Bradesco ShopFácil

MEIOS DE PAGAMENTO BRADESCO BOLETO BANCÁRIO

### Installation

To install Bradesco ShopFácil, simply:

    $ composer require gilcierweb/shopfacil
    or
    $ composer require gilcierweb/shopfacil:dev-master

For latest commit version:

    $ composer require gilcierweb/shopfacil @dev

### Requirements

Bradesco ShopFácil works with PHP 5.3, 5.4, 5.5, 5.6, 7.0, 7.1, and HHVM.

### Doação / Donate
Doar com PagSeguro
https://pag.ae/bmgSGGm

[![](https://raw.github.com/gilcierweb/shopfacil/master/examples/image/clique-para-doar-qualquer-quantia.jpg)](https://pag.ae/bmgSGGm)

### Consultoria / consulting

http://gilcierweb.com.br

### Exemplo / Example

```php
require __DIR__ . '/vendor/autoload.php';

use Bradesco\Shopfacil\Shopfacil as Shopfacil;

$merchant_id = "90000";
$chave_seguranca = "SUA CHAVE";

$bradesco_shopfacil = new Shopfacil($merchant_id, $chave_seguranca);

$bradesco_shopfacil->sandbox = false;

$bradesco_shopfacil->pedido_valor = 15000;
$bradesco_shopfacil->pedido_numero = 'GilcierWeb_' . date('YmdHis');
$bradesco_shopfacil->pedido_descricao = 'Descritivo do pedido';

$bradesco_shopfacil->comprador_nome = "Nome do comprador/Pagador";
$bradesco_shopfacil->comprador_documento = "38604763007";
$bradesco_shopfacil->comprador_endereco_cep = "02010700";
$bradesco_shopfacil->comprador_endereco_logradouro = "Rua Domingos Sergio dos Anjos";
$bradesco_shopfacil->comprador_endereco_numero = "277";
$bradesco_shopfacil->comprador_endereco_complemento = "";
$bradesco_shopfacil->comprador_endereco_bairro = "Jardim Santo Elias";
$bradesco_shopfacil->comprador_endereco_cidade = "Sao Paulo";
$bradesco_shopfacil->comprador_endereco_uf = "SP";

$bradesco_shopfacil->boleto_beneficiario = "GilcierWeb TI";
$bradesco_shopfacil->boleto_carteira = '26';
$bradesco_shopfacil->boleto_nossoNumero = "99123456789";
$bradesco_shopfacil->boleto_dataEmissao = date('Y-m-d');;
$bradesco_shopfacil->boleto_dataVencimento = "2016-03-05";
$bradesco_shopfacil->boleto_valorTitulo = 15000;
$bradesco_shopfacil->boleto_urlLogotipo = "http://via.placeholder.com/120x80";
$bradesco_shopfacil->boleto_mensagemCabecalho = "BRADESCO SHOPFACIL BOLETO BANCÁRIO";
$bradesco_shopfacil->boleto_tipoRenderizacao = '2';

$bradesco_shopfacil->boleto_instrucoes_instrucaoLinha1 = "";
$bradesco_shopfacil->boleto_instrucoes_instrucaoLinha2 = "";
$bradesco_shopfacil->boleto_instrucoes_instrucaoLinha3 = "";
$bradesco_shopfacil->boleto_instrucoes_instrucaoLinha4 = "";
$bradesco_shopfacil->boleto_instrucoes_instrucaoLinha5 = "";
$bradesco_shopfacil->boleto_instrucoes_instrucaoLinha6 = "";
$bradesco_shopfacil->boleto_instrucoes_instrucaoLinha7 = "";
$bradesco_shopfacil->boleto_instrucoes_instrucaoLinha8 = "";
$bradesco_shopfacil->boleto_instrucoes_instrucaoLinha9 = "";
$bradesco_shopfacil->boleto_instrucoes_instrucaoLinha10 = "";
$bradesco_shopfacil->boleto_instrucoes_instrucaoLinha11 = "";
$bradesco_shopfacil->boleto_instrucoes_instrucaoLinha12 = "";

$bradesco_shopfacil->token_request_confirmacao_pagamento = "99999999999";

$return_api = $bradesco_shopfacil->serviceRequest();

// Consultas de Pedidos opcional / Query orders optional
$order_id = 'XXXXXX';
$type = 'boleto'; // or 'transferencia'
$dateInitial = date('Y/m/d H:i'); // aaaa/mm/dd  hh:mm
$dateFinal = date('Y/m/d H:i'); // aaaa/mm/dd  hh:mm
$status = 0;
$offset = 1;
$limit = 15;

// Para consultas é preciso adicionar o email na instância da classe exemplo
$bradesco_shopfacil = new Shopfacil($merchant_id, $chave_seguranca, 'example@example.com');

$return_api_order_by_id = $bradesco_shopfacil->serviceGetOrderById($order_id);
$return_api_order_list_payment_boleto = $bradesco_shopfacil->serviceGetOrderListPayment($type = 'boleto', $dateInitial, $dateFinal, $status, $offset, $limit);
$return_api_order_list_payment_transferencia = $bradesco_shopfacil->serviceGetOrderListPayment($type = 'transferencia', $dateInitial, $dateFinal, $status, $offset, $limit);

```

### Exemplo de Requisição (JSON)

```json
{
  "merchant_id": "90000",
  "meio_pagamento": "300",
  "pedido": {
    "numero": "0-9_A-Z_.MAX-27-CH99",
    "valor": 15000,
    "descricao": "Descritivo do pedido"
  },
  "comprador": {
    "nome": "Nome do comprador/sacado",
    "documento": "38604763007",
    "endereco": {
      "cep": "02010700",
      "logradouro": "Rua Domingos Sergio dos Anjos",
      "numero": "277",
      "complemento": "",
      "bairro": "Jardim Santo Elias",
      "cidade": "Sao Paulo",
      "uf": "SP"
    },
    "ip": "IP do comprador",
    "user_agent": "User agent/browser do comprador"
  },
  "boleto": {
    "beneficiario": "Scopus",
    "carteira": "25",
    "nosso_numero": "99123456789",
    "data_emissao": "2016-03-01",
    "data_vencimento": "2016-03-05",
    "valor_titulo": 15000,
    "url_logotipo": "http://via.placeholder.com/120x80",
    "mensagem_cabecalho": "mensagem de cabecalho",
    "tipo_renderizacao": "2",
    "instrucoes": {
      "instrucao_linha_1": "instrucao 01",
      "instrucao_linha_2": "instrucao 02",
      "instrucao_linha_3": "instrucao 03"
    },
    "registro": {
      "agencia_pagador": "00014",
      "razao_conta_pagador": "07050",
      "conta_pagador": "12345679",
      "controle_participante": "Segurança arquivo remessa",
      "aplicar_multa": true,
      "valor_percentual_multa": 1000,
      "valor_desconto_bonificacao": 1200,
      "debito_automatico": false,
      "rateio_credito": false,
      "endereco_debito_automatico": "1",
      "tipo_ocorrencia": "02",
      "especie_titulo": "01",
      "primeira_instrucao": "00",
      "segunda_instrucao": "00",
      "valor_juros_mora": 1000,
      "data_limite_concessao_desconto": "2016-03-07",
      "valor_desconto": 200,
      "valor_iof": 0,
      "valor_abatimento": 0,
      "tipo_inscricao_pagador": "01",
      "sequencia_registro": "00001"
    }
  },
  "token_request_confirmacao_pagamento": "21323dsd23434ad12178DDasY"
}
```

### Exemplo de Resposta (JSON)

```json
{
  "merchant_id": "90000",
  "meio_pagamento": "800",
  "pedido": {
    "numero": "0-9_A-Z_.MAX-27-CH99",
    "valor": 15000,
    "descricao": "Descritivo do pedido"
  },
  "boleto": {
    "valor_titulo": 15000,
    "data_geracao": "2016-04-22T08:10:43",
    "data_atualizacao": null,
    "linha_digitavel": "23790000255123456789223000000002867240000015000",
    "linha_digitavel_formatada": "23790.00025 51234.567892 23000.000002 8 67240000015000",
    "token":"c3ZtRGVKRDFoUlRESmxRNnhKQnpJalFrb0VueXdVdUxnT2FVMG45cm1qMFMyRDcwRWZ0cFVBS0o0\nMFAxOHY0aTdJK3E1MXVjUVJjNEpBdUxvcE15T1E9PQ==",
    "url_acesso":    "http://localhost:9080/boleto/titulo?token=c3ZtRGVKRDFoUlRESmxRNnhKQnpJalFrb0VueXdVdUxnT2FVMG45cm1qMFMyRDcwRWZ0cFVBS0o0\nMFAxOHY0aTdJK3E1MXVjUVJjNEpBdUxvcE15T1E9PQ=="
  },
  "status": {
    "codigo": 0,
    "mensagem": "OPERACAO REALIZADA COM SUCESSO",
    "detalhes": null
  }
}
```

### Consulta Lista de Pedidos Paginada Exemplo de Resposta (JSON) 

#### Retorno para o Boleto (JSON)

```json
{
  "status": {
    "codigo": 0,
    "mensagem": "OPERACAO REALIZADA COM SUCESSO"
  },
  "token": {
    "token": " xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
    "dataCriacao": "dd/MM/yyyy hh:mm:ss"
  },
  "pedidos": [
    {
      "numero": "1234567890",
      "valor": "1000",
      "data": "dd/MM/yyyy hh:mm:ss",
      "valorPago": "1000",
      "dataPagamento": "dd/MM/yyyy hh:mm:ss",
      "dataCredito": "dd/MM/yyyy hh:mm:ss",
      "linhaDigitavel": "xxxxx.xxxxx xxxxx.xxxxxx xxxxx.xxxxxx x",
      "status": "10",
      "erro": "0"
    },
    {
      "numero": "0987654321",
      "valor": "1000",
      "data": "dd/MM/yyyy hh:mm:ss",
      "valorPago": "1000",
      "dataPagamento": "dd/MM/yyyy hh:mm:ss",
      "dataCredito": "dd/MM/yyyy hh:mm:ss",
      "linhaDigitavel": "xxxxx.xxxxx xxxxx.xxxxxx xxxxx.xxxxxx x",
      "status": "10",
      "erro": "0"
    }
  ],
  "paging": {
    "limit": 100,
    "currentOffset": 1,
    "nextOffset": 101
  }
}
```
#### Retorno para Transferência (JSON)

```json
{
  "status": {
    "codigo": 0,
    "mensagem":
    "OPERACAO REALIZADA COM SUCESSO"
  },
  "token": {
    "token": "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
    "dataCriacao": "dd/MM/yyyy hh: mm:ss"
  },
  "pedidos":
  [
    {
      "numero": "1234567890",
      "valor": "1000",
      "data"
      : "dd/MM/yyyy hh:mm:ss",
      "protocoloCliente": "xxxxxx",
      "protocoloLoja": "xxxxxx",
      "status": "81",
      "erro": "0"
    },
    {
      "numero": "0987654321",
      "valor": "1000",
      "data": "dd/MM/yyyy hh:mm:ss",
      "protocoloCliente": "xxxxxx",
      "dataCredito": "dd/MM/yyyy hh:mm:ss",
      "protocoloLoja": "xxxxxx",
      "status": "81",
      "erro": "0"
    }
  ],
  "paging": {
    "limit": 100,
    "currentOffset": 1,
    "nextOffset": 101
  }
}
```
### Consulta de Pedido Exemplo de Resposta (JSON)

#### Retorno para o Boleto (JSON)

```json
{
  "status": {
    "codigo": 0,
    "mensagem": "OPERACAO REALIZADA COM SUCESSO"
  },
  "token": {
    "token": "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
    "dataCriacao": "dd/MM/yyyy hh:mm:ss"
  },
  "pedidos": [
    {
      "numero": "1234567890",
      "valor": "1000",
      "data": "dd/MM/yyyy hh:mm:ss",
      "valorPago": "1000",
      "dataPagamento": "dd/MM/yyyy hh:mm:ss",
      "linhaDigitavel": "xxxxx.xxxxx xxxxx.xxxxxx xxxxx.xxxxxx x",
      "status": "10",
      "erro": "0"
    }
  ]
}
```
#### Retorno para Transferência (JSON)

```json
{
  "status": {
    "codigo": 0,
    "mensagem": "OPERACAO REALIZADA COM SUCESSO"
  },
  "token": {
    "token": "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
    "dataCriacao": "dd/MM/yyyy hh:mm:ss"
  },
  "pedidos": [
    {
      "numero": "1234567890",
      "valor": "1000",
      "data": "dd/MM/yyyy hh:mm:ss",
      "protocoloCliente": "xxxxxx",
      "protocoloLoja": "xxxxxx",
      "status": "81",
      "erro": "0"
    }
  ]
}
```

### URL Manual

https://homolog.meiosdepagamentobradesco.com.br/manual/Manual_BoletoBancario.pdf

### URL Manual Consultas de Pedidos

https://homolog.meiosdepagamentobradesco.com.br/manual/Manual_ConsultaPedidos.pdf

### Site

http://gilcierweb.com.br
