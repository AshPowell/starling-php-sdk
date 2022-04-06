<?php

namespace Starling\Api\Request\Accounts;

use Starling\Api as Base;
use Starling\Api\Request;
use Starling\Exception\RequiredValuesMissing;

class Balance extends Request
{
    /**
     * Whats our endpoint.
     *
     * @var string
     */
    protected $endpoint = 'accounts/{accountId}/balance';

    /**
     * Whats our endpoint.
     *
     * @var string
     */
    protected $type = Base::TYPE_GET;

    /**
     * Hold our Account ID.
     *
     * @var string
     */
    protected $account_id;

    /**
     * Build our request.
     *
     * @param array $values
     *
     * @return void
     */
    public function __construct($values = [])
    {
        if (!isset($values['account_id'])) {
            throw new RequiredValuesMissing(['account_id']);
        }

        $this->account_id = $values['account_id'];
    }

    /**
     * Get endpoint.
     *
     * @return string
     */
    public function getEndpoint()
    {
        return strtr($this->endpoint, [
            '{accountId}'  => $this->account_id,
        ]);
    }
}
