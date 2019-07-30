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
class GetTransactionStatus extends AbstractMethod implements MethodInterface
{

    /**
     * @var string
     */
    private $method = 'get_tx_status';

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
        if (!is_array($data)) {
            $data = json_decode($data, true);
        }
            if (array_key_exists('confirmations', $data)) {
                $data = $data['confirmations'];
            } else {
                throw new BadResponseException('Cannot get transaction status');
            }
        return $data;
    }
}
