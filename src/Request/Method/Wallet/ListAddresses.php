<?php

namespace Electrum\Request\Method\Wallet;

use Electrum\Request\AbstractMethod;
use Electrum\Request\MethodInterface;
use Electrum\Response\Model\Wallet\Transaction;
use Electrum\Response\Exception\BadResponseException;

/**
 * Wallet history. Returns the transaction history of your wallet.
 * @author Pascal Krason <p.krason@padr.io>
 */
class ListAddresses extends AbstractMethod implements MethodInterface
{

    /**
     * @var string
     */
    private $method = 'listaddresses';

    /**
     * @param array $optional
     *
     * @return HistoryResponse
     * @throws \Electrum\Request\Exception\BadRequestException
     * @throws \Electrum\Response\Exception\BadResponseException
     */
    public function execute(array $optional = [])
    {
        $data = $this->getClient()->execute($this->method, $optional);
        return $data;
    }
}
