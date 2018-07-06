<?php

/*
 * Shopfacil
 * @author GilcierWeb
 * @date 12/01/2017
 * */

namespace Bradesco\Shopfacil;

class Shopfacil
{
    public $merchant_id = null;
    public $email = null;
    public $chave_seguranca = null;
    public $media_type = 'application/json';
    public $charset = 'UTF-8';

    public $sandbox = false;

    public $url_homologacao = 'https://homolog.meiosdepagamentobradesco.com.br';
    public $url_producao = 'https://meiosdepagamentobradesco.com.br';

    public $pedido_numero = 0;
    public $pedido_descricao = null;
    public $pedido_valor = 0;

    public $comprador_endereco_cep = null;
    public $comprador_endereco_logradouro = null;
    public $comprador_endereco_numero = null;
    public $comprador_endereco_complemento = null;
    public $comprador_endereco_bairro = null;
    public $comprador_endereco_cidade = null;
    public $comprador_endereco_uf = null;
    public $comprador_nome = null;
    public $comprador_documento = null;
    public $comprador_ip = null;
    public $comprador_user_agent = null;

    public $boleto_beneficiario = null;
    public $boleto_carteira = null;
    public $boleto_nossoNumero = null;
    public $boleto_dataEmissao = null;
    public $boleto_dataVencimento = null;
    public $boleto_valorTitulo = null;
    public $boleto_urlLogotipo = null;
    public $boleto_mensagemCabecalho = null;
    public $boleto_tipoRenderizacao = null;

    public $boleto_instrucoes_instrucaoLinha1 = null;
    public $boleto_instrucoes_instrucaoLinha2 = null;
    public $boleto_instrucoes_instrucaoLinha3 = null;
    public $boleto_instrucoes_instrucaoLinha4 = null;
    public $boleto_instrucoes_instrucaoLinha5 = null;
    public $boleto_instrucoes_instrucaoLinha6 = null;
    public $boleto_instrucoes_instrucaoLinha7 = null;
    public $boleto_instrucoes_instrucaoLinha8 = null;
    public $boleto_instrucoes_instrucaoLinha9 = null;
    public $boleto_instrucoes_instrucaoLinha10 = null;
    public $boleto_instrucoes_instrucaoLinha11 = null;
    public $boleto_instrucoes_instrucaoLinha12 = null;

    private $data_service_pedido = array();
    private $data_service_comprador_endereco = array();
    private $data_service_comprador = array();
    private $data_service_boleto_instrucoes = array();
    private $data_service_boleto = array();
    public $data_service_boleto_registro = null;

    public $token_request_confirmacao_pagamento = null;
    public $token = null;

    /**
     * Shopfacil constructor.
     * @param $merchantId
     * @param $chaveSeguranca
     * @param bool $email
     */
    public function __construct($merchantId, $chaveSeguranca, $email = null)
    {
        $this->merchant_id = trim($merchantId);
        $this->chave_seguranca = trim($chaveSeguranca);
        $this->email = trim($email);
    }

    /**
     * @return array
     */
    public function getDataServicePedido()
    {
        return $this->data_service_pedido;
    }

    /**
     * @param array $data_service_pedido
     * @return Shopfacil
     */
    public function setDataServicePedido($data_service_pedido)
    {
        $this->data_service_pedido = $data_service_pedido;
        return $this;
    }

    /**
     * @return array
     */
    public function getDataServiceCompradorEndereco()
    {
        return $this->data_service_comprador_endereco;
    }

    /**
     * @param array $data_service_comprador_endereco
     * @return Shopfacil
     */
    public function setDataServiceCompradorEndereco($data_service_comprador_endereco)
    {
        $this->data_service_comprador_endereco = $data_service_comprador_endereco;
        return $this;
    }

    /**
     * @return array
     */
    public function getDataServiceComprador()
    {
        return $this->data_service_comprador;
    }

    /**
     * @param array $data_service_comprador
     * @return Shopfacil
     */
    public function setDataServiceComprador($data_service_comprador)
    {
        $this->data_service_comprador = $data_service_comprador;
        return $this;
    }

    /**
     * @return array
     */
    public function getDataServiceBoletoInstrucoes()
    {
        return $this->data_service_boleto_instrucoes;
    }

    /**
     * @param array $data_service_boleto_instrucoes
     * @return Shopfacil
     */
    public function setDataServiceBoletoInstrucoes($data_service_boleto_instrucoes)
    {
        $this->data_service_boleto_instrucoes = $data_service_boleto_instrucoes;
        return $this;
    }

    /**
     * @return array
     */
    public function getDataServiceBoleto()
    {
        return $this->data_service_boleto;
    }

    /**
     * @param array $data_service_boleto
     * @return Shopfacil
     */
    public function setDataServiceBoleto($data_service_boleto)
    {
        $this->data_service_boleto = $data_service_boleto;
        return $this;
    }

    /**
     * @return array
     */
    public function dataServicePedido()
    {
        $this->data_service_pedido = array(
            "numero" => $this->pedido_numero,
            "valor" => (double)$this->pedido_valor,
            "descricao" => $this->pedido_descricao
        );

        return $this->data_service_pedido;
    }

    /**
     * @return array
     */
    public function dataServiceCompradorEndereco()
    {
        $this->data_service_comprador_endereco = array(
            "cep" => $this->comprador_endereco_cep,
            "logradouro" => $this->comprador_endereco_logradouro,
            "numero" => $this->comprador_endereco_numero,
            "complemento" => $this->comprador_endereco_complemento,
            "bairro" => $this->comprador_endereco_bairro,
            "cidade" => $this->comprador_endereco_cidade,
            "uf" => $this->comprador_endereco_uf
        );

        return $this->data_service_comprador_endereco;

    }

    /**
     * @return array
     */
    public function dataServiceComprador()
    {
        $this->data_service_comprador = array(
            "nome" => $this->comprador_nome,
            "documento" => $this->comprador_documento,
            "endereco" => $this->dataServiceCompradorEndereco(),
            "ip" => $_SERVER["REMOTE_ADDR"],
            "user_agent" => $_SERVER["HTTP_USER_AGENT"]
        );

        return $this->data_service_comprador;
    }

    /**
     * @return array
     */
    public function dataServiceBoleto()
    {
        $this->data_service_boleto = array(
            "beneficiario" => $this->boleto_beneficiario,
            "carteira" => $this->boleto_carteira,
            "nosso_numero" => substr((string)$this->boleto_nossoNumero, -11),
            "data_emissao" => $this->boleto_dataEmissao,
            "data_vencimento" => $this->boleto_dataVencimento,
            "valor_titulo" => $this->boleto_valorTitulo,
            "url_logotipo" => $this->boleto_urlLogotipo,
            "mensagem_cabecalho" => $this->boleto_mensagemCabecalho,
            "tipo_renderizacao" => $this->boleto_tipoRenderizacao,
            "instrucoes" => $this->dataServiceBoletoInstrucoes(),
            "registro" => $this->data_service_boleto_registro
        );

        return $this->data_service_boleto;

    }

    /**
     * @return array
     */
    public function dataServiceBoletoInstrucoes()
    {
        $this->data_service_boleto_instrucoes = array(
            "instrucao_linha_1" => $this->boleto_instrucoes_instrucaoLinha1,
            "instrucao_linha_2" => $this->boleto_instrucoes_instrucaoLinha2,
            "instrucao_linha_3" => $this->boleto_instrucoes_instrucaoLinha3,
            "instrucao_linha_4" => $this->boleto_instrucoes_instrucaoLinha4,
            "instrucao_linha_5" => $this->boleto_instrucoes_instrucaoLinha5,
            "instrucao_linha_6" => $this->boleto_instrucoes_instrucaoLinha6,
            "instrucao_linha_7" => $this->boleto_instrucoes_instrucaoLinha7,
            "instrucao_linha_8" => $this->boleto_instrucoes_instrucaoLinha8,
            "instrucao_linha_9" => $this->boleto_instrucoes_instrucaoLinha9,
            "instrucao_linha_10" => $this->boleto_instrucoes_instrucaoLinha10,
            "instrucao_linha_11" => $this->boleto_instrucoes_instrucaoLinha11,
            "instrucao_linha_12" => $this->boleto_instrucoes_instrucaoLinha12
        );

        return $this->data_service_boleto_instrucoes;
    }

    /**
     * @return mixed
     */
    public function serviceRequest()
    {
        $data_service_request = array(
            "merchant_id" => $this->merchant_id,
            "meio_pagamento" => "300",
            "pedido" => $this->dataServicePedido(),
            "comprador" => $this->dataServiceComprador(),
            "boleto" => $this->dataServiceBoleto(),
            "token_request_confirmacao_pagamento" => $this->token_request_confirmacao_pagamento
        );

        $data_post = json_encode($data_service_request);

        $url = "/apiboleto/transacao";

        return $this->sendCurl($url, $data_post);
    }

    /**
     * @return mixed
     */
    public function serviceAuthorization()
    {
        $url = "/SPSConsulta/Authentication/" . $this->merchant_id;

        return $this->sendCurl($url, null, true);
    }

    /**
     * @param array getToken
     * @return Shopfacil
     */
    public function getToken()
    {

        if ($this->serviceAuthorization()->status->codigo != 0) {
            return false;
        }

        $token = $this->serviceAuthorization()->token->token;
        if (!empty($token)) {
            $this->token = $this->serviceAuthorization()->token->token;
            return $this->token;
        } else {
            return false;
        }
    }

    /**
     * @param $orderID
     * @return mixed
     */
    public function serviceGetOrderById($orderID)
    {
        $url = "/SPSConsulta/GetOrderById/" . $this->merchant_id . "?token=" . $this->getToken() . "&orderId=" . $orderID;
        return $this->sendCurl($url, null, true);
    }

    /**
     * @param string $type
     * @param $dateInitial
     * @param $dateFinal
     * @param $status
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public function serviceGetOrderListPayment($type = 'boleto', $dateInitial, $dateFinal, $status, $offset, $limit)
    {
        // https://meiosdepagamentobradesco.com.br/SPSConsulta/GetOrderListPayment/XXXXXXXXX/boleto?token=yyyyyyyyyyyyyyyyyyyy&dataInicial=aaaa/mm/ddhh:mm&dataFinal=aaaa/mm/dd hh:mm&status=ZZZ&offset=VVV&limit=WWW
        // https://meiosdepagamentobradesco.com.br/SPSConsulta/GetOrderListPayment/XXXXXXXXX/transferencia?token=yyyyyyyyyyyyyyyyyyyy&dataInicial=aaaa/mm/dd hh:mm&dataFinal=aaaa/mm/dd hh:mm&status=ZZZ&offset=VVV&limit=WWW
        $url = "/SPSConsulta/GetOrderListPayment/" . $this->merchant_id . "/" . $type . "?token=" . $this->getToken() . "&dataInicial=" . $dateInitial . "&dataFinal=" . $dateFinal . "&status=" . $status . "&offset=" . $offset . "&limit=" . $limit;
        return $this->sendCurl($url, null, true);
    }

    /**
     * @param $params_url
     * @param null $params_data
     * @param bool $params_authorization_header_email
     * @return mixed
     */
    public function sendCurl($params_url, $params_data = null, $params_authorization_header_email = false)
    {

        if ($this->sandbox) {
            $URL_BRADESCO = $this->url_homologacao;
        } else {
            $URL_BRADESCO = $this->url_producao;
        }

        $url = $URL_BRADESCO . $params_url;

        //Configuracao do cabecalho da requisicao
        $headers = array();
        $headers[] = "Accept: " . $this->media_type;
        $headers[] = "Accept-Charset: " . $this->charset;
        $headers[] = "Accept-Encoding: " . $this->media_type;
        $headers[] = "Content-Type: " . $this->media_type . ";charset=" . $this->charset;

        if ($params_authorization_header_email) {
            $AuthorizationHeader = $this->email . ":" . $this->chave_seguranca;
        } else {
            $AuthorizationHeader = $this->merchant_id . ":" . $this->chave_seguranca;
        }

        $AuthorizationHeaderBase64 = base64_encode($AuthorizationHeader);
        $headers[] = "Authorization: Basic " . $AuthorizationHeaderBase64;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        if ($params_data) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params_data);
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        return json_decode($result);

    }

}
