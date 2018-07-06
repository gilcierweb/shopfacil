<?php

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
$bradesco_shopfacil->boleto_dataEmissao = date('Y-m-d');
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

// Para consultas é preciso adicionar o email na intancia da classe exemplo
$bradesco_shopfacil = new Shopfacil($merchant_id, $chave_seguranca, 'example@example.com');

$return_api_order_by_id = $bradesco_shopfacil->serviceGetOrderById($order_id);
$return_api_order_list_payment_boleto = $bradesco_shopfacil->serviceGetOrderListPayment($type = 'boleto', $dateInitial, $dateFinal, $status, $offset, $limit);
$return_api_order_list_payment_tranferencia = $bradesco_shopfacil->serviceGetOrderListPayment($type = 'transferencia', $dateInitial, $dateFinal, $status, $offset, $limit);
