<?php

namespace OfxParser\Entities\Investment\Transaction;

use SimpleXMLElement;

use OfxParser\Entities\Investment;
use OfxParser\Entities\Investment\Transaction\Traits\InvBuy;

/**
 * OFX 203 doc:
 * 13.9.2.4.4 Investment Transaction Aggregates
 * <BUYOTHER> is simply an <INVBUY>
 */
class BuySecurity extends Investment
{
    /**
     * Traits used to define properties
     */
    use InvBuy;

    /**
     * @var string
     */
    public $nodeName = 'BUYOTHER';

    /**
     * Imports the OFX data for this node.
     * @param SimpleXMLElement $node
     * @return $this
     */
    public function loadOfx(SimpleXMLElement $node)
    {
        // Transaction data is nested within <INVBUY> child node
        $this->loadInvBuy($node->INVBUY);
        return $this;
    }
}

