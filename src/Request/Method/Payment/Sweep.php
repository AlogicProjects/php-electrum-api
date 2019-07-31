<?php

namespace Electrum\Request\Method\Payment;

use Electrum\Request\AbstractMethod;
use Electrum\Request\MethodInterface;
use Electrum\Response\Exception\ElectrumResponseException;

/**
 * Sweep all
 * @author AlogicProjects
 */
class Sweep extends AbstractMethod implements MethodInterface
{

    /**
     * @var string
     */
    private $method = 'sweep';

    /**
     * @var string
     */
    private $destination = '';

    /**
     * @param array $optional
     *
     * @return PaymentRequestResponse|null
     * @throws \Electrum\Request\Exception\BadRequestException
     * @throws \Electrum\Response\Exception\ElectrumResponseException
     */
    public function execute(array $optional = [])
    {
        $data = $this->getClient()->execute($this->method, $optional);

        return $data['hex'];
    }

    /**
     * Get the value of Destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set the value of Destination
     *
     * @param string destination
     *
     * @return self
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

}
