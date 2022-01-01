<?php

namespace OfxParser\Entities\Investment\Transaction\Traits;

use SimpleXMLElement;

use OfxParser\Entities\LoaderTrait;

/**
 * Combo for units, price, and total
 */
trait Pricing
{
    /**
     * Traits used to define properties
     */
    use LoaderTrait;

    /**
     * @var float
     */
    public $units;

    /**
     * @var float
     */
    public $unitPrice;

    /**
     * @var float
     */
    public $total;

    /**
     * Where did the money for the transaction come from or go to?
     * CASH, MARGIN, SHORT, OTHER
     * @var string
     */
    public $subAccountFund;

    /**
     * Sub-account type for the security:
     * CASH, MARGIN, SHORT, OTHER
     * @var string
     */
    public $subAccountSec;

    /**
     * @param SimpleXMLElement $node
     * @return $this for chaining
     */
    protected function loadPricing(SimpleXMLElement $node)
    {
        $this->loadMap([
            'units' => 'UNITS',
            'unitPrice' => 'UNITPRICE',
            'total' => 'TOTAL',
            'subAccountFund' => 'SUBACCTFUND',
            'subAccountSec' => 'SUBACCTSEC',
        ], $node);

        return $this;
    }
}
