<?php

namespace OfxParser\Entities\Investment\Transaction;

use SimpleXMLElement;

use OfxParser\Entities\Investment;
use OfxParser\Entities\Investment\Transaction\Traits\InvSell;

/**
 * OFX 203 doc:
 * 13.9.2.4.4 Investment Transaction Aggregates
 * <SELLOTHER> is simply an <INVSELL>
 */
class SellSecurity extends Investment
{
    /**
     * Traits used to define properties
     */
    use InvSell;

    /**
     * @var string
     */
    public $nodeName = 'SELLOTHER';

    /**
     * Imports the OFX data for this node.
     * @param SimpleXMLElement $node
     * @return $this
     */
    public function loadOfx(SimpleXMLElement $node)
    {
        $this->loadInvSell($node->INVSELL);
        return $this;
    }
}

